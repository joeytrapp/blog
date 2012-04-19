$(function() {
	$("textarea[data-tabby]").tabby();
	setTimeout(function () {
		$(".alert").fadeOut(function() { $(this).remove(); });
	}, 3000);
});