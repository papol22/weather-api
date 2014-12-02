<div id='update'>
	<h1><?php echo $title ?></h1>

		<?php

			echo form_open_multipart();
			echo form_label('Topic Title: ','title');
			echo form_input(Array(	'name' => 'id','type' => 'hidden','value' => $post_data['id']));
			echo form_input(Array(	'name' => 'title','placeholder' => 'Topic Title', 'value' => $post_data['title']),set_value('title'));
			echo form_label(validation_errors(),'error');
			echo form_textarea(array('name' =>'content','id'=>'content','class'=>"ckeditor", 'value' => base64_decode($post_data['content'])),set_value('content'));
			echo form_submit( array('name' => 'submit', 'value' => 'Update Article' , 'formaction' => '../update_post/' ));
			
			echo form_upload(Array('name' => 'userfile','class' => 'upload'));
			echo form_submit( array('name' => 'submit', 'value' => 'Upload' , 'formaction' => 'upload') );
			if(isset($error)){ echo $error['error']; }  
			if(isset($file)){  
				$img = '<img src="'.base_url().'application/includes/upload/'.$file['file_name'].'" alt="Smiley face" height="42" width="42">'; 
			} 
			echo form_close(); 
			
		?>

</div>