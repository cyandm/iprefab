import { activateEl, deActivateEl, definePopUp } from '../utils/functions';

const Filters = () => {
	const filterBtn = document.querySelector('.filter-btn');
	const filterPopUp = document.querySelector('#filtersPopUp');
	const filtersPopUpCloser = document.querySelector('#filtersPopUpCloser');

	if (!filterBtn) return;
	if (!filterPopUp) return;
	if (!filtersPopUpCloser) return;

	definePopUp(filterPopUp);

	filterBtn.addEventListener('click', () => {
		activateEl(filterPopUp);
	});

	filtersPopUpCloser.addEventListener('click', () => {
		deActivateEl(filterPopUp);
	});
};

Filters();
