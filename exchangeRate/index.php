<!DOCTYPE HTML>
<html>
<head>

</head>
<body>


	<?php

		$output = get_data();
		echo $output;

		function get_data()
		{
			// get contents of a file into a string
			$filename = "rate.info";
			$handle = fopen($filename, "r");
			$contents = fread($handle, filesize($filename));
			fclose($handle);
			
			list($stamp, $content) = explode("\n", $contents, 2);
			
			return $content;
		}
		







	?>
</body>
</html>