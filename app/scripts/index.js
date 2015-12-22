(function ($, location) {
	$.nette.ext('init').linkSelector = 'a:not([data-toggle])';
	$.nette.ext('init').formSelector = 'form';
	$.nette.ext('init').buttonSelector = null;
	$.nette.ext('scroll').speed = 0;
	$.nette.ext('scroll').container = 'body, #modal';
	$.nette.ext('scroll').element = 'body, #modal > .modal-dialog';
	$.nette.ext({
		before: function (xhr, settings) {
			xhr.settings = settings;
		},
		error: function (xhr) {
			switch (xhr.settings.type) {
				case 'GET':
					location.replace(xhr.settings.url);
					break;
			}
		}
	});

	$.nette.init();
})(window.jQuery, window.location);
