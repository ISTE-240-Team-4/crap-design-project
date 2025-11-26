<?php
  if (!$principleInfo || !$principleButtons) {
    exit();
  }
?>

<section id="<?php echo strtolower($principleInfo['name']); ?>" class="principle-section" aria-labelledby="<?php echo strtolower($principleInfo['name']); ?>-title">
  <h2 id="<?php echo strtolower($principleInfo['name']); ?>-title" class="section-title"><?php echo $principleInfo['name']; ?>.</h2>
  <div class="principle-container">
    <div class="principle-interaction">
      <h3 class="heading-2">
        <?php echo $principleInfo['interaction_heading']; ?>
      </h3>
      <div class="principle-buttons">
        <?php foreach ($principleButtons as $buttonName) {
          echo "<button type=\"button\" id=". strtolower($principleInfo['name']) . ucfirst(strtolower($buttonName)) ." class=\"primary-button\">$buttonName</button>";
        } ?>
      </div>
    </div>

    <div class="principle-content">
      <div class="definition">
        <h3 class="heading-1">DEFINITION</h3>
        <p>
          <?php echo $principleInfo['definition']; ?>
        </p>
      </div>

      <div class="example">
        <h3 class="heading-1">EXAMPLE</h3>
        <div class="example-images">
          <figure>
            <img src="<?php echo $path.$principleInfo['before_file_path']; ?>" alt="Example of Bad <?php echo $principleInfo['name']; ?>">
            <figcaption class="caption">
              <?php echo $principleInfo['before_caption']; ?>
            </figcaption>
          </figure>

          <figure>
            <img src="<?php echo $path.$principleInfo['after_file_path']; ?>" alt="Example of Good <?php echo $principleInfo['name']; ?>">
            <figcaption class="caption">
              <?php echo $principleInfo['after_caption']; ?>
            </figcaption>
          </figure>
        </div>
      </div>

      <div class="application">
        <h3 class="heading-1">APPLICATION</h3>
        <ol>
          <?php echo $principleInfo['application_steps']; ?>
        </ol>
      </div>
    </div>
  </div>
</section>