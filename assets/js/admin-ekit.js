(function ($) {
	'use strict';

	var ekit_refer_linklist = 'https://gist.githubusercontent.com/enamul-hoque/073664d90db177fe6bac542a6a8399eb/raw/';

	$(function () {
		$.getJSON(ekit_refer_linklist, function (res) {
			res.forEach(function (el) {
				$( el.target ).attr('href', el.link);
			});
		});
	});
}(jQuery));
