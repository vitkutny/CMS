//TODO: browser native loading ajax requests... instead of crappy overlays and spinners...

(function ($) {

	$.nette.ext('loader', {
		start: function (xhr, settings) {
			if (!settings.nette) {
				return;
			}
			var loader = settings.nette.el.closest('[id^="snippet-"]') || $('#ajax-spinner');
			loader = loader.add(settings.nette.el);
			loader.attr('data-ajax-loader', '');
			this.loaders.push(loader);
		},
		complete: function (xhr, status, settings) {
			if (!settings.nette) {
				return;
			}
			var loader = this.loaders.shift();
			loader.removeAttr('data-ajax-loader');
		}
	}, {
		loaders: []
	});

})(window.jQuery);
