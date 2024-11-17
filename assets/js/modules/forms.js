import { errorToast, successToast } from './toastify';

function createForm(formSelector, endPoint) {
	const formWrapper = document.querySelector(formSelector);

	if (!formWrapper) return;

	const form = formWrapper.querySelector('form');

	form.addEventListener('submit', (e) => {
		e.preventDefault();
		const formData = new FormData(form, e.submitter);
		formData.append('_nonce', restDetails.nonce);

		jQuery(($) => {
			$.ajax({
				type: 'POST',
				url: restDetails.url + endPoint,
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

createForm('#contactFormPopUp', 'cyn-api/v1/forms/contact-popup');
createForm('main.contact-us', 'cyn-api/v1/forms/contact-page');
createForm('#callBackPopUp', 'cyn-api/v1/forms/callback');
