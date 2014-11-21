<!DOCTYPE HTML>
<html>
<head>

</head>
<body>


	<?php

		$output = get_data();

		

		
		$array = unserialize(get_array());
		
		//echo '<pre>';
		//print_r(unserialize($array));
		//echo '</pre>';

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
		

		function get_array()
		{
			// get contents of a file into a string
			$filename = "rate.array";

			$handle = fopen($filename, "r");
			$contents = fread($handle, filesize($filename));
			fclose($handle);
			
			
			
			return $contents;
		}

	?>


	<table>
		<tr><td>Amount: </td><td><input type='text' placeholder='Enter Amount'></br></td><td><input type='button' value='Submit' placeholder='Output'></td><td><input type='text' placeholder='Output'></td></tr>
		<tr><td>From:</td>
			<td>
				<select>
					<?php 	foreach ($array as $data) {
					if(empty($data['data'])){continue;}
					$val = $data['data']['to'];
					echo "<option value='$val'>$val</option>";
					} ?>
				</select>
			</td>
		</tr>
		<tr><td>To:</td>
			<td>
				<select>
					<?php 	foreach ($array as $data) {
					if(empty($data['data'])){continue;}
					$val = $data['data']['to'];
					echo "<option value='$val'>$val</option>";
					} ?>
				</select>
			</td>
		</tr>
	</table>
	

	<?php echo $output; ?>


</body>
</html>