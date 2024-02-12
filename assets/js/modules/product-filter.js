import {
	activateEl,
	deActivateEl,
	definePopUp,
	getCookie,
	setCookie,
	toggleActivateEl,
} from '../utils/functions';

const ProductFilter = () => {
	const cookie = getCookie('cyn-filters');
	filtersForm = document.querySelectorAll('#filtersForm');
	sortForm = document.querySelector('#sortForm');

	const addFormElementsToCookie = (formEl) => {
		if (!formEl) return;
		const inputs = formEl.querySelectorAll('input');
		const selects = formEl.querySelectorAll('select');

		[inputs, selects].map((groupEl) => {
			groupEl.forEach((filter) => {
				filter.addEventListener('change', ({ target: { value } }) => {
					cookie[filter.name] = value;
					setCookie('cyn-filters', cookie);
				});
			});
		});
	};

	filtersForm.forEach((el) => {
		addFormElementsToCookie(el);
	});
	addFormElementsToCookie(sortForm);

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

ProductFilter();
