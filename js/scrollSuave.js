//Pegar somente link interno
const menuNav = document.querySelectorAll('.nav-link[href^="#"]');

menuNav.forEach((acao) => {
  acao.addEventListener('click', scrollSuave);
});

function scrollSuave(event) {
  event.preventDefault();
  const element = event.target;
  element.classList.add('active')
  const id = element.getAttribute('href');
  const section = document.querySelector(id);

  window.scroll({
    top: section.offsetTop - 80,
    behavior:"smooth"

  });
}
