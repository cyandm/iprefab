const btnShare = document.getElementById('btnShare');
const titlePageEl = document.getElementById('title');

if (btnShare && titlePageEl) {
	btnShare.addEventListener('click', () => {
		navigator.share({
			url: window.location.href,
			title: titlePageEl.textContent,
		});
	});
}
