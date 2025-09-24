document.addEventListener("DOMContentLoaded", function() {
  var swiper = new Swiper(".mySwiper", {
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      bulletClass: "swiper-pagination-bullet !bg-green-100",
      bulletActiveClass: "swiper-pagination-bullet-active !bg-white",
    },
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    slidesPerView: 1,
    spaceBetween: 24,
    breakpoints: {
      768: { slidesPerView: 2 },
      1024: { slidesPerView: 3 }
    }
  });
 

});
