<h1>Hi, I'm Joey.</h1>

<p>This is my blog. I'm a web developer at <a href="http://loadsys.com">Loadsys</a>. We make web applications using <a href="http://cakephp.org">CakePHP</a>. I'm also interested in <a href="http://ruby-lang.org">Ruby</a> and the frameworks <a href="http://rubyonrails.org">Rails</a> and <a href="http://sinatrarb.com">Sinatra</a>. I'll also try to write some about JavaScript. Typically I use <a href="http://jquery.com">jQuery</a>, and I'm getting into <a href="http://documentcloud.github.com/backbone/">Backbone.js</a> and <a href="http://jashkenas.github.com/coffee-script/">CoffeeScript</a>.</p>

<h4>Recent Articles</h4>

<div class="lists">
<?php $posts = ClassRegistry::init('Post')->latest(3); ?>
<?php foreach ($posts as $post): ?>
	<h2><?php echo $this->Html->link(
		__($post['Post']['title']),
		array(
			'controller' => 'posts',
			'action' => 'view',
			$post['Post']['slug']
		)
	); ?></h2>
	<p class="subinfo">
		<?php echo date('m/d/Y', strtotime($post['Post']['publish_date'])); ?>
	</p>
	<?php echo $post['Post']['description']; ?>
<?php endforeach; ?>
</div>
