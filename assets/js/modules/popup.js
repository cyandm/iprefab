import { activateEl, deActivateEl, definePopUp } from '../utils/functions';

function ContactForm() {
	const contactFormOpener = document.getElementById('contactFormOpener');
	const contactFormPopUp = document.getElementById('contactFormPopUp');
	const contactFormPopupCloser = document.getElementById(
		'contactFormPopupCloser'
	);
	if (!contactFormOpener || !contactFormPopUp || !contactFormPopupCloser)
		return;

	definePopUp(contactFormPopUp);
	contactFormOpener.addEventListener('click', () => {
		activateEl(contactFormPopUp);
	});

	contactFormPopupCloser.addEventListener('click', () => {
		deActivateEl(contactFormPopUp);
	});
}

ContactForm();
