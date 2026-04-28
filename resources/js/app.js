import "./bootstrap";
import Swiper from "swiper";
import { Navigation, Pagination, Autoplay, EffectFade } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

if (document.querySelector('.welcome-slider')) {
    const welcomeSwiper = new Swiper(".welcome-slider", {
        modules: [Navigation, Pagination, Autoplay, EffectFade],
        slidesPerView: 1,
        spaceBetween: 0,
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        loop: true,
        autoplay: {
            delay: 3000,
        },
        pagination: { el: ".swiper-pagination" },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
}

document.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector('.homeSwiper')) {
        const homeSwiper = new Swiper(".homeSwiper", {
            modules: [Navigation, Pagination], 
            slidesPerView: 1,
            spaceBetween: 30,
            loop: false,
            autoplay: false,
            autoHeight: true, 
            observer: true,
            observeParents: true,
            watchOverflow: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    }
});
