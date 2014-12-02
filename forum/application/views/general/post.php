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
			if(isset($file)){  
				$img = '<img src="'.base_url().'application/includes/upload/'.$file['file_name'].'" alt="Smiley face" height="42" width="42">'; 
			}  
			echo form_close(); 
			
		?>

</div>

<script type="text/javascript">
$( document ).ready(function() {
    
	$('#post .upload').change(function(){  
	var upload_data = $('#post .upload').val()
	var post_url = "<?php echo base_url();?>do_upload";
	$.ajax({
	    type: "POST",
	    url: post_url,
	    data: upload_data,
	    success: function(data) 
    	{
        	alert(data);
    	}
    });
});
    
});
	
	
	// $('.upload').change(function(){
	// 	window.location.replace("<?php echo base_url(); ?>do_upload");
	// 	CKEDITOR.instances.content.insertHtml(<?php echo $img ?>);

	// });

	// $('.upload').change(function(){
 //  		img = "<img src='<?php echo base_url(); ?>application/includes/upload/thumb/Mario_SM3DW_thumb.png'/>'";
 //  		CKEDITOR.instances.content.insertHtml(img);
	//  });

	// $('#post .upload').change(function(){  

	// 	var upload_data = $('#post .upload').val()
	// 	var post_url = "<?php echo base_url();?>do_upload";
	// 	$.ajax({
	// 	    type: "POST",
	// 	    url: post_url,
	// 	    data: upload_data,
	// 	    success: function(data) 
	//     	{
	//         	alert(data);
	//     	}
	//     });
	// });
</script>