import { activateEl, deActivateEl } from '../utils/functions';

const fixedBottomCta = (trigger, cta) => {
	const trigger = document.querySelector(trigger);
	const cta = document.querySelector(cta);

	if (!cta || !trigger) return;

	const handleObserver = (entries) => {
		if (
			entries[0].isIntersecting === true || //not showing in page
			entries[0].boundingClientRect.top > 0 //after target
		) {
			deActivateEl(cta);
			return;
		}

		activateEl(cta);
	};

	const observer = new IntersectionObserver(handleObserver, {
		root: null,
		rootMargin: '0px',
		threshold: 1.0,
	});

	observer.observe(trigger);
};

fixedBottomCta('.product-actions-primary', '#bottomCta');
l;
