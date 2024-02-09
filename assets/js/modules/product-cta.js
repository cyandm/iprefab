const ProductCTA = () => {
	const productCtaGroup = document.querySelectorAll('.product-cta');
	if (!productCtaGroup) return;

	productCtaGroup.forEach((el) => {
		const checkbox = el.querySelector('input');
		const button = el.querySelector('.btn-primary');

		checkbox.addEventListener('change', () => {
			button.toggleAttribute('disabled', !checkbox.checked);
		});
	});
};

ProductCTA();
