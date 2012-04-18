<article>
	<h2>
		<?php echo $this->Html->link(
			__($post->title(), true),
			array(
				'action' => 'view',
				$post->slug()
			)
		); ?>
		<?php if (!$post->is_published()): ?>
			<sup>(not published)</sup>
		<?php endif; ?>
	</h2>
	<p class="subinfo">
		<?php echo date('m/d/Y', strtotime($post->publish_date())); ?>
		<?php if (AuthComponent::user()): ?>
			<?php echo $this->Html->link(
				__('Edit', true),
				array(
					'action' => 'edit',
					$post->id()
				)
			); ?>
			<?php echo $this->Html->link(
				__('Delete', true),
				array(
					'action' => 'delete',
					$post->id()
				),
				null,
				__('Are you sure you want to delete this post?', true)
			); ?>
		<?php endif; ?>
	</p>
	<p><?php echo $post->description(); ?></p>
</article>