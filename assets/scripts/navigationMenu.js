const mobileNavToggle = () => {
  const mobileNav = document.querySelector('.mobile-nav');
  if (!mobileNav) return;

  if (mobileNav.style.display === 'block') {
    mobileNav.style.display = 'none';
  } else {
    mobileNav.style.display = 'block';
  }

  mobileNav.classList.toggle('active');
};