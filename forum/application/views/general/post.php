<div id='Post'>
	<h1><?php echo $title ?></h1>

		<?php

			echo form_open('general/confirm_post');
			echo form_label('Topic Title: ','title');
			echo form_input(Array(	'name' => 'title','placeholder' => 'Topic Title'),set_value('title'));
			echo form_label(validation_errors(),'error');
			echo form_textarea(array('name' =>'content','id'=>'content','class'=>"ckeditor"),set_value('content'));
			echo form_submit('submit', 'Post New Article');
			echo form_close(); 
		?>

</div>