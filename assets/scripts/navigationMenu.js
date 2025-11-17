const logo = document.querySelector('.menu-icon');
const mobileNav = document.querySelector('.mobile-nav');

const mobileNavToggle = () => {
  if (mobileNav.classList.contains('active')) {
    // Mobile Nav opened
    mobileNav.classList.remove('active')
    mobileNav.classList.add('closing');

    mobileNav.addEventListener('animationend', () => {
      mobileNav.classList.remove('closing');
    }, { once: true });
  } else {
    // Mobile Nav closed
    mobileNav.classList.add('active');
  }
};

const handleLogoClick = () => {
  if (!mobileNav) return;

  // Initiate logo animation and only stop only after animation ends
  logo.classList.add('active');
  logo.addEventListener('animationend', () => {
    logo.classList.remove('active');
  }, { once: true });
  
  mobileNavToggle();
};

// Clicking a link closes the menu
const mobileLinks = document.querySelectorAll('.mobile-nav a');
mobileLinks.forEach((link) => {
  link.addEventListener('click', mobileNavToggle);
});

// Side Nav Bar
const targets = document.querySelectorAll(
  '#introduction, #contrast, #repetition, #alignment, #proximity, #conclusion'
);

const sideNavLinks = document.querySelectorAll('.contents-links a');

const options = {
  root: null, // browser viewport
  rootMargin: '-60px 0px 0px -30px',
  threshold: [0.25, 0.5] // ratios to execute callback
};

const observerCallback = (entries) => {
  entries.forEach((entry) => {
    if (!entry.isIntersecting) return;

    sideNavLinks.forEach((link) => {
      const targetId = link.getAttribute('href').substring(1); // Remove '#'
      if (targetId === entry.target.id) {
        link.classList.add('active');
      } else {
        link.classList.remove('active');
      }
    });
  });
};

const observer = new IntersectionObserver(observerCallback, options);
targets.forEach((target) => observer.observe(target));