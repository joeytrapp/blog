(function ($) {
	$.fn.dateField = function () {
		return this.each(function () {
			var div, field, hidden;
			div = $(this);
			field = div.find("input[type=text]");
			hidden = div.find("input[type=hidden]");
			field.keyup(function () {
				var date = Date.parse(field.val());
				if (date) {
					div.removeClass("error").addClass("success");
					hidden.val(date.toString());
				} else {
					div.removeClass("success").addClass("error");
					hidden.val("");
				}
			});
		});
	};
}(jQuery));

$(function() {
	$("textarea[data-tabby]").tabby();

	setTimeout(function () {
		$(".alert").fadeOut(function() { $(this).remove(); });
	}, 3000);

	$("[data-date-field]").dateField();
});