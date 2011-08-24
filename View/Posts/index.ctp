<?php if (count($posts)): ?>
	<?php foreach($posts as $post): ?>
		<article>
			<h3>
				<?php echo $this->Html->link(
					__($post['Post']['title'], true),
					array(
						'action' => 'view',
						$post['Post']['slug']
					)
				); ?>
				<?php if (!$post['Post']['is_published']): ?>
					<sup>(not published)</sup>
				<?php endif; ?>
			</h3>
			<p class="subinfo">
				<?php echo date('m/d/Y', strtotime($post['Post']['publish_date'])); ?>
				<?php if (AuthComponent::user()): ?>
					<?php echo $this->Html->link(
						__('Edit', true),
						array(
							'action' => 'edit',
							$post['Post']['id']
						)
					); ?>
					<?php echo $this->Html->link(
						__('Delete', true),
						array(
							'action' => 'delete',
							$post['Post']['id']
						),
						null,
						__('Are you sure you want to delete this post?', true)
					); ?>
				<?php endif; ?>
			</p>
		</article>
	<?php endforeach; ?>
<?php else: ?>
	<p>No posts, sorry.</p>
<?php endif; ?>