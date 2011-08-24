<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout; ?> - Joey Trapp</title>
	<?php echo $this->Html->meta('icon'); ?>
	<?php echo $this->Html->css('style'); ?>
	<?php echo $this->Html->css('highlight/zenburn'); ?>
	<?php echo $this->Html->script('libs/jquery-1.6.2');	?>
	<?php echo $this->Html->script('libs/underscore'); ?>
	<?php echo $this->Html->script('libs/backbone'); ?>
	<?php echo $this->Html->script('libs/modernizr-2.0.6.min.js'); ?>
	<?php echo $this->Html->script('libs/highlight.pack'); ?>
	<?php echo $scripts_for_layout; ?>
</head>
<body>
	<div class="container">
		<header class="header">
			
		</header>
		<div class="content">
			<?php echo $this->Session->flash(); ?>
			<section class="main">
				<?php echo $content_for_layout; ?>
			</section>
			<?php echo $this->element('menu'); ?>
		</div>
	</div>
	<footer class="footer">
		<?php echo $this->Html->link(
			__('Posts'),
			array(
				'controller' => 'posts',
				'action' => 'index'
			)
		); ?>
		<?php echo $this->Html->link(
			__('Twitter'),
			'http://twitter.com/#!/joeytrapp',
			array('target' => '_blank')
		); ?>
		<?php echo $this->Html->link(
			__('Loadsys'),
			'http://loadsys.com',
			array('target' => '_blank')
		); ?>
	</footer>
	<script src="<?php echo Router::url('/js/script.js'); ?>" defer></script>
	<script src="<?php echo Router::url('/js/plugins.js'); ?>" defer></script>
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