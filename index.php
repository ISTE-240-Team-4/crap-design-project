<?php
  $path='./';
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
  <main class="container">
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
      include($path.'assets/inc/summary.inc.php');
      include($path.'assets/inc/conclusion.inc.php');
    ?>
  </main>
<?php
  require_once($path.'assets/inc/footer.inc.php');
?>