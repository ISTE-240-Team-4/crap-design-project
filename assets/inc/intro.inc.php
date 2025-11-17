<?php
  if (!$pageInfo) {
    exit();
  }
?>

<section id="introduction" class="intro-section section-content">
  <h2 class="section-title"><?php echo $pageInfo['intro_heading']; ?></h2>
  <?php echo $pageInfo['intro_content']; ?>
</section>