<?php if (count($posts)): ?>
	<div class="lists">
		<?php echo $this->Partial->render("post", array(), array("collection" => $posts)); ?>
	</div>
<?php else: ?>
	<p>No posts, sorry.</p>
<?php endif; ?>