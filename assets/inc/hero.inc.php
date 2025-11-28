<header class="col col-12">
  <div class="hero-container">
    <h1 class="hero">
      <?php echo $pageInfo['hero_this'] != 0 ? '<span class="this">this</span>' : ''; ?>
      <div class="crap">
        <?php foreach (str_split($pageInfo['hero_title']) as $char) {
          echo "<span>$char</span>";
        } ?>
      </div>
    </h1>
  </div>
  <h2 class="hero-subtitle">
    <?php echo $pageInfo['hero_subtitle']; ?>
  </h2>
</header>