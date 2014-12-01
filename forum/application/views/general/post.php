<div id='Post'>
	<h1><?php echo $title ?></h1>

		<?php

			echo form_open_multipart();
			echo form_label('Topic Title: ','title');
			echo form_input(Array(	'name' => 'title','placeholder' => 'Topic Title'),set_value('title'));
			echo form_label(validation_errors(),'error');
			echo form_textarea(array('name' =>'content','id'=>'content','class'=>"ckeditor"),set_value('content'));
			echo form_submit( array('name' => 'submit', 'value' => 'Post Article' , 'formaction' => 'confirm_post') );
			
			echo form_upload(Array('name' => 'userfile','class' => 'upload'));
			echo form_submit( array('name' => 'submit', 'value' => 'Upload' , 'formaction' => 'upload') );
			if(isset($error)){ echo $error['error']; }  
			if(isset($file)){  echo '<img src="application/includes/upload/'.$file['file_name'].'" alt="Smiley face" height="42" width="42">' ; }  
			echo form_close(); 
			
		?>



</div>

<script type="text/javascript">
	// $('#post .upload').change(function(){
	// 	window.location.replace('../do_upload/');
	// });
</script>