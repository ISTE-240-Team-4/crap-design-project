<?php
  // Dependencies need to be imported again
  $path = '../../';
  require_once($path.'database/connection.db.php');
  require_once($path.'assets/inc/utils.inc.php');

  $questions=getQuestionsFeedback($mysqli);

  // Consolidate all of the question values (0/INCORRECT or 1/CORRECT)
  $answers = [];
  for ($index = 1; $index < count($questions) + 1; $index++) {
    $answers[] = $_POST["question$index"];
  }

  // Custom Form Response utilizing Fetch API
  header('Content-Type: application/json');
  $response = ['statusMessage' => 'An unknown error occurred.', 'answers' => '', 'feedback' => '{}'];

  if (isset($questions)) {
    http_response_code(200);
    $response = ['statusMessage' => '', 'answers' => $answers, 'feedback' => $questions];
  } else {
    http_response_code(500);
  }

  echo json_encode($response);
  exit();
?>