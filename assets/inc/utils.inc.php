<?php 
  /**
   * Retrieve page information based on mode (Learn | Practice | Quiz)
   * 
   * @param mysqli $mysqli - active MySQLi connection object
   * @param string $mode - page mode
   * @return array|false - page data or false on failure
   */
  function getPageInfo(mysqli $mysqli, string $mode): array|false {
    $sql = "SELECT `mode`, `title`, `intro_heading`, `intro_content`, `summary`, `conclusion_heading`, `conclusion_content` FROM pages WHERE LOWER(`mode`) LIKE LOWER(?)";
    $stmt = $mysqli -> prepare($sql);
    $searchParam = "%$mode%";
    $stmt -> bind_param("s", $searchParam);

    if (!$stmt -> execute()) {
      error_log("getPageInfo execution error: $stmt -> error");
      return false;
    }

    $result = $stmt -> get_result() -> fetch_assoc();
    if (!$result) {
      error_log("No page found for mode: $mode");
      return false;
    }

    $stmt -> close();
    return $result;
  } 

  /**
   * Retrieve associated information based on principle (Contrast, Repetition, Alignment, Proximity)
   * 
   * @param mysqli $mysqli - active MySQLi connection object
   * @param string $principle - design principle
   * @return array|false - principle data or false on failure
   */
  function getPrincipleInfo(mysqli $mysqli, string $principle): array|false {
    $sql = "SELECT
              `name`,
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
    $searchParam = "%$principle%";
    $stmt -> bind_param("s", $searchParam);
    
    if (!$stmt -> execute()) {
      error_log("getPrincipleInfo execution error: $stmt -> error");
      return false;
    }

    $result = $stmt -> get_result() -> fetch_assoc();
    if (!$result) {
      error_log("No principle data found");
      return false;
    }

    $stmt -> close();
    return $result;
  }

  /**
   * Retrieve associated buttons based on principle (Contrast, Repetition, Alignment, Proximity)
   * 
   * @param mysqli $mysqli - active MySQLi connection object
   * @param string $principle - design principle
   * @return array|false - principle buttons or false on failure
   */
  function getPrincipleButtons(mysqli $mysqli, string $principle): array|false {
    $sql = "SELECT principle_buttons.`name` FROM principle_buttons
            INNER JOIN principles ON principles.`id` = principle_id
            WHERE LOWER(principles.`name`) = LOWER(?)
           ";
    $stmt = $mysqli -> prepare($sql);
    $stmt -> bind_param("s", $principle);

    if (!$stmt -> execute()) {
      error_log("getPrincipleButtons execution error: $stmt -> error");
      return false;
    }

    $result = $stmt -> get_result();
    if (!$result) {
      error_log("No associated principle buttons found");
      return false;
    }

    $buttons = [];
    while ($row = $result -> fetch_assoc()) {
      $buttons[] = $row['name'];
    }

    $stmt -> close();
    return $buttons;
  }
?>