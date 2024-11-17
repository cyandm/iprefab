import { getCookie, setCookie } from '../utils/functions';

export function city() {
	//SELECT 2
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

	//SEARCH BOX
	document.querySelectorAll('.citySearch')?.forEach((el) => {
		const input = el.querySelector('input');

		const searchResults = document.createElement('div');
		searchResults.classList.add('search-results');
		el.appendChild(searchResults);

		document.addEventListener('click', (ev) => {
			if (ev.target == input) return;
			searchResults.classList.remove('active');
		});

		input.addEventListener('keyup', (e) => {
			if (e.target.value.length < 3) {
				searchResults.innerHTML = 'search input must be more than 3 character.';
				return;
			}
			jQuery(($) => {
				$.ajax({
					type: 'GET',
					url: restDetails.url + 'cyn-api/v1/cities',
					data: {
						q: e.target.value,
					},

					success: function (response) {
						searchResults.innerHTML = '';

						if (response.length === 0) {
							searchResults.innerHTML =
								'Sorry! we not found your city in our database';
						}

						response.forEach((resItem) => {
							const div = document.createElement('div');
							div.innerText = resItem.text;

							div.addEventListener('click', () => {
								input.value = resItem.text;
								searchResults.classList.remove('active');
							});

							searchResults.appendChild(div);
						});

						searchResults.classList.add('active');
					},
				});
			});
		});
	});
}

city();
