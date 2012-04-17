<div class="row">
	<div class="span12">
		<?php echo $this->TwitterBootstrap->input('title', array(
			'placeholder' => 'Post Title',
			'class' => 'span10'
		)); ?>
	</div>
</div>
<div class="row">
	<div class="span4">
		<?php echo $this->TwitterBootstrap->input('slug', array(
			'placeholder' => 'Post Slug'
		)); ?>
	</div>
	<div class="span4">
		<?php echo $this->Form->input('publish_date', array(
			"type" => "text"
		)); ?>
	</div>
	<div class="span4">
		<?php echo $this->Form->input('is_published', array(
			'div' => false
		)); ?>
	</div>
</div>
<div class="row">
	<div class="span4">
		<?php echo $this->TwitterBootstrap->input('parent_id', array(
			'label' => 'Previous Post',
			'empty' => 'No previous post'
		)); ?>
	</div>
	<div class="span4">
		<?php echo $this->Form->input('user_id'); ?>
	</div>
</div>
<div class="row">
	<div class="span12">
		<?php echo $this->TwitterBootstrap->input('content', array(
			"data-tabby" => "",
			"class" => "post-content"
		)); ?>
	</div>
</div>