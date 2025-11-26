<?php
  if (!$pageInfo) {
    exit();
  }
?>

<section id="conclusion" class="conclusion-section section-content">
  <?php echo $pageInfo['summary']; ?>
  <h2 class="section-title"><?php echo $pageInfo['conclusion_heading']; ?></h2>
  <?php echo $pageInfo['conclusion_content']; ?>
</section>