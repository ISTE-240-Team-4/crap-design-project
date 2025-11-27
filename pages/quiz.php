<?php
  $path='../';
  $pageStyles="
    <link rel=\"stylesheet\" href=\"{$path}assets/css/question.css\">
    <link rel=\"stylesheet\" href=\"{$path}assets/css/modal.css\">
  ";
  $scripts="<script src=\"{$path}assets/scripts/quiz.js\" defer></script>";
  require_once($path.'database/connection.db.php');
  require_once($path.'assets/inc/utils.inc.php');

  $pageInfo=getPageInfo($mysqli, 'quiz');
  require_once($path.'assets/inc/nav.inc.php');

  $questions=getQuestions($mysqli);
?>
  <?php include_once($path.'assets/inc/banner.inc.php'); ?>

  <!-- id used with skip-link -->
  <main id="main-content" class="container">
    <div class="row">
      <aside class="contents-menu col col-12 col-md-2 col-lg-2" role="navigation" aria-label="Page Sections Navigation">
        <h3>Contents Menu</h3>
        <ul class="contents-links">
          <li><a href="#introduction">Introduction</a></li>
          <li><a href="#quiz">Quiz</a></li>
          <li><a href="#conclusion">Conclusion</a></li>
        </ul>
      </aside>

      <div class="col col-12 col-md-10 col-lg-10">
        <!-- Hero -->
        <?php include_once($path.'assets/inc/hero.inc.php'); ?>

        <!-- Introduction -->
        <?php include($path.'assets/inc/intro.inc.php'); ?>

        <!-- Quiz -->
        <form id="quiz" action="<?php echo $path; ?>assets/scripts/submitQuiz.php" method="post">
          <?php 
            foreach ($questions as $question) {
              include($path.'assets/inc/question.inc.php');
            }
          ?>
          <button type="submit">Submit</button>
        </form>

        <!-- Summary & Conclusion -->
        <?php include($path.'assets/inc/conclusion.inc.php'); ?>
      </div>
    </div>
  </main>
  <?php
    include_once($path.'assets/inc/modal.inc.php');
  ?>
<?php
  require_once($path.'assets/inc/footer.inc.php');
?>