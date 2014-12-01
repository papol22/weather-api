<div id='register-form'>
	<h1>Join Us</h1>
		<?php
		echo form_open('user/confirm_register');
		echo form_input(Array('name' => 'name','placeholder' => 'Full Name'), set_value('name'));
		echo form_input(Array('name' => 'email','placeholder' => 'Email Address'), set_value('email'));
		echo form_input(Array('name' => 'username','placeholder' => 'Username'), set_value('username'));
		echo form_password(Array('name' => 'password','placeholder' => 'Password'));
	
		echo form_password(Array('name' => 'cpassword','placeholder' => 'Confirm Password'));
		echo form_submit('submit', 'Create Account');
		echo anchor('sign-in','Sign In');
		echo form_close();

		echo validation_errors();
		?>

</div>