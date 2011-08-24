(function() {
  $(function() {
    return ($('pre')).each(function(i, e) {
      return hljs.highlightBlock(e, '    ');
    });
  });
}).call(this);
