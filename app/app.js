(function ($) {
	$.nette.ext('init').linkSelector = 'a:not([data-toggle])';
	$.nette.ext('init').formSelector = 'form';
	$.nette.ext('init').buttonSelector = null;

	$.nette.init();
})(window.jQuery);
