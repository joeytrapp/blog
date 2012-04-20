<?php if (count($posts)): ?>
	<div class="lists">
		<?php echo $this->Partial->render("post", array(), array("collection" => $posts)); ?>
	</div>

	<ul class="pager">
		<?php if ($this->Paginator->hasNext()): ?>
			<li class="previous">
				<a href="<?php echo Router::url(array(
					"controller" => "posts",
					"action" => "index",
					"page" => $this->Paginator->current() + 1
				)); ?>">&laquo; Older</a>
			</li>
		<?php endif; ?>
		<?php if ($this->Paginator->hasPrev()): ?>
			<li class="next">
				<a href="<?php echo Router::url(array(
					"controller" => "posts",
					"action" => "index",
					"page" => $this->Paginator->current() - 1
				)); ?>">Newer &raquo;</a>
			</li>
		<?php endif; ?>
	</ul>

<?php else: ?>
	<p>No posts, sorry.</p>
<?php endif; ?>