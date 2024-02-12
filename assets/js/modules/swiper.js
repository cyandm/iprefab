import { Swiper } from 'swiper';
import { FreeMode, Thumbs, Pagination } from 'swiper/modules';

export const productThumbnailSwiper = new Swiper('#productThumbnailSwiper', {
	modules: [FreeMode, Thumbs],
	slidesPerView: 3,
	spaceBetween: 12,
	freeMode: true,
	watchSlidesProgress: true,
});

export const productMainSwiper = new Swiper('#productMainSwiper', {
	modules: [Thumbs, Pagination],
	spaceBetween: 12,
	autoHeight: true,
	thumbs: {
		swiper: productThumbnailSwiper,
	},
	pagination: {
		el: '.swiper-pagination',
		type: 'fraction',
	},
});
