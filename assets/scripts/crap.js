const learnLink = document.querySelector('.desktop-nav-links .learn a');
const practiceLink = document.querySelector('.desktop-nav-links .practice');
const quizLink = document.querySelector('.desktop-nav-links .quiz');

const banner = document.querySelector('.banner');
const heroContainer = document.querySelector('.hero-container');
const heroThis = heroContainer.querySelector('.this');
const heroCrap = heroContainer.querySelector('.crap');
const heroSubtitle = document.querySelector('.hero-subtitle');

const backgroundColor = '#FAFAFA';
const learnHighlightColor = '#7E4FE3';
const practiceHighlightColor = '#0019D9';
const quizHighlightColor = '#CCC1E3';
const textDark = '#120038';

const reset = () => {
  banner.style.display = 'none';
  banner.style.borderBottom = 'none';
  banner.style.backgroundColor = backgroundColor;
  banner.style.color = backgroundColor;
  banner.textContent = "";
  heroContainer.style.backgroundColor = backgroundColor;
  heroThis.style.color = textDark;
  heroCrap.style.color = textDark;
  heroSubtitle.style.backgroundColor = backgroundColor;
  heroSubtitle.style.color = textDark;
  heroSubtitle.style.textAlign = 'center';
  heroSubtitle.textContent = 'ONE-STOP WAY TO LEARN HOW TO EFFECTIVELY APPLY CRAP DESIGN PRINCIPLES AND MAKE YOUR WEBSITE LOOK JUST RIGHT.';
}

learnLink.addEventListener('mouseenter', () => {
  banner.style.display = 'block';
  banner.style.borderBottom = '2px solid var(--color-outline)';
  banner.style.backgroundColor = learnHighlightColor;
  banner.style.color = backgroundColor;
  banner.textContent = "This website looks good right now — and that's not an accident. Take a few moments to scroll, read, and discover why it works so well.";
  heroThis.style.color = backgroundColor;
  heroCrap.style.color = learnHighlightColor;
});

learnLink.addEventListener('click', () => {
  banner.style.display = 'block';
  banner.style.borderBottom = '2px solid var(--color-outline)';
  banner.style.backgroundColor = learnHighlightColor;
  banner.style.color = backgroundColor;
  banner.textContent = "This website looks good right now — and that's not an accident. Take a few moments to scroll, read, and discover why it works so well.";
  heroContainer.style.backgroundColor = learnHighlightColor;
  heroThis.style.color = learnHighlightColor;
  heroCrap.style.color = backgroundColor;
  heroSubtitle.style.backgroundColor = learnHighlightColor;
  heroSubtitle.style.color = backgroundColor;
  heroSubtitle.style.textAlign = 'left';
  heroSubtitle.textContent = 'LEARN MODE.';
});

practiceLink.addEventListener('mouseenter', () => {
  banner.style.display = 'block';
  banner.style.borderBottom = '2px solid var(--color-outline)';
  banner.style.backgroundColor = practiceHighlightColor;
  banner.style.color = backgroundColor;
  banner.textContent = 'Curious what happens when design rules are ignored? Take a look over here and try to fix it.';
  heroThis.style.color = backgroundColor;
  heroCrap.style.color = practiceHighlightColor;
});

practiceLink.addEventListener('click', () => {
  banner.style.display = 'block';
  banner.style.borderBottom = '2px solid var(--color-outline)';
  banner.style.backgroundColor = practiceHighlightColor;
  banner.style.color = backgroundColor;
  banner.textContent = 'Curious what happens when design rules are ignored? Take a look over here and try to fix it.';
  heroContainer.style.backgroundColor = practiceHighlightColor;
  heroThis.style.color = practiceHighlightColor;
  heroCrap.style.color = backgroundColor;
  heroSubtitle.style.backgroundColor = practiceHighlightColor;
  heroSubtitle.style.color = backgroundColor;
  heroSubtitle.style.textAlign = 'left';
  heroSubtitle.textContent = 'PRACTICE MODE.';
});

quizLink.addEventListener('mouseenter', () => {
  banner.style.display = 'block';
  banner.style.borderBottom = '2px solid var(--color-outline)';
  banner.style.backgroundColor = quizHighlightColor;
  banner.style.color = textDark;
  banner.textContent = "Think you've got it? Take the quiz and test your eye for design";
  heroThis.style.color = backgroundColor;
});

quizLink.addEventListener('click', () => {
  banner.style.display = 'block';
  banner.style.borderBottom = '2px solid var(--color-outline)';
  banner.style.backgroundColor = quizHighlightColor;
  banner.textContent = "Think you've got it? Take the quiz and test your eye for design";
  heroContainer.style.backgroundColor = quizHighlightColor;
  heroThis.style.color = quizHighlightColor;
  heroSubtitle.style.backgroundColor = quizHighlightColor;
  heroSubtitle.style.textAlign = 'left';
  heroSubtitle.textContent = 'PRACTICE MODE.';
});

learnLink.addEventListener('mouseleave', reset);
practiceLink.addEventListener('mouseleave', reset);
quizLink.addEventListener('mouseleave', reset);