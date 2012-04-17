(function() {
	/*global hljs:true*/
  $(function() {
    $("textarea[data-tabby]").tabby();
    return $("pre").each(function(i, e) {
      return hljs.highlightBlock(e, '  ');
    });
  });
}());
