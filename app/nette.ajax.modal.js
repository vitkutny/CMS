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
				$('#snippet--modal-open').html(0);
				snippets.getElement = snippets.getElementOld || snippets.getElement;
				snippets.getElementOld = null;
			});
			this.element.off('show.bs.modal').on('show.bs.modal', function () {
				$('#snippet--modal-open').html(1);
				snippets.getElementOld = snippets.getElementOld || snippets.getElement;
				//TODO: use getElementOld(id) and unset everything under that.container not in that.element
				snippets.getElement = function (id) {
					return that.element.add('head').find('#' + this.escapeSelector(id));
				};
				that.container.prepend(that.element);
				that.element.href = location.pathname + location.search + location.hash;
			});
		},
		init: function () {
			this.element = $(this.selector);
			this.container = this.element.parent();
			this.element.modal({
				show: false
			});
			this.element.remove();
			var that = this;
			var snippetsExt = $.nette.ext('snippets');
			var snippetsExtUpdateSnippets = snippetsExt.updateSnippets;
			snippetsExt.updateSnippets = function (snippets, back) {
				if (snippets['snippet--modal-open'] != undefined) {
					console.log(snippets['snippet--modal-open']);
					that.element.modal(snippets['snippet--modal-open'] == 1 ? 'show' : 'hide');
					console.log(snippets);
				}
				return $.proxy(snippetsExtUpdateSnippets, snippetsExt)(snippets, back);
			};
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
