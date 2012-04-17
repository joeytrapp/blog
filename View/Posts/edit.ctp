<?php echo $this->Form->create('Post'); ?>
	<?php echo $this->Form->input('id'); ?>
	<?php echo $this->Partial->render("form"); ?>
	<?php echo $this->TwitterBootstrap->button("Save", array(
		"style" => "primary",
		"size" => "large"
	)); ?>
<?php echo $this->Form->end(); ?>
