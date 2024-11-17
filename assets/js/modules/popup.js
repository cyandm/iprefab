import { activateEl, deActivateEl, definePopUp } from '../utils/functions';

function createPopup(popupSelector, closersSelectors, openersSelectors) {
	const popup = document.querySelector(popupSelector);
	const closers = document.querySelectorAll(closersSelectors);
	const openers = document.querySelectorAll(openersSelectors);

	if ((!popup, !closers, !openers)) return;
	definePopUp(popup);

	openers.forEach((opener) => {
		opener.addEventListener('click', () => {
			activateEl(popup);
		});
	});

	closers.forEach((closer) => {
		closer.addEventListener('click', () => {
			deActivateEl(popup);
		});
	});
}

createPopup(
	'#contactFormPopUp',
	'#contactFormPopupCloser',
	'#contactFormOpener'
);

createPopup('#callBackPopUp', '#callBackPopupCloser', '.callback-opener');
