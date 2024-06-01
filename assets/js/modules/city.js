import { getCookie, setCookie } from '../utils/functions';

export function city() {
	jQuery(($) => {
		const defaultOption = document.createElement('option');
		defaultOption.innerText = getCookie('cyn-filters')['city'];
		defaultOption.setAttribute('selected', 'selected');
		$('.city-select-2').append(defaultOption);

		$('.city-select-2').select2({
			placeholder: 'Select an option',
			width: '100%',
			ajax: {
				url: restDetails.url + 'cyn-api/v1/cities',
				dataType: 'json',
				processResults: (data) => {
					return {
						results: data,
					};
				},
			},
		});

		$('.city-select-2').on('change', ({ target: { value } }) => {
			const cookie = getCookie('cyn-filters');

			cookie['city'] = value;
			setCookie('cyn-filters', cookie);
		});
	});
}

city();
