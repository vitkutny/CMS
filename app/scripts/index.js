(function ($) {
	$.nette.ext('init').linkSelector = 'a:not([data-toggle])';
	$.nette.ext('init').formSelector = 'form';
	$.nette.ext('init').buttonSelector = null;
	$.nette.ext('scroll').speed = 0;
	$.nette.ext('scroll').container = 'body, #modal';
	$.nette.ext('scroll').element = 'body, #modal > .modal-dialog';

	$.nette.init();
})(window.jQuery);
