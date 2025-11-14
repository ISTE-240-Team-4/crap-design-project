const mobileNavToggle = () => {
  const logo = document.querySelector('.menu-icon');
  const mobileNav = document.querySelector('.mobile-nav');
  if (!mobileNav) return;

  // Initiate logo animation and only stop only after animation ends
  logo.classList.add('active');
  logo.addEventListener('animationend', () => {
    logo.classList.remove('active');
  }, { once: true });

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