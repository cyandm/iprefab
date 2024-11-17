import Toastify from 'toastify-js';

const successColor = '#4caf50';
const errorColor = '#ef5350';

export const successToast = Toastify({
	text: 'Form sends successfully!',
	style: {
		background: successColor,
	},
});

export const errorToast = Toastify({
	text: 'an error has occurred!',
	style: {
		background: errorColor,
	},
});
