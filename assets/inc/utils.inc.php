<?php 
  /**
   * Retrieve page information based on mode (Learn | Practice | Quiz)
   * 
   * @param mysqli $mysqli - active MySQLi connection object
   * @param string $mode - page mode
   * @return array|false - page data or false on failure
   */
  function getPageInfo(mysqli $mysqli, string $mode): array|false {
    $sql = "SELECT `title`, `intro_heading`, `intro_content`, `conclusion_heading`, `conclusion_content` FROM pages WHERE LOWER(`mode`) LIKE LOWER(?)";
    $stmt = $mysqli -> prepare($sql);
    $stmt -> bind_param("s", $mode);

    if (!$stmt -> execute())
      return false;

    $result = $stmt -> get_result() -> fetch_assoc();
    if (!$result)
      return false;

    $stmt -> close();
    return $result;
  } 

  /**
   * Retrieve associated information based on principle (Contrast, Repetition, Alignment, Proximity)
   * @param mysqli $mysqli - active MySQLi connection object
   * @param string $principle - design principle
   * @return array|false - principle data or false on failure
   */
  function getPrincipleInfo(mysqli $mysqli, string $principle): array|false {
    $sql = "SELECT
              `interaction_heading`,
              `definition`,
              i_before.`file_path` AS `before_file_path`,
              i_before.`caption` AS `before_caption`,
              i_after.`file_path` AS `after_file_path`,
              i_after.`caption` AS `after_caption`,
              `application_steps`
            FROM principles

            INNER JOIN images AS i_before ON i_before.`id` = `before_image_id`
            INNER JOIN images AS i_after ON i_after.`id` = `after_image_id`

            WHERE LOWER(principles.`name`) LIKE LOWER(?)
          ";
    $stmt = $mysqli -> prepare($sql);
    $stmt -> bind_param("s", $principle);
    
    if (!$stmt -> execute())
      return false;

    $result = $stmt -> get_result() -> fetch_assoc();
    if (!$result)
      return false;

    $stmt -> close();
    return $result;
  }
?>