const HomeFaq = () => {
	const faqSectionItems = document.querySelectorAll(
		'.faq-section .faq-section-item'
	);

	faqSectionItems.forEach((item) => {
		const opener = item.querySelector('.faq-section-title');
		const content = item.querySelector('.faq-list');

		opener.addEventListener('click', () => {
			content.classList.toggle('active');
		});
	});

	const faqListItems = document.querySelectorAll('.faq-section .faq-list-item');

	faqListItems.forEach((item) => {
		const opener = item.querySelector('h5');
		const content = item.querySelector('.faq-content');
		const icon = item.querySelector('i');

		opener.addEventListener('click', () => {
			if (content.classList.contains('active')) {
				icon.setAttribute('icon-name', 'add-square');
				content.classList.remove('active');
			} else {
				icon.setAttribute('icon-name', 'minus-square');
				content.classList.add('active');
			}
		});
	});
};

HomeFaq();
