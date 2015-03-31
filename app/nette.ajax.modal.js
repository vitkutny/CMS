(function ($, location) {
	$.nette.ext('modal', {
		before: function () {
			var that = this;
			this.element.on('hidden.bs.modal', function (e) {
				that.element.remove();
				if (that.element.href) {
					$.nette.ajax({}, that.element, e);
					that.element.href = null;
				}
			});
		},
		load: function () {
			var that = this;
			$(this.open).on('click', function () {
				that.element.modal('show');
			});
			var snippets = $.nette.ext('snippets');
			this.element.off('hide.bs.modal').on('hide.bs.modal', function () {
				snippets.getElement = snippets.getElementOld || snippets.getElement;
				snippets.getElementOld = null;
			});
			this.element.off('show.bs.modal').on('show.bs.modal', function () {
				snippets.getElementOld = snippets.getElementOld || snippets.getElement;
				//TODO: use getElementOld(id) and unset everything under that.container not in that.element
				snippets.getElement = function (id) {
					return that.element.add('head').find('#' + this.escapeSelector(id)); //TODO: add elements thar are not in that.element
				};
				that.container.prepend(that.element);
				that.element.href = location.pathname;
			});
		},
		init: function () {
			this.element = $(this.selector);
			this.container = this.element.parent();
			this.element.modal({
				show: false
			});
			this.element.remove();
		}
	}, {
		open: '[target=_blank]',
		selector: '#modal',
		element: null,
		container: null
	});
})(window.jQuery, window.location);

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
