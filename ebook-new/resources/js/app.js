import './bootstrap';
import 'flowbite';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

// Swiper

const swiper = new Swiper('.swiper', {
    slidesPerGroup: 1,
    slidesPerView: "auto",
    loopFillGroupWithBlank: true,
    grabCursor: true,

    //Pagination
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },

    // Navigation Arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // Mouser Wheel
    mousewheel: {
        mousewheelControl: true,
    },

});
