<section id="<?php echo "question{$question['id']}"; ?>-section" class="question-section" aria-labelledby="<?php echo "question{$question['id']}"; ?>-title">
  <h2 id="<?php echo "question{$question['id']}"; ?>-title" class="section-title">QUESTION <?php echo $question['id']; ?></h2>
  <p><?php echo $question['question']; ?></p>
  <div class="question-images">
    <?php
      $imagesArray = json_decode($question['images_json'], true); // Create an associative array of images
      
      if (!empty($imagesArray)) {
        foreach ($imagesArray as $image) {
          echo "
            <figure>
              <img src=\"{$path}{$image['file_path']}\" alt=\"{$image['caption']}\">
              <figcaption class=\"caption\">
                {$image['caption']}
              </figcaption>
            </figure>
          ";
        }
      }
    ?>
  </div>

  <div class="question-choices">
    <fieldset>
      <?php
        $optionsArray = json_decode($question['answers_json'], true); // Create an associative array of answers
        foreach ($optionsArray as $option) {
          echo "
          <div>
            <input type=\"radio\" id=\"question{$question['id']}{$option['option']}\" name=\"question{$question['id']}\" value=\"{$option['is_correct']}\" required>
            <label for=\"question{$question['id']}{$option['option']}\">{$option['option']}</label>
          </div>
          ";
        }
      ?>
    </fieldset>
  </div>

  <div class="feedback">
    <p></p>
  </div>
</section>