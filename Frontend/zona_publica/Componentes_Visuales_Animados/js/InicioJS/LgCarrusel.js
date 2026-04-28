// --- Carrusel ---
const track   = document.getElementById('carouselTrack');
const dots    = document.querySelectorAll('.dot');
const total   = 3;
let current   = 0;
let timer;

function goTo(index) {
  current = (index + total) % total;
  track.style.transform = `translateX(-${current * (100 / 3)}%)`;
  dots.forEach((d, i) => d.classList.toggle('active', i === current));
}

function next() { goTo(current + 1); }
function prev() { goTo(current - 1); }

function startAuto() {
  clearInterval(timer);
  timer = setInterval(next, 5000);
}

document.getElementById('nextBtn').addEventListener('click', () => { next(); startAuto(); });
document.getElementById('prevBtn').addEventListener('click', () => { prev(); startAuto(); });
dots.forEach(d => d.addEventListener('click', () => { goTo(+d.dataset.index); startAuto(); }));

startAuto();

// --- Navbar scroll ---
window.addEventListener('scroll', () => {
  document.querySelector('.navbar').classList.toggle('scrolled', window.scrollY > 40);
});

// --- Hamburger ---
const ham  = document.getElementById('hamburger');
const links = document.querySelector('.nav-links');
ham.addEventListener('click', () => {
  ham.classList.toggle('open');
  links.classList.toggle('mobile-open');
});

// --- Carrusel Ganado ---
const ganadoTrack = document.getElementById('ganadoTrack');
const gdots = document.querySelectorAll('.gdot');
const totalGanado = 6;
const visibles = 3;
let ganadoCurrent = 0;
let ganadoTimer;

function ganadoGoTo(index) {
  const max = totalGanado - visibles;
  ganadoCurrent = Math.max(0, Math.min(index, max));
  const card = ganadoTrack.children[0];
  const cardWidth = card.getBoundingClientRect().width + 24;
  ganadoTrack.style.transform = `translateX(-${ganadoCurrent * cardWidth}px)`;
  gdots.forEach((d, i) => d.classList.toggle('active', d.dataset.index == ganadoCurrent));
}

function ganadoNext() {
  ganadoGoTo(ganadoCurrent >= totalGanado - visibles ? 0 : ganadoCurrent + visibles);
}

function ganadoPrev() {
  ganadoGoTo(ganadoCurrent <= 0 ? totalGanado - visibles : ganadoCurrent - visibles);
}

function ganadoStartAuto() {
  clearInterval(ganadoTimer);
  ganadoTimer = setInterval(ganadoNext, 7000);
}

document.getElementById('ganadoNext').addEventListener('click', () => { ganadoNext(); ganadoStartAuto(); });
document.getElementById('ganadoPrev').addEventListener('click', () => { ganadoPrev(); ganadoStartAuto(); });
gdots.forEach(d => d.addEventListener('click', () => { ganadoGoTo(+d.dataset.index); ganadoStartAuto(); }));

ganadoStartAuto();