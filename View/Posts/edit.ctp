<?php echo $this->Form->create('Post'); ?>
	<?php echo $this->Form->input('id'); ?>
	<?php echo $this->element("../Posts/_form"); ?>
	<?php echo $this->TwitterBootstrap->button("Save", array(
		"style" => "primary",
		"size" => "large"
	)); ?>
<?php echo $this->Form->end(); ?>
