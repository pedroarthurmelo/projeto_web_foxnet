const prevButton = document.querySelector('.product-carousel-2-prev');
const nextButton = document.querySelector('.product-carousel-2-next');
const carouselWrapper = document.querySelector('.product-carousel-2-wrapper');

const totalCards = document.querySelectorAll('.product-card-carousel2').length;
const cardsPerSlide = 3; // Número de cards por slide
const totalSlides = Math.ceil(totalCards / cardsPerSlide); // Total de slides

let currentSlide = 0;

nextButton.addEventListener('click', () => {
    currentSlide = (currentSlide + 1) % totalSlides; // Navega para o próximo slide
    carouselWrapper.style.transform = `translateX(-${currentSlide * (100 / totalSlides)}%)`;
});

prevButton.addEventListener('click', () => {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides; // Navega para o slide anterior
    carouselWrapper.style.transform = `translateX(-${currentSlide * (100 / totalSlides)}%)`;
});