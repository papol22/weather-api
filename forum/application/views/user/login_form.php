<div id='login-form'>
	<h1>Login</h1>
		<?php
			echo form_open('user/confirm_login');
			echo form_input(Array(	'name' => 'username','placeholder' => 'Username'));
			echo form_password(Array(	'name' => 'password','placeholder' => 'Password'));
			echo form_submit('submit', 'Login');
			echo anchor('register', 'Create Account');
			echo '<input name="remember_me" value="remember me" type="checkbox" />';
			echo form_close();
		?>
</div>