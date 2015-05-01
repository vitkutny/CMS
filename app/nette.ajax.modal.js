(function ($, location) {
	$.nette.ext('modal', { //TODO: when using back in modal, if the state is matching state where modal opened, close it
		before: function () {
			var that = this;
			this.element.on('hidden.bs.modal', function (e) {
				that.element.remove();
				if (that.element.href) { //TODO: before refreshing, reload page from history
					//TODO: it shloud go back to the original history state (where modal opened), forgetting everything what happened in modal
					$.nette.ajax({}, that.element, e); //TODO: if clicked on target _parent or _top use href from that link
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
				$('#snippet--modal-open').html(null);
				snippets.getElement = snippets.getElementOld || snippets.getElement;
				snippets.getElementOld = null;
			});
			this.element.off('show.bs.modal').on('show.bs.modal', function () {
				snippets.getElementOld = snippets.getElementOld || snippets.getElement;
				//TODO: use getElementOld(id) and unset everything under that.container not in that.element
				snippets.getElement = function (id) {
					return that.element.add('head').find('#' + this.escapeSelector(id));
				};
				var href = location.pathname + location.search + location.hash;
				$('#snippet--modal-open').html(href); //TODO: refactor
				that.container.prepend(that.element);
				that.element.href = href;
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
			snippetsExt.updateSnippetsProxy = snippetsExt.updateSnippets;
			snippetsExt.updateSnippets = function (snippets, back) {
				if (snippets['snippet--modal-open'] != undefined) {
					that.element.modal(snippets['snippet--modal-open'] ? 'show' : 'hide');
					if (snippets['snippet--modal-open']) { //TODO: refactor
						that.element.on('shown.bs.modal', function (e) {
							$.nette.ajax({}, {href: snippets['snippet--modal-open']}, e);
						});
					}
				}
				return $.proxy(snippetsExt.updateSnippetsProxy, snippetsExt)(snippets, back);
			};
			var historyExt = $.nette.ext('history');
			historyExt.handleUIProxy = historyExt.handleUI;
			historyExt.handleUI = function (domCache) {
				var found = [];
				return $.proxy(historyExt.handleUIProxy, historyExt)(domCache.filter(function (snippet) {
					if (found[snippet.id]) {
						return false;
					}
					return found[snippet.id] = true;
				}));
			};
		}
	}, {
		open: '[target=_blank]',
		selector: '#modal',
		element: null,
		container: null
	});
})(window.jQuery, window.location);//TODO: dont open modal using CMD/CTRL + click
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
