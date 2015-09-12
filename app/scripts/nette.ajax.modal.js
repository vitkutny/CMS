//TODO: refactor : when modal open, save history stack and create new empty one, on modal close restore that stack and refresh the last opened page
(function ($, location) {
	$.nette.ext('modal', {
		before: function () {
			var that = this;
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
					return that.element.add('head').find('#' + this.escapeSelector(id));
				};
				that.distance = 0;
				that.state = history.state;
				that.container.prepend(that.element);
			});
			this.element.on('hidden.bs.modal', function (e) {
				that.element.remove();
				if (that.distance) {
					history.go(-that.distance);
					that.distance = 0;
				}
				console.log(that.state);
				//$.nette.ajax({
				//	url: that.state.href,
				//	off: ['history']
				//});
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
			$(window).on('popstate.nette', function (event) {
				if (that.distance > 0) {
					that.distance--;
				} else {
					that.element.modal('hide');
					that.element.remove();
				}
			});
			var popstateEvents = $._data(window, 'events').popstate;
			popstateEvents.unshift(popstateEvents.pop());
			var pushState = history.pushState;
			history.pushState = function (data, title, url) {
				that.distance++;
				return $.proxy(pushState, history)(data, title, url);
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
		container: null,
		distance: 0,
		state: null
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
