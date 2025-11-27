const modalOverlay = document.getElementById('modal-overlay');
const modalScore = document.getElementById('modal-score');
const modalMessage = document.getElementById('modal-message');
const quizForm = document.getElementById('quiz');

/**
 * Response Structure
 *  @type {string} statusMessage - error message or empty if none
 *  @type {JSON} answers - user answer values or empty if none
 *  @type {JSON} feedback - questions feedback or empty {} if error
 */
const handleFormSubmit = async () => {
  const response = await fetch(quizForm.action, {
    method: 'POST',
    body: new FormData(quizForm),
  });

  try {
    const data = await response.json();

    if (!response.ok) {
      return console.error(data.statusMessage);
    }

    const feedback = checkQuizAnswers(data.answers, data.feedback);
    const parsedAnswers = data.answers.map((answer) => Number.parseInt(answer));
    sendUserResponse(feedback, parsedAnswers);
  } catch (err) {
    console.error(err);
    modalStatus = err.message || 'Failed to retrieve and/or handle quiz data. Please try again.'
  } finally {
    modalOverlay.classList.toggle('active');
  }
};

/**
 * Check the submitted answers and generate feedback response
 * 
 * @param {JSON} answers - user answer values
 * @param {JSON} feedback - question feedback
 */
const checkQuizAnswers = (answers, feedback) => {
  let answer = -1;
  let questionFeedback = '';
  const feedbackResponse = [];

  for (const index in answers) {
    answer = answers[index];
    questionFeedback = feedback[index];

    feedbackResponse.push(questionFeedback[answer]);
  }

  return feedbackResponse;
};

/**
 * Update page with question feedback and modal status
 * 
 * @param {string[]} feedback - array of feedback to display
 * @param {number[]} answers - array of 0 or 1 (incorrect or correct)
 */
const sendUserResponse = (feedback, answers) => {
  const correctCount = answers.reduce((prev, cur) => { return cur += prev }, 0);
  const average = correctCount / answers.length;

  let message = '';
  if (average === 1) {
    message += 'Congratulations, you got all of the questions right! You\'re a design principle genius. Now it\'s time to dive into real projects and show off your skills.';
  } else if (average > 0.75) {
    message += 'Almost there! You\'re starting to really understand the nuances of each principle and when and how they are used. Continue practicing and feel free to retake the quiz.';
  } else {
    message += 'Not quite there yet, but that\'s alright. We recommend that you reread the learn page contents and come back when you feel that you\'ve had a better grasp of these principles.';
  }

  modalScore.textContent = `Score: ${correctCount}/${answers.length}`;
  modalMessage.textContent = message;

  for (let index in feedback) {
    index = Number.parseInt(index);
    const parsedIndex = index + 1;
    const question = document.getElementById(`question${parsedIndex}-section`);

    const questionFeedbackSection = question.querySelector('.feedback p');
    questionFeedbackSection.innerHTML = feedback[index];
    questionFeedbackSection.style.display = 'inline-block';
  }
};

quizForm.addEventListener('submit', (e) => {
  e.preventDefault(); // Stop redirecting to new page

  if (modalOverlay.classList.contains('active')) return;

  handleFormSubmit();
});

document.getElementById('modal-button').addEventListener('click', function (e) {
  e.preventDefault();
  modalOverlay.classList.toggle('active');
});