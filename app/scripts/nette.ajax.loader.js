//TODO: browser native loading ajax requests... instead of crappy overlays and spinners...
//TODO: simulate native loading using dummy iframe in some browsers
(function ($, element) {

	$.nette.ext('loader', {
		start: function (xhr, settings) {
			if (!this.requests++) {
				element.classList.add(this.class);
			}
		},
		complete: function (xhr, status, settings) {
			if (!--this.requests) {
				element.classList.remove(this.class);
			}
		}
	}, {
		requests: 0,
		class: 'loading'
	});

})(window.jQuery, document.documentElement);
