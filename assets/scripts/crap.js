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

let isRerouting = false;

const modeConfigs = {
  hover: {
    learn: {
      bannerBg: learnHighlightColor,
      bannerText: "This website looks good right now — and that's not an accident. Take a few moments to scroll, read, and discover why it works so well.",
      bannerColor: backgroundColor,
      heroThisColor: backgroundColor,
      heroCrapColor: learnHighlightColor,
    },
    practice: {
      bannerBg: practiceHighlightColor,
      bannerText: "Curious what happens when design rules are ignored? Take a look over here and try to fix it.",
      bannerColor: backgroundColor,
      heroThisColor: backgroundColor,
      heroCrapColor: practiceHighlightColor,
    },
    quiz: {
      bannerBg: quizHighlightColor,
      bannerText: "Think you've got it? Take the quiz and test your eye for design",
      bannerColor: textDark,
      heroThisColor: backgroundColor,
      heroCrapColor: textDark,
    }
  },
  click: {
    learn: {
      heroContainerBg: learnHighlightColor,
      heroThisColor: learnHighlightColor,
      heroCrapColor: backgroundColor,
      heroSubtitleBg: learnHighlightColor,
      heroSubtitleColor: backgroundColor,
      heroSubtitleAlign: 'left',
      heroSubtitleText: 'LEARN MODE.',
    },
    practice: {
      heroContainerBg: practiceHighlightColor,
      heroThisColor: practiceHighlightColor,
      heroCrapColor: backgroundColor,
      heroSubtitleBg: practiceHighlightColor,
      heroSubtitleColor: backgroundColor,
      heroSubtitleAlign: 'left',
      heroSubtitleText: 'PRACTICE MODE.',
    },
    quiz: {
      heroContainerBg: quizHighlightColor,
      heroThisColor: quizHighlightColor,
      heroCrapColor: textDark,
      heroSubtitleBg: quizHighlightColor,
      heroSubtitleColor: textDark,
      heroSubtitleAlign: 'left',
      heroSubtitleText: 'QUIZ MODE.', 
    }
  }
}

/**
 * Resets all elements to default state
 */
const crapReset = () => {
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

/**
 * Applies styles based on the mode and event type
 * @param {string} mode - 'learn', 'practice', or 'quiz'
 * @param {string} eventType - 'hover' or 'click'
 */
const applyStyles = (mode, eventType) => {
  const defaultStyles = modeConfigs['hover'][mode];
  const extraStyles = modeConfigs['click'][mode];

  banner.style.display = 'block';
  banner.style.borderBottom = '2px solid var(--color-outline)';
  banner.style.backgroundColor = defaultStyles.bannerBg;
  banner.style.color = defaultStyles.bannerColor;
  banner.textContent = defaultStyles.bannerText;

  if (eventType === 'hover') {
    heroThis.style.color = defaultStyles.heroThisColor;
    heroCrap.style.color = defaultStyles.heroCrapColor;
  }

  if (eventType === 'click') {
    heroContainer.style.backgroundColor = extraStyles.heroContainerBg;
    heroThis.style.color = extraStyles.heroThisColor;
    heroCrap.style.color = extraStyles.heroCrapColor;
    heroSubtitle.style.backgroundColor = extraStyles.heroSubtitleBg;
    heroSubtitle.style.color = extraStyles.heroSubtitleColor;
    heroSubtitle.style.textAlign = extraStyles.heroSubtitleAlign;
    heroSubtitle.textContent = extraStyles.heroSubtitleText;
  }
}

/**
 * Delay rerouting to page to show CRAP active change on clicked link
 * @param {Event} e - a click event
 */
const delayedReroute = (e) => {
  e.preventDefault();
  isRerouting = true;

  const currentPageUrl = window.location.href.split('#')[0];

  // window.location.assign(#) doesn't cause page reset
  if (e.target.href === currentPageUrl + '#' || e.target.href === currentPageUrl) {
    window.scrollTo(0, 0);

    setTimeout(() => {
      crapReset();
      isRerouting = false;
    }, 800);

    return;
  }

  setTimeout(() => {
    window.location.assign(e.target.href);
    isRerouting = false;
  }, 800);
}

learnLink.addEventListener('mouseenter', () => applyStyles('learn', 'hover'));
practiceLink.addEventListener('mouseenter', () => applyStyles('practice', 'hover'));
quizLink.addEventListener('mouseenter', () => applyStyles('quiz', 'hover'));

learnLink.addEventListener('click', (e) => {
  delayedReroute(e);
  applyStyles('learn', 'click');
});
practiceLink.addEventListener('click', (e) => {
  delayedReroute(e);
  applyStyles('practice', 'click');
});
quizLink.addEventListener('click', (e) => {
  delayedReroute(e);
  applyStyles('quiz', 'click');
});

/**
 * Prevent mouseleave event from resetting click event styling
 */
const handleMouseLeave = () => {
  if (isRerouting) return;
  crapReset();
}

/**
 * Executes crapReset if the page is loaded from the BFCache (back button).
 * @param {Event} e - pageshow event
 */
window.addEventListener('pageshow', (e) => {
  if (e.persisted) {
    crapReset();
    isRerouting = false; 
  }
});

learnLink.addEventListener('mouseleave', handleMouseLeave);
practiceLink.addEventListener('mouseleave', handleMouseLeave);
quizLink.addEventListener('mouseleave', handleMouseLeave);