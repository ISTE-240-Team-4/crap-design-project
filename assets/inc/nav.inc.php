<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageInfo['title']; ?></title>
  <link rel="stylesheet" href="<?php echo $path; ?>assets/css/theme.css">
  <link rel="stylesheet" href="<?php echo $path; ?>assets/css/grid.css">
  <link rel="stylesheet" href="<?php echo $path; ?>assets/css/animation.css">
  <link rel="stylesheet" href="<?php echo $path; ?>assets/css/nav.css">
  <link rel="stylesheet" href="<?php echo $path; ?>assets/css/footer.css">
  <link rel="stylesheet" href="<?php echo $path; ?>assets/css/hero.css">
  <link rel="stylesheet" href="<?php echo $path; ?>assets/css/page.css">
  <?php echo $pageStyles ?? ''; ?>
  <script src="<?php echo $path; ?>assets/scripts/navigationMenu.js" defer></script>
  <script src="<?php echo $path; ?>assets/scripts/crap.js" defer></script>
  <script src="<?php echo $path; ?>assets/scripts/sidebarNav.js" defer></script>
  <?php echo $scripts ?? ''; ?>
</head>
<body>
  <!-- Used for Accessibility (Screen Readers/Keyboard Users) -->
  <a class="skip-link" href="#main-content">Skip to Main Content</a>
  
  <nav role="navigation" aria-label="Main Navigation">
    <div class="mobile-nav-container">
      <div>
        <button type="button" class="menu-icon" aria-label="Toggle Mobile Navigation Menu" aria-expanded="false" aria-controls="mobile-nav" onclick="handleLogoClick()">
          <svg width="30" height="26" viewBox="0 0 28 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.00373088 22.7823C0.00373093 21.5982 0.834751 20.5776 1.99732 20.3451L25.0161 15.6601C26.5576 15.3458 28 16.5256 28 18.0973C28 19.2815 27.169 20.302 26.0064 20.5346L2.98764 25.2195C1.44617 25.5339 0.00373081 24.354 0.00373088 22.7823Z" fill="#0019D8"/>
            <path d="M28 10.2902C28 11.4744 27.169 12.4949 26.0064 12.7274L2.98764 17.4124C1.44617 17.7268 0.00371937 16.5469 0.00371944 14.9752C0.00371949 13.791 0.83474 12.7705 1.99731 12.538L25.0161 7.85298C26.5576 7.53864 28 8.7185 28 10.2902Z" fill="#0019D8"/>
            <path d="M0.00373088 7.17294C0.00373093 5.98878 0.834751 4.96824 1.99732 4.73571L25.0161 0.0507373C26.5576 -0.263605 28 0.916256 28 2.48797C28 3.67213 27.169 4.69265 26.0064 4.92518L2.98764 9.61017C1.44617 9.92451 0.00373081 8.74465 0.00373088 7.17294Z" fill="#0019D8"/>
          </svg>
        </button>
      </div>

      <ul id="mobile-nav" class="mobile-nav" aria-hidden="true">
        <li class="learn"><a href="<?php echo strtolower($pageInfo['mode']) === 'learn' ? '#' : $path.'index.php'; ?>">LEARN</a></li>
        <li class="practice"><a href="<?php echo strtolower($pageInfo['mode']) === 'practice' ? '#' : $path.'pages/practice.php'; ?>">PRACTICE</a></li>
        <li class="quiz"><a href="<?php echo strtolower($pageInfo['mode']) === 'quiz' ? '#' : $path.'pages/quiz.php'; ?>">QUIZ</a></li>
      </ul>
    </div>

    <div class="desktop-nav">
      <ul class="desktop-nav-links">
        <li class="learn"><a href="<?php echo strtolower($pageInfo['mode']) === 'learn' ? '#' : $path.'index.php'; ?>" onclick="() => delayedReroute()">LEARN</a></li>
        <li class="practice"><a href="<?php echo strtolower($pageInfo['mode']) === 'practice' ? '#' : $path.'pages/practice.php'; ?>" onclick="() => delayedReroute()">PRACTICE</a></li>
        <li class="quiz"><a href="<?php echo strtolower($pageInfo['mode']) === 'quiz' ? '#' : $path.'pages/quiz.php'; ?>" onclick="() => delayedReroute()">QUIZ</a></li>
      </ul>
    </div>
  </nav>