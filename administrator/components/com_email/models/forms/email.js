window.addEvent('domready', function() {
	document.formvalidator.setHandler('emailTitle',
		function (value) {
			regex=/^[^0-9]+$/;
			return regex.test(value);
	});
});
