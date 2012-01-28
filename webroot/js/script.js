(function() {

  $(function() {
    $("textarea[data-tabby]").tabby();
    return $("pre").each(function(i, e) {
      return hljs.highlightBlock(e, '  ');
    });
  });

}).call(this);
