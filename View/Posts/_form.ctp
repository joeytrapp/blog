<div class="row">
	<div class="span8">
		<?php echo $this->TwitterBootstrap->input('title', array(
			'placeholder' => 'Post Title',
			'class' => 'span8'
		)); ?>
	</div>
	<div class="span4">
		<?php echo $this->TwitterBootstrap->input('parent_id', array(
			"input" => $this->Form->select("parent_id", $parents, array(
				'empty' => 'No previous post'
			)),
			'label' => 'Previous Post',
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
		<?php echo $this->Form->input("publish_date", array(
			"type" => "hidden",
			"id" => "publish-date"
		)); ?>
		<?php echo $this->TwitterBootstrap->input('publish_date_raw', array(
			"input" => $this->Form->text("publis_date_raw", array(
				"id" => "publish-date-raw",
				"value" => $this->Form->value("publish_date")
			)),
			"label" => "Publish Date"
		)); ?>
	</div>
	<div class="span4">
		<?php echo $this->TwitterBootstrap->input('is_published'); ?>
	</div>
</div>
<div class="row">
	<div class="span12">
		<?php echo $this->TwitterBootstrap->input('content', array(
			"input" => $this->Form->textarea("content", array(
				"data-tabby" => "",
				"class" => "post-content"
			))
		)); ?>
	</div>
</div>