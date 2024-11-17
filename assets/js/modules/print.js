const cynPrint = () => {
	const printBtn = document.querySelector('#btnPrint');
	if (!printBtn) return;

	printBtn.addEventListener('click', () => {
		var css = '@page { size: 420mm 297mm; }',
			head = document.head || document.getElementsByTagName('head')[0],
			style = document.createElement('style');

		style.type = 'text/css';
		style.media = 'print';

		if (style.styleSheet) {
			style.styleSheet.cssText = css;
		} else {
			style.appendChild(document.createTextNode(css));
		}

		head.appendChild(style);

		window.print();
	});
};

cynPrint();
