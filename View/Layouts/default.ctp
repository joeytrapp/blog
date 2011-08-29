<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo $title_for_layout; ?> - Joey Trapp</title>
	<?php echo $this->Html->meta('icon'); ?>	
	
	<?php if (Configure::read('debug')): ?>
		<?php echo $this->Html->css('style'); ?>
		<?php echo $this->Html->css('highlight/zenburn'); ?>
		<?php echo $this->Html->script('libs/jquery-1.6.2');	?>
		<?php echo $this->Html->script('libs/underscore'); ?>
		<?php echo $this->Html->script('libs/backbone'); ?>
		<?php echo $this->Html->script('libs/modernizr-2.0.6.min.js'); ?>
		<?php echo $this->Html->script('libs/highlight/highlight.pack'); ?>
	<?php else: ?>
		<?php echo $this->Html->css('application.css'); ?>
		<?php echo $this->Html->script('libs/libs'); ?>
	<?php endif; ?>
	
	<?php echo $scripts_for_layout; ?>
</head>
<body>
	<div id="container" class="clearfix">
		
		<?php /* <header class="header" role="banner"></header> */ ?>
		
		<div id="main" role="main">
			<?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>
		</div>
		
		<aside id="menu">
			<h3><a href="/">joeytrapp</a></h3>
			<?php echo $this->Html->link(
				__('Posts'),
				array(
					'controller' => 'posts',
					'action' => 'index'
				)
			); ?>
			<a href="/about">About Me</a>
			<?php if (AuthComponent::user()): ?>
				<?php echo $this->Html->link(
					__('New Post'),
					array(
						'controller' => 'posts',
						'action' => 'add'
					)
				); ?>
				<?php echo $this->Html->link(
					__('Logout'),
					array(
						'controller' => 'users',
						'action' => 'logout'
					)
				); ?>
			<?php endif; ?>
			
			<h3>Me being social</h3>
			<a href="http://twitter.com/#!/joeytrapp">@joeytrapp</a>
			<a href="http://github.com/joeytrapp">joeytrapp on GitHub</a>
			
			<h3><a href="http://loadsys.com">Loadsys Web Strategies</a></h3>
			<a href="http://twitter.com/#!/loadsys">@loadsys</a>
			<a href="http://github.com/loadsys">Loadsys on GitHub</a>
		</aside>
		
	</div>
	
	<footer class="footer">
	
	</footer>
	
	<?php if (Configure::read('debug')): ?>
		<script src="<?php echo Router::url('/js/script.js'); ?>" defer></script>
		<script src="<?php echo Router::url('/js/plugins.js'); ?>" defer></script>
	<?php else: ?>
		<script src="<?php echo Router::url('/js/application.js'); ?>" defer></script>
	<?php endif; ?>
	
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