
<style type="text/css">
	.vp-top {
		position: relative;
		padding: 0 5px;
		background: rgb(73,192,240); /* Old browsers */
		background: -moz-linear-gradient(top,  rgba(73,192,240,1) 0%, rgba(44,175,227,1) 100%); /* FF3.6+ */
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(73,192,240,1)), color-stop(100%,rgba(44,175,227,1))); /* Chrome,Safari4+ */
		background: -webkit-linear-gradient(top,  rgba(73,192,240,1) 0%,rgba(44,175,227,1) 100%); /* Chrome10+,Safari5.1+ */
		background: -o-linear-gradient(top,  rgba(73,192,240,1) 0%,rgba(44,175,227,1) 100%); /* Opera 11.10+ */
		background: -ms-linear-gradient(top,  rgba(73,192,240,1) 0%,rgba(44,175,227,1) 100%); /* IE10+ */
		background: linear-gradient(to bottom,  rgba(73,192,240,1) 0%,rgba(44,175,227,1) 100%); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#49c0f0', endColorstr='#2cafe3',GradientType=0 ); /* IE6-9 */

	}
	.vp-content {
		padding: 0 5px;
		background: rgb(255,255,255); /* Old browsers */
		background: -moz-linear-gradient(top,  rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%); /* FF3.6+ */
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,1)), color-stop(47%,rgba(246,246,246,1)), color-stop(100%,rgba(237,237,237,1))); /* Chrome,Safari4+ */
		background: -webkit-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(246,246,246,1) 47%,rgba(237,237,237,1) 100%); /* Chrome10+,Safari5.1+ */
		background: -o-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(246,246,246,1) 47%,rgba(237,237,237,1) 100%); /* Opera 11.10+ */
		background: -ms-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(246,246,246,1) 47%,rgba(237,237,237,1) 100%); /* IE10+ */
		background: linear-gradient(to bottom,  rgba(255,255,255,1) 0%,rgba(246,246,246,1) 47%,rgba(237,237,237,1) 100%); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed',GradientType=0 ); /* IE6-9 */

	}
	.vp-bot {
		height: 20px;
	}

	.vpt-edit{
		background: #CBEBF7;
		display: block;
		position: absolute;
		right: 0;
		bottom: -30;
		width: 80px;
		height: 25px;
		padding-top: 5px;
	
		text-align: center;
	}

	.vpt-edit:hover{
		background: #EDEDED;
	}

</style>



<div id='view-post'>


	<div class='vp-top'>
		<a href='<?php echo base_url().'general/edit-article/'.$post_data['id'].'-'.$post_data['title']; ?>' class='vpt-edit'>
			 Edit Post
		</a>
		<?php echo 'Title: '.$post_data['title']; ?> <br>
		Started by Papol22, November 01, 2014
		
	</div>
	<div class='vp-content'>
		<?php
			echo '<br>';
			echo '<br>';
			echo base64_decode($post_data['content']);
		?>
	</div>
	<div class='vp-bot'>

	</div>




</div>