<html>
	<head>
		<title>Title</title>
		<link href="<?php echo base_url(); ?>application/includes/css/forum.css" media="screen" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>application/includes/ckeditor/ckeditor.js"></script>
	</head>
<body>

	<div id='body'>
	<header>
		<div class='header-top'>

			<div class='ht'>

				<?php 
				date_default_timezone_set('Asia/Singapore');
					if($login == True){
				echo"	<a href='#'>".ucfirst($user_data['username'])."</a>
						<a href='".base_url()."logout' class='logout-btn'>Log Out</a>				";
					}
					else
					{
				echo"	<a href='".base_url()."sign-in'>Sign in</a>
						<a href='".base_url()."register' class='create-btn'>Create Account</a>	";
					}

				?>

					
			</div>
		</div>
		<div class='header-bot'>
			<div class='hb'>	<ul><li><a href='<?php echo base_url(); ?>home'>Home</a></li> <li><a href="#">About</a></li></ul>	</div> 
		</div>
	</header>
