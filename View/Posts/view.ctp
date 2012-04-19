
<?php $this->set('title_for_layout', h($post->title())); ?>
<article>
	<div class="page-header">
		<h1><?php echo __($post->title()); ?></h1>
		<p class="subinfo">
			<?php echo date('m/d/Y', strtotime($post->publish_date())); ?>
			<?php if (AuthComponent::user()): ?>
				<?php echo $this->Html->link(
					__('Edit'),
					array(
						'action' => 'edit',
						$post->id()
					)
				); ?>
				<?php echo $this->Html->link(
					__('Delete'),
					array(
						'action' => 'delete',
						$post->id()
					)
				); ?>
			<?php endif; ?>
		</p>
		<?php if (!$post->ParentPost->title() || $post->ChildPost->title()): ?>
			<div class="clearfix series">
				<?php if (!$post->ParentPost->title() && $post->ParentPost->is_published()): ?>
					<?php echo $this->Html->link(
						__('<< Previous in series'),
						array(
							'action' => 'view',
							$post->ParentPost->slug()
						),
						array(
							'class' => 'pull-left'
						)
					); ?>
				<?php endif; ?>
				<?php if (!$post->ChildPost->title() && $post->ChildPost->is_published()): ?>
					<?php echo $this->Html->link(
						__('Next in series >>'),
						array(
							'action' => 'view',
							$post->ChildPost->slug()
						),
						array(
							'class' => 'pull-right'
						)
					); ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="post">
		<?php echo $post->toParsedHtml(); ?>
	</div>
</article>

<div class="page-header">
	<h2>Comments</h2>
</div>
<div class="row">
	<div class="span10">
		<div id="disqus_thread"></div>
	</div>
</div>

<script type="text/javascript">
	  var disqus_shortname = 'joeytrappsblog';
	  var disqus_identifier = '<?php echo $post->id(); ?>';
	  var disqus_url = '<?php echo Router::url(array('action' => 'view', $post->slug()), true); ?>';
	  (function() {
	      var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
	      dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
	      (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
	  })();
</script>
<noscript>
	Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a>
</noscript>
<a href="http://disqus.com" class="dsq-brlink">blog comments powered by <span class="logo-disqus">Disqus</span></a>