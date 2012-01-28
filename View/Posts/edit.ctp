<?php echo $this->Form->create('Post'); ?>
	<?php echo $this->Form->input('id'); ?>
	<?php echo $this->element("../Posts/_form"); ?>
<?php echo $this->Form->end('Save'); ?>
