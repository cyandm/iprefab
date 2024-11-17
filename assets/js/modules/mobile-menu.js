const mobileMenuHandler = document.querySelector(
	'.header-mobile-menu i[icon-name="hamburger-menu"]'
);

const mobileMenuPanel = document.querySelector('.header-mobile-menu-panel');

mobileMenuHandler.addEventListener('click', () => {
	const iconName = mobileMenuHandler.getAttribute('icon-name');

	if (iconName === 'x') {
		mobileMenuHandler.setAttribute('icon-name', 'hamburger-menu');
	} else {
		mobileMenuHandler.setAttribute('icon-name', 'x');
	}

	mobileMenuPanel.classList.toggle('active');
	document.body.classList.toggle('has-mobile-menu');
});
