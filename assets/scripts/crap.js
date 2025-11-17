const learnLink = document.querySelector('.desktop-nav .learn a');
const practiceLink = document.querySelector('.desktop-nav .practice');
const quizLink = document.querySelector('.desktop-nav .quiz');

const banner = document.querySelector('.banner');
const heroContainer = document.querySelector('.hero-container');
const heroThis = heroContainer.querySelector('.this');
const heroCrap = heroContainer.querySelector('.crap');
const heroSubtitle = document.querySelector('.hero-subtitle');

const backgroundColor = '#FAFAFA';
const textAccentColor = '#7E4FE3';
const textDark = '#120038';

learnLink.addEventListener('mouseenter', () => {
  banner.style.display = 'block';
  banner.style.borderBottom = '2px solid var(--color-outline)';
  banner.style.backgroundColor = textAccentColor;
  banner.style.color = backgroundColor;
  banner.textContent = "This website looks good right now — and that's not an accident. Take a few moments to scroll, read, and discover why it works so well.";
  heroContainer.style.backgroundColor = textAccentColor;
  heroThis.style.color = textAccentColor;
  heroCrap.style.color = backgroundColor;
  heroSubtitle.style.backgroundColor = textAccentColor;
  heroSubtitle.style.color = backgroundColor;
  heroSubtitle.style.textAlign = 'left';
  heroSubtitle.textContent = 'LEARN MODE.';
});

learnLink.addEventListener('mouseleave', () => {
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
});