$(function () {

	$.nette.ext('snippets').getElement = function (id) {
		return $('[id=' + this.escapeSelector(id) + ']');
	};
	$.nette.ext('snippets').updateSnippets = function (snippets, back) {
		var that = this;
		var elements = [];
		for (var i in snippets) {
			this.getElement(i).each(function () {
				var $el = $(this);
				if ($el.get(0)) {
					elements.push($el.get(0));
				}
				that.updateSnippet($el, snippets[i], back);
			});
		}
		$(elements).promise().done(function () {
			that.completeQueue.fire();
		});
	};

	$.nette.ext('init').linkSelector = 'a:not(.dropdown-toggle)';
	$.nette.ext('init').formSelector = 'form';
	$.nette.ext('init').buttonSelector = 'input[type="submit"], button[type="submit"], input[type="image"]';

	$.nette.init();
});

//TODO: change to some of load events...
$(document).on('click', '[data-notification]', function () {
	var container = $(this).hide();
	var timeout = container.data('notification') || 5000;
	var titleContainer = container.find('[data-notification-title]');
	var title = titleContainer.data('notification-title') || titleContainer.html();
	var bodyContainer = container.find('[data-notification-body]');
	var body = bodyContainer.data('notification-body') || bodyContainer.html();
	var tag = container.data('notification-tag') || body;

	Notification.requestPermission(function (result) {
		switch (result) {
			case 'granted':
				var notification = new Notification(title, {
					tag: tag,
					body: body
				});
				notification.icon = 'favicon.ico'; //TODO: pass favicon of web as notification icon
				setTimeout(function () {
					notification.close();
				}, timeout);
				break;
			default:
				container.show();
				scrollTo(container.offset().left, container.offset().top);
				break;
		}
	});
});
