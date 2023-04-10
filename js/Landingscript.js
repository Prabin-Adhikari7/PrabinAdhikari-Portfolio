const sections = document.querySelectorAll('section');
const navLinks = document.querySelectorAll('header nav a');

window.addEventListener('scroll', () => {
  const currentPos = window.scrollY;
  sections.forEach(section => {
    const sectionTop = section.offsetTop - 150;
    const sectionHeight = section.offsetHeight;
    const sectionId = section.getAttribute('id');
    if (currentPos >= sectionTop && currentPos < sectionTop + sectionHeight) {
      navLinks.forEach(link => {
        link.classList.remove('active');
      });
      document.querySelector(`a[href="#${sectionId}"]`).classList.add('active');
    }
  });
});
