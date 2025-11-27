<?php
  $path='../';
  require_once($path.'database/connection.db.php');
  require_once($path.'assets/inc/utils.inc.php');

  $pageInfo=getPageInfo($mysqli, 'practice');
  require_once($path.'assets/inc/nav.inc.php');
?>
  <?php include_once($path.'assets/inc/banner.inc.php'); ?>

  <!-- id used with skip-link -->
  <main id="main-content" class="container">
    <div class="row">
      <aside class="contents-menu col col-12 col-md-2 col-lg-2" role="navigation" aria-label="Page Sections Navigation">
        <h3>Contents Menu</h3>
        <ul class="contents-links">
          <li><a href="#introduction">Introduction</a></li>
          <li><a href="#contrast">Contrast</a></li>
          <li><a href="#repetition">Repetition</a></li>
          <li><a href="#alignment">Alignment</a></li>
          <li><a href="#proximity">Proximity</a></li>
          <li><a href="#conclusion">Conclusion</a></li>
        </ul>
      </aside>

      <div class="col col-12 col-md-10 col-lg-10">
        <!-- Hero -->
        <?php include_once($path.'assets/inc/hero.inc.php'); ?>

        <!-- Introduction -->
        <?php include_once($path.'assets/inc/intro.inc.php'); ?>

        <!-- Summary & Conclusion -->
        <?php include_once($path.'assets/inc/conclusion.inc.php'); ?>
      </div>
    </div>
  </main>
<?php
  require_once($path.'assets/inc/footer.inc.php');
?>
