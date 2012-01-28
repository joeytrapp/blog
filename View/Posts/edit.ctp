<?php echo $this->Form->create('Post'); ?>
<?php echo $this->Form->input('id'); ?>
<?php echo $this->Form->input('title', array(
	'label' => false,
	'div' => false,
	'placeholder' => 'Post Title'
)); ?>
<?php echo $this->Form->input('slug', array(
	'label' => false,
	'div' => false,
	'placeholder' => 'Post Slug'
)); ?>
<?php echo $this->Form->input('is_published', array(
	'div' => false
)); ?>
<?php echo $this->Form->input('publish_date', array(
	'div' => false
)); ?>
<?php echo $this->Form->input('parent_id', array(
	'label' => 'Previous Post',
	'empty' => 'No previous post'
)); ?>
<?php echo $this->Form->input('user_id'); ?>
<?php echo $this->Form->input('content'); ?>
<?php echo $this->Form->end('Save'); ?>
