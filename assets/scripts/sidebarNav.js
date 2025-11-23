const links = {
  'learn': '#introduction, #contrast, #repetition, #alignment, #proximity, #conclusion',
  'practice': '#introduction, #contrast, #repetition, #alignment, #proximity, #conclusion',
  'quiz': '#introduction, #quiz, #conclusion',
};

const thresholds = {
  'learn': [0.4, 0.5, 0.75],
  'practice': [0.4, 0.5, 0.75],
  'quiz': [0.2, 0.3, 0.5, 0.75],
}

const getCurrentMode = () => {
  const path = window.location.pathname.toLowerCase();
  for (const mode of Object.keys(links)) {
    if (path.includes(`/${mode}`))
      return mode;
  }

  return 'learn';
}

const currentMode = getCurrentMode();
const targets = document.querySelectorAll(
  links[currentMode]
);

const sideNavLinks = document.querySelectorAll('.contents-links a');

const options = {
  root: null, // browser viewport
  rootMargin: '-60px 0px -50px -30px',
  threshold: thresholds[currentMode] // ratios to execute callback
};

const observerCallback = (entries) => {
  entries.forEach((entry) => {
    if (!entry.isIntersecting) return;

    sideNavLinks.forEach((link) => {
      if (!link) return;

      const targetId = link.getAttribute('href').substring(1); // Remove '#'
      if (targetId === entry.target.id) {
        link.classList.add('active');
        link.setAttribute('aria-current', 'location');
      } else {
        link.classList.remove('active');
        link.removeAttribute('aria-current');
      }
    });
  });
};

const observer = new IntersectionObserver(observerCallback, options);
targets.forEach((target) => observer.observe(target));