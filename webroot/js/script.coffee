$ ->
	$("textarea[data-tabby]").tabby()
	$("pre").each (i, e) ->
		hljs.highlightBlock e, '  '
