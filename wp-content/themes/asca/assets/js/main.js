document.getElementById("btn").addEventListener("click", function () {
  this.classList.toggle("open");
  document.getElementById("Menu").classList.toggle("open");
});

const swiper = new Swiper(".home-page-swiper", {
  // Optional parameters
  direction: "horizontal",
  loop: true,
  slidesPerView: 1.5,
  spaceBetween: 130,
  watchSlidesVisibility: true,
  centeredSlides:true,
  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
  },

  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  // And if we need scrollbar
  scrollbar: {
    el: ".swiper-scrollbar",
  },
});

