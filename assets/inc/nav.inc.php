<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $page; ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo $path; ?>assets/css/theme.css">
  <link rel="stylesheet" href="<?php echo $path; ?>assets/css/nav.css">
  <link rel="stylesheet" href="<?php echo $path; ?>assets/css/footer.css">
  <link rel="stylesheet" href="<?php echo $path; ?>assets/css/index.css">
  <?php echo $pageStyles ?? ''; ?>
  <script src="<?php echo $path; ?>assets/scripts/navigationMenu.js" defer></script>
</head>
<body>
  <nav>
    <ul class="desktop-nav">
      <li><a href="<?php echo $path; ?>pages/index.php">LEARN</a></li>
      <li><a href="<?php echo $path; ?>pages/practice.php">PRACTICE</a></li>
      <li><a href="<?php echo $path; ?>pages/quiz.php">QUIZ</a></li>
    </ul>

    <ul class="mobile-nav">
      <li><a href="<?php echo $path; ?>pages/index.php">LEARN</a></li>
      <li><a href="<?php echo $path; ?>pages/practice.php">PRACTICE</a></li>
      <li><a href="<?php echo $path; ?>pages/quiz.php">QUIZ</a></li>
    </ul>

    <div>
      <a href="javascript:void(0);" class="menu-icon" onclick="mobileNavToggle()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
  </nav>