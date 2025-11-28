const logo = document.querySelector('.menu-icon');
const mobileNav = document.querySelector('.mobile-nav');

const mobileNavToggle = () => {
  if (!mobileNav) return;

  const isOpen = mobileNav.classList.contains('active');
  if (isOpen) {
    // close menu
    mobileNav.classList.remove('active');
    mobileNav.classList.add('closing');
    mobileNav.setAttribute('aria-hidden', 'true');
    logo.setAttribute('aria-expanded', 'false');

    mobileNav.addEventListener('animationend', () => {
      mobileNav.classList.remove('closing');
    }, { once: true });
  } else {
    // open menu
    mobileNav.classList.add('active');
    mobileNav.setAttribute('aria-hidden', 'false');
    logo.setAttribute('aria-expanded', 'true');

    // focus onto first link
    const firstLink = mobileNav.querySelector('a');
    firstLink.focus();
  }
};

const handleLogoClick = () => {
  if (!logo) return;

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