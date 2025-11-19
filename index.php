<?php
  $path='./';
  $pageStyles="<link rel=\"stylesheet\" href=\"{$path}assets/css/principleInteractions.css\">";
  $scripts="<script src=\"{$path}assets/scripts/principleInteractions.js\" defer></script>";
  require_once($path.'database/connection.db.php');
  require_once($path.'assets/inc/utils.inc.php');

  $pageInfo=getPageInfo($mysqli, 'learn');
  require_once($path.'assets/inc/nav.inc.php');

  $contrastInfo=getPrincipleInfo($mysqli, 'contrast');
  $repetitionInfo=getPrincipleInfo($mysqli, 'repetition');
  $alignmentInfo=getPrincipleInfo($mysqli, 'alignment');
  $proximityInfo=getPrincipleInfo($mysqli, 'proximity');

  $contrastButtons=getPrincipleButtons($mysqli, 'contrast');
  $repetitionButtons=getPrincipleButtons($mysqli, 'repetition');
  $alignmentButtons=getPrincipleButtons($mysqli, 'alignment');
  $proximityButtons=getPrincipleButtons($mysqli, 'proximity');
?>
  <div class="banner">
    <div class="scrolling-text-container">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <main class="container">
    <div class="row">
      <aside class="contents-menu col col-12 col-md-2 col-lg-2">
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
        <header class="col col-12">
          <div class="hero-container">
            <h1 class="hero">
              <span class="this">this</span>
              <div class="crap">
                <span>C</span>
                <span>R</span>
                <span>A</span>
                <span>P</span>
                <span>.</span>
              </div>
            </h1>
          </div>
          <h2 class="hero-subtitle">
            ONE-STOP WAY TO LEARN HOW TO EFFECTIVELY APPLY CRAP DESIGN PRINCIPLES AND MAKE YOUR WEBSITE LOOK JUST RIGHT.
          </h2>
        </header>

        <!-- Introduction -->
        <?php include($path.'assets/inc/intro.inc.php'); ?>

        <!-- Principles -->
        <?php
          $principleInfo=$contrastInfo;
          $principleButtons=$contrastButtons;
          include($path.'assets/inc/principle.inc.php');

          $principleInfo=$repetitionInfo;
          $principleButtons=$repetitionButtons;
          include($path.'assets/inc/principle.inc.php');

          $principleInfo=$alignmentInfo;
          $principleButtons=$alignmentButtons;
          include($path.'assets/inc/principle.inc.php');

          $principleInfo=$proximityInfo;
          $principleButtons=$proximityButtons;
          include($path.'assets/inc/principle.inc.php');
        ?>

        <!-- Summary & Conclusion -->
        <?php 
          include($path.'assets/inc/conclusion.inc.php');
        ?>
      </div>
    </div>
  </main>
<?php
  require_once($path.'assets/inc/footer.inc.php');
?>