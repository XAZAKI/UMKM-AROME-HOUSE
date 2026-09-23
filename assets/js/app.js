document.addEventListener('DOMContentLoaded', () => {
  const slides = document.querySelectorAll('.ad-slide');
  const dots = document.querySelectorAll('.ad-dot');
  if (!slides.length) return;
  let current = 0;
  const show = (index) => {
    current = (index + slides.length) % slides.length;
    slides.forEach((s, i) => s.classList.toggle('active', i === current));
    dots.forEach((d, i) => d.classList.toggle('active', i === current));
  };
  dots.forEach((dot, i) => dot.addEventListener('click', () => show(i)));
  setInterval(() => show(current + 1), 4500);
});
