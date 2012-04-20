$(function() {
	$("textarea[data-tabby]").tabby();

	setTimeout(function () {
		$(".alert").fadeOut(function() { $(this).remove(); });
	}, 3000);

	$("#publish-date-raw").keyup(function () {
		var field = $(this), hidden = $("#publish-date");
		if (Date.parse(field.val())) {
			hidden.val(Date.parse(field.val()));
			field.parent().parent().removeClass("error").addClass("success");
		} else {
			hidden.val("");
			field.parent().parent().removeClass("success").addClass("error");
		}
	});
});