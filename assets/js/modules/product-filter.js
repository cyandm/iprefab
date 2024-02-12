import { getCookie, setCookie } from '../utils/functions';

const ProductFilter = () => {
	const cookie = getCookie('cyn-filters');
	filtersForm = document.querySelector('#filtersForm');
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

	addFormElementsToCookie(filtersForm);
	addFormElementsToCookie(sortForm);
};

ProductFilter();
