<aside class="menu">
	<h3>joeytrapp</h3>
	<ul>
		<li>
			<?php echo $this->Html->link(
				__('Latest'),
				array(
					'controller' => 'posts',
					'action' => 'latest'
				)
			); ?>
		</li>
		<li>
			<?php echo $this->Html->link(
				__('Posts'),
				array(
					'controller' => 'posts',
					'action' => 'index'
				)
			); ?>
		</li>
		<?php if (AuthComponent::user()): ?>
			<li>
				<?php echo $this->Html->link(
					__('New Post'),
					array(
						'action' => 'add'
					)
				); ?>
			</li>
			<li>
				<?php echo $this->Html->link(
					__('Logout'),
					array(
						'controller' => 'users',
						'action' => 'logout'
					)
				); ?>
			</li>
		<?php endif; ?>
	</ul>
	<?php if (count($recent)): ?>
	<h3>recent</h3>
	<ul>
		<?php foreach ($recent as $post): ?>
		<li>
			<?php echo $this->Html->link(
				__($post['Post']['title']),
				array(
					'controller' => 'posts',
					'action' => 'view',
					$post['Post']['slug']
				)
			); ?>
		</li>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
</aside>