(function ($) {
	$.nette.ext('modal', {
		before: function (xhr, settings) {
			if (!settings.nette) {
				return;
			}
			this.element = settings.nette.el.filter(this.filter);
			if (this.element.length) {
				$('#modal').modal({});
			}
		}
	}, {
		filter: '[target=_blank]',
		element: null
	});
})(window.jQuery);


/*
 TODO: modal using html <a> and <form> target attribute, only on click without modifier(new tab/window)
 _blank - opens modal
 _self - (default) opens link in opened modal
 _parent - redraw on parent (body or parent modal window)
 _top - redraw on the body element
 */

//$.nette.ext('bs-modal', {
//	init: function () {
//		this.ext('snippets', true).after($.proxy(function ($el) {
//			if (!$el.is('.modal')) {
//				return;
//			}
//
//			$el.modal({});
//
//		}, this));
//	}
//});
