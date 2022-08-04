//Pegar somente link interno
const menuNav = document.querySelectorAll('.nav-link[href^="#"]');
const btnMobileScroll = document.getElementById('btn-mobile');

menuNav.forEach((acao) => {
  acao.addEventListener('click', scrollSuave);
});

function scrollSuave(event) {
  event.preventDefault();
  const element = event.target;
  element.classList.add('active')
  const id = element.getAttribute('href');
  const section = document.querySelector(id);
  const navScroll = document.querySelector('.menu-nav')
  navScroll.classList.toggle('active')
  

  window.scroll({
    top: section.offsetTop - 80,
    behavior:"smooth"

  });
}
