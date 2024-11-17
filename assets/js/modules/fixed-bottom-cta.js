import { activateEl, deActivateEl } from '../utils/functions';
import { setCssVariable } from './variable';

const fixedBottomCta = (trigger, cta) => {
	const triggerEl = document.querySelector(trigger);
	const ctaEl = document.querySelector(cta);

	if (!ctaEl || !triggerEl) return;

	const handleObserver = (entries) => {
		if (
			entries[0].isIntersecting === true || //not showing in page
			entries[0].boundingClientRect.top > 0 //after target
		) {
			deActivateEl(ctaEl);
			return;
		}

		activateEl(ctaEl);
	};

	const observer = new IntersectionObserver(handleObserver, {
		root: null,
		rootMargin: '0px',
		threshold: 1.0,
	});

	observer.observe(triggerEl);

	const footerEl = document.querySelector('footer.site-footer');
	if (!footerEl) return;

	setCssVariable(ctaEl.getClientRects()[0].height, 'ctaHeight', footerEl);
};

fixedBottomCta('.general-actions-primary', '#bottomCta');
