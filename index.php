<?php
  $page='This CRAP';
  $path='./';
  require_once($path.'database/connection.db.php');
  require_once($path.'assets/inc/nav.inc.php');
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

    <section class="intro-section section-content">
      <h2 class="section-title">INTRODUCTION TO THIS CRAP.</h2>
      <p>
        Wouldn't it be great if there were a few simple rules that just worked every time you wanted something to look clean, organized, and professional?
      </p>
      <p>
        Great design is NOT about mastering complicated software; it's about using simple, consistent rules that make your work clear and credible. And that's what this CRAP — a quick, hands-on guide to the four essential design principles: Contrast, Repetition, Alignment, and Proximity.
      </p>
      <p>
        Whether you're a small business owner improving your website, a student building your first project, or a beginner designer refining your eye, these principles help you communicate ideas with impact. If the content looks more professional, it instantly becomes more influential.
      </p>
      <p>
        Here, you'll learn what each principle means, see it in action, and test yourself through short, interactive examples designed to make good design feel obvious.
      </p>
    </section>

    <section class="principle-section">
      <h2 class="section-title">CONTRAST.</h2>
      <div class="principle-interaction">
        <h3 class="heading-2">
          CONTRAST CAN BE ACHIEVED IN MANY DIFFERENT WAYS. TRY OUT SOME OF THEM ON THIS SECTION.
        </h3>
        <div class="principle-buttons">
          <button class="primary-button">SIZE</button>
          <button class="primary-button">COLOR</button>
        </div>
      </div>

      <div class="section-content">
        <div class="definition">
          <h3 class="heading-1">DEFINITION</h3>
          <p>
            Alignment brings order to your design. When elements line up visually, they feel connected and intentional, which makes them easier to follow. Even a small misalignment can make a design look off-balance and distract the viewer. Proper alignment is what makes a layout effortless to read.
          </p>
        </div>

        <div class="example">
          <h3 class="heading-1">EXAMPLE</h3>
          <div class="example-images">
            <figure>
              <img src="<?php echo $path; ?>assets/images/contrast-before.png" alt="Example of Bad Contrast">
              <figcaption class="caption">This image shows a circle with low contrast against its background, making it blend in and appear less noticeable.</figcaption>
            </figure>

            <figure>
              <img src="<?php echo $path; ?>assets/images/contrast-after.png" alt="Example of Good Contrast">
              <figcaption class="caption">This image shows a circle with high contrast against its background, making it stand out and draw attention.</figcaption>
            </figure>
          </div>
        </div>

        <div class="application">
          <h3 class="heading-1">APPLICATION</h3>
          <ol>
            <li>Use grids or guides to align text, images, and buttons.</li>
            <li>Stick to one main alignment style (left, center, or right) and stay consistent.</li>
            <li>Line things up so every element feels connected; nothing should look like it's drifting away.</li>
          </ol>
        </div>
      </div>
    </section>
  </main>
<?php
  require_once($path.'assets/inc/footer.inc.php');
?>