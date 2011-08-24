<aside class="menu">
	<h3><?php echo $this->Html->link('joeytrapp', '/'); ?></h3>
	<ul>
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
						'controller' => 'posts',
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
</aside>