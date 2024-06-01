import { errorToast, successToast } from './toastify';

export function contactUsPage() {
	const main = document.querySelector('main.contact-us');
	const contactUsPageForm = document.querySelector('form#contactUsPage');

	if (!main || !contactUsPageForm) return;

	contactUsPageForm.addEventListener('submit', (e) => {
		e.preventDefault();
		const formData = new FormData(contactUsPageForm, e.submitter);
		formData.append('_nonce', restDetails.nonce);

		jQuery(($) => {
			$.ajax({
				type: 'POST',
				url: restDetails.url + 'cyn-api/v1/forms/contact-page',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,

				success: (res) => {
					successToast.showToast();
					contactUsPageForm.reset();
				},

				error: (error) => {
					errorToast.showToast();
					console.log(error);
				},
			});
		});
	});
}

contactUsPage();

export function contactUsPopup() {
	const contactFormPopUp = document.getElementById('contactFormPopUp');

	if (!contactFormPopUp) return;

	const form = contactFormPopUp.querySelector('form');

	form.addEventListener('submit', (e) => {
		e.preventDefault();
		const formData = new FormData(form, e.submitter);
		formData.append('_nonce', restDetails.nonce);

		jQuery(($) => {
			$.ajax({
				type: 'POST',
				url: restDetails.url + 'cyn-api/v1/forms/contact-popup',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,

				success: (res) => {
					successToast.showToast();
					form.reset();
				},

				error: (error) => {
					errorToast.showToast();
					console.log(error);
				},
			});
		});
	});
}

contactUsPopup();
