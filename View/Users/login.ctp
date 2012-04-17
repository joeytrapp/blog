<div class="row">
	<div class="span4 offset4">
		<div class="login">
			<h3>Login</h3>
			<?php echo $this->Session->flash('auth'); ?>
			<?php echo $this->Form->create('User'); ?>
			<?php echo $this->TwitterBootstrap->input('email'); ?>
			<?php echo $this->TwitterBootstrap->input('password'); ?>
			<?php echo $this->TwitterBootstrap->button("Login", array(
				"style" => "primary",
				"type" => "submit"
			)); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>