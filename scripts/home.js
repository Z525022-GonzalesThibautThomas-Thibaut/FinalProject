const container = document.querySelector('.city-tours-cards');
const track = document.querySelector('.city-tours-cards-track');
const prevBtn = document.querySelector('.prev');
const nextBtn = document.querySelector('.next');
const pagination = document.querySelector('.indicator');

const totalSets = document.querySelectorAll('.city-tours-cards-set').length;
let currentIndex = 0;

function updateCarousel() {
    const offset = -currentIndex * container.offsetWidth;
    track.style.transform = `translateX(${offset}px)`;

    // Pagination
    pagination.textContent = `${currentIndex + 1} / ${totalSets}`;

    // Désactiver boutons
    prevBtn.disabled = currentIndex === 0;
    nextBtn.disabled = currentIndex === totalSets - 1;
}

prevBtn.addEventListener('click', () => {
    if (currentIndex > 0) {
      currentIndex--;
      updateCarousel();
    }
});

nextBtn.addEventListener('click', () => {
    if (currentIndex < totalSets - 1) {
      currentIndex++;
      updateCarousel();
    }
});

updateCarousel();