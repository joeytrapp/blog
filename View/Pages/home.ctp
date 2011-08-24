<h1>Hi, I'm Joey.</h1>

<p>This is my blog. I'm a web developer at <a href="http://loadsys.com" target="_blank">Loadsys</a>. We make web applications using CakePHP. I'm also interested in Ruby and the frameworks Rails and Sinatra. I'll also try to write some about JavaScript. Typically I use jQuery, and I'm getting into Backbone and CoffeeScript.</p>

<h4>Recent Articles</h4>

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
	<?php echo $post['Post']['description']; ?>
<?php endforeach; ?>