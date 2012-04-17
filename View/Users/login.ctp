<div class="row">
	<div class="span6 offset3">
		<div class="login">
			<h2>Login</h2>
			<?php echo $this->Session->flash('auth'); ?>
			<?php echo $this->Form->create('User'); ?>
			<?php echo $this->TwitterBootstrap->input('email', array("class" => "span5")); ?>
			<?php echo $this->TwitterBootstrap->input('password', array("class" => "span5")); ?>
			<div class="clearfix">
				<?php echo $this->TwitterBootstrap->button("Login", array(
					"style" => "primary",
					"size" => "large",
					"type" => "submit",
					"class" => "pull-right"
				)); ?>
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>