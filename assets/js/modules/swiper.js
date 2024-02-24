import { Swiper } from 'swiper';
import { FreeMode, Thumbs, Pagination } from 'swiper/modules';

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
