<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo $title_for_layout; ?> - Joey Trapp</title>
	<?php echo $this->Html->meta('icon'); ?>
	<?php echo $this->Html->css(array('app', 'rainbow/github')); ?>
	<?php echo $this->Html->script('libs/modernizr-2.5.2.min.js'); ?>
	<?php echo $scripts_for_layout; ?>
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a href="<?php echo Router::url("/"); ?>" class="brand">Joey Trapp</a>
				<ul class="nav">
					<li><?php echo $this->Html->link("Posts", "/posts"); ?></li>
					<li><?php echo $this->Html->link("About Me", "/about"); ?></li>
					<?php if (AuthComponent::user()): ?>
						<li><?php echo $this->Html->link('New Post', "/posts/add"); ?></li>
						<li><?php echo $this->Html->link('Logout', "/logout"); ?></li>
					<?php endif; ?>
				</ul>
				<?php /*<div class="pull-right">
					<form action="/posts" class="navbar-search">
						<input type="text" name="q" class="input-medium search-query" placeholder="Search">
					</form>
				</div> */ ?>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="span12">
				<?php echo $this->TwitterBootstrap->flashes(); ?>
				<?php echo $content_for_layout; ?>
			</div>
		</div>
	</div>
		
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="span4">
					<h3>Me being social</h3>
					<a href="http://twitter.com/#!/joeytrapp">@joeytrapp on Twitter</a><br>
					<a href="http://github.com/joeytrapp">joeytrapp on GitHub</a>
				</div>
				<div class="span4">
					<h3><a href="http://loadsys.com">Loadsys Web Strategies</a></h3>
					<a href="http://twitter.com/#!/loadsys">@loadsys on Twitter</a><br>
					<a href="http://github.com/loadsys">Loadsys on GitHub</a>
				</div>
			</div>
		</div>
	</footer>
	
	<?php echo $this->Html->script(array(
		'libs/jquery-1.7.2.min',
		'libs/jquery.textarea',
		'libs/date',
		'libs/rainbow-custom.min',
		'script'
	));	?>
	
	<?php echo $this->element('sql_dump'); ?>
	
	<script>
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-7217386-2']);
		_gaq.push(['_trackPageview']);
		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
</body>
</html>
