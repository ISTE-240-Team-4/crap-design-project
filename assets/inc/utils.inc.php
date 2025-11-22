<?php 
  /**
   * Retrieve page information based on mode (Learn | Practice | Quiz)
   * 
   * @param mysqli $mysqli - active MySQLi connection object
   * @param string $mode - page mode
   * @return array|false - page data or false on failure
   */
  function getPageInfo(mysqli $mysqli, string $mode) {
    $sql = "SELECT
              `mode`,
              pages.`title`,
              hero.`this` AS `hero_this`,
              hero.`title` AS `hero_title`,
              hero.`subtitle` AS `hero_subtitle`,
              `intro_heading`,
              `intro_content`,
              `summary`,
              `conclusion_heading`,
              `conclusion_content`
            FROM pages 
            
            INNER JOIN heros AS hero ON hero.`id` = `hero_id`

            WHERE LOWER(`mode`) LIKE LOWER(?)";
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
  function getPrincipleInfo(mysqli $mysqli, string $principle) {
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
  function getPrincipleButtons(mysqli $mysqli, string $principle) {
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

  /**
   * Retrieve all quiz questions and associated answers and images (if any)
   * 
   * @param mysqli $mysqli - active MySQLi connection object
   * @return array|false - question information or false on failure
   */
  function getQuestions(mysqli $mysqli) {
    $sql = "SELECT
              questions.`id`,
              `question`,
              `correct_feedback`,
              `incorrect_feedback`,
              answers_agg.`answers_json`,

              -- Handle NULL images_json values by returning []
              COALESCE(images_agg.images_json, '[]') AS images_json
            FROM questions

            INNER JOIN (
              SELECT 
                a.`question_id`,

                -- Group multiple answer objects into single JSON array string
                CONCAT('[', GROUP_CONCAT(JSON_OBJECT(
                  'option', a.`option`,
                  'is_correct', a.`is_correct`
                )), ']') AS answers_json
              FROM answers AS a

              GROUP BY a.`question_id`
              ORDER BY a.`question_id`
            ) AS answers_agg ON questions.`id` = answers_agg.`question_id`

            -- Include both rows with and without images
            LEFT JOIN  (
              SELECT
                qi.`question_id`,

                -- Group multiple images objects into single JSON array string
                CONCAT('[', GROUP_CONCAT(JSON_OBJECT(
                  'file_path', i.`file_path`,
                  'caption', i.`caption`
                )), ']') AS images_json
              FROM question_images AS qi

              INNER JOIN images AS i ON qi.`image_id` = i.`id`

              GROUP BY qi.`question_id`
              ORDER BY qi.`question_id`
            ) AS images_agg ON questions.`id` = images_agg.`question_id`

            ORDER BY questions.`id`;
           ";
    $stmt = $mysqli -> prepare($sql);

    if (!$stmt -> execute()) {
      error_log("getQuestions execution error: $stmt -> error");
      return false;
    }

    $result = $stmt -> get_result();
    if (!$result) {
      error_log("No question information found");
      return false;
    }

    $questions = [];
    while ($row = $result -> fetch_assoc()) {
      $questions[] = $row;
    }

    $stmt -> close();
    return $questions;
  }
?>