<?php
  $page='This CRAP';
  $path='../';
  require_once($path.'database/connection.db.php');
  require_once($path.'assets/inc/nav.inc.php');
?>
  <main class="container">
    <header class="col col-12">
      <div class="hero-container">
        <h1 class="hero">
          <div class="crap">
            <span>Q</span>
            <span>U</span>
            <span>I</span>
            <span>Z</span>
            <span>.</span>
          </div>
        </h1>
      </div>
      <h2 >
        You've read, you've practiced - now let's see what stuck.
        This quick quiz will test how well you can spot and apply the CRAP principles in real examples.
        Don't overthink it - trust your eye, go with your gut, and have fun seeing how much your design sense has sharpened.
      </h2>
    </header>
    <hr>
    <h3>START</h3>
    <hr>
    <form method="post" action="#" name="quizForm">
        <section class='quiz'>
        <h2 class="question-title">QUESTION 1</h2>
        <p class="question-text">
            When you want people to notice the most important part of your design first,
            which principle helps you do that?
        </p>

        <div class="options">
            <label><input type="radio" id="A" name="q1" value="A"> Repetition</label>
            <label><input type="radio" id="B" name="q1" value="B"> Contrast</label>
            <label><input type="radio" id="C" name="q1" value="C"> Alignment</label>
            <label><input type="radio" id="D" name="q1" value="D"> Proximity</label>
        </div>
        </section>

        <section class='quiz'>
        <h2 class="question-title">QUESTION 2</h2>
        <p class="question-text">
            What does repetition actually do for your design?
        </p>

        <div class="options">
            <label><input type="radio" id="A" name="q2" value="A"> Makes things look more consistent and connected</label>
            <label><input type="radio" id="B" name="q2" value="B"> Helps you align text and images</label>
            <label><input type="radio" id="C" name="q2" value="C"> Creates space between different elements</label>
            <label><input type="radio" id="D" name="q2" value="D"> Adds visual variety to keep things interesting</label>
        </div>
        </section>

        <section class='quiz'>
        <h2 class="question-title">QUESTION 3</h2>
        <p class="question-text">
            You're lining up images, text, and buttons along the same invisible grid. Which principle are you applying?
        </p>

        <div class="options">
            <label><input type="radio" id="A" name="q3" value="A"> Contrast</label>
            <label><input type="radio" id="B" name="q3" value="B"> Repetition</label>
            <label><input type="radio" id="C" name="q3" value="C"> Alignment</label>
            <label><input type="radio" id="D" name="q3" value="D"> Proximity</label>
        </div>
        </section>

        <section class='quiz'>
        <h2 class="question-title">QUESTION 4</h2>
        <p class="question-text">
            You notice a heading sitting far away from its paragraph, and the page feels confusing. What principle is missing here?
        </p>

        <div class="options">
            <label><input type="radio" id="A" name="q4" value="A"> Repetition</label>
            <label><input type="radio" id="B" name="q4" value="B"> Alignment</label>
            <label><input type="radio" id="C" name="q4" value="C"> Proximity</label>
            <label><input type="radio" id="D" name="q4" value="D"> Contrast</label>
        </div>
        </section>

        <section class='quiz'>
        <h2 class="question-title">QUESTION 5</h2>
        <p class="question-text">
            Both contrast and proximity can guide a viewer's  attention. What makes them different?
        </p>

        <div class="options">
            <label><input type="radio" id="A" name="q5" value="A"> Contrast uses visual difference, proximity uses spacing</label>
            <label><input type="radio" id="B" name="q5" value="B"> Contrast uses spacing, proximity uses alignment</label>
            <label><input type="radio" id="C" name="q5" value="C"> Both use color differences</label>
            <label><input type="radio" id="D" name="q5" value="D"> Both mean the same thing</label>
        </div>
        </section>

        <section class='quiz'>
        <h2 class="question-title">QUESTION 6</h2>
        <p class="question-text">
            Which design uses contrast effectively to make the headline stand out?
        </p>

        <div class="options">
            <label><input type="radio" id="A" name="q6" value="A"> A</label>
            <label><input type="radio" id="B" name="q6" value="B"> B</label>
        </div>
        </section>

        <section class='quiz'>
        <h2 class="question-title">QUESTION 7</h2>
        <p class="question-text">
            Look at the layouts below. Which one feels cleaner and easier to follow?
        </p>

        <div class="options">
            <label><input type="radio" id="A" name="q7" value="A"> A</label>
            <label><input type="radio" id="B" name="q7" value="B"> B</label>
        </div>
        </section>

        <section class='quiz'>
        <h2 class="question-title">QUESTION 8</h2>
        <p class="question-text">
            Which version makes it easier to tell which caption belongs to which image?
        </p>

        <div class="options">
            <label><input type="radio" id="A" name="q8" value="A"> A</label>
            <label><input type="radio" id="B" name="q8" value="B"> B</label>
        </div>
        </section>
        <hr>
        <input id="submit-btn" type="submit" value="Submit Quiz"/>
    </form>
  </main>
<?php
  require_once($path.'assets/inc/footer.inc.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $stmt = $mysqli->prepare("INSERT INTO `CRAPQuiz` (`q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $q1, $q2, $q3, $q4, $q5, $q6, $q7, $q8);

    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];
    $q6 = $_POST['q6'];
    $q7 = $_POST['q7'];
    $q8 = $_POST['q8'];

    if ($stmt->execute()) {
        // Redirect to avoid duplicate submissions when refreshing
        
        exit();
    } else {
        echo "Insert error: " . $stmt->error;
    }

    $stmt->close();
}


?>