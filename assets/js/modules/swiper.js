import { Swiper } from 'swiper';
import {
	FreeMode,
	Thumbs,
	Pagination,
	Navigation,
	Autoplay,
} from 'swiper/modules';

export const generalThumbnailSwiper = new Swiper('#generalThumbnailSwiper', {
	modules: [FreeMode, Thumbs],
	slidesPerView: 3,
	spaceBetween: 12,
	freeMode: true,
	watchSlidesProgress: true,
});

export const generalMainSwiper = new Swiper('#generalMainSwiper', {
	modules: [Thumbs, Pagination],
	spaceBetween: 12,
	autoHeight: true,
	thumbs: {
		swiper: generalThumbnailSwiper,
	},
	pagination: {
		el: '.swiper-pagination',
		type: 'fraction',
	},
});

export const homePageBrands = new Swiper('#homePageBrands', {
	modules: [Navigation, Autoplay],
	slidesPerView: 7,
	spaceBetween: 12,
	loop: true,
	centeredSlides: true,
	autoplay: {
		delay: 500,
		pauseOnMouseEnter: true,
	},

	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
});
