<!DOCTYPE HTML>
<html>
<head>
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="rate.js"></script>
	<style type="text/css">
	.wrapper {
		height: 1050px;
		display: inline-flex;
	}

	.convert { 
		height: 90px;
		background: #EAEAEA;
		padding: 0 10px 0 10px;
		position: fixed;
	}
	#aText{
		width: 177px;
	}

	table {
		margin-bottom: 20px;
	}

	.a{
		width: 80px;
	}
	
	</style>
</head>
<body>

	<?php

	$array = unserialize(get_array());
	//$output = get_data();

	?>

	<div class='wrapper'>
		<div class='list'>
		<?php
	echo "<table>
				<tr>
					<td colspan=2 class='strong'>Currency Name</td>
					<td class='strong'>From ".$array['from']."</td>
					<td class='strong'>In ".$array['from']."</td>
				</tr>";
			foreach ($array as $d) {
			if(empty($d['data'])){continue;}
	echo "<tr>
			<td><img src='".$d['data']['img']."'/></td>
			<td>".$d['data']['title']."</td>
			<td class='a'>".$d['data']['fromTo']."</td>
			<td class='a'>".$d['data']['toFrom']."</td>
		</tr>";
			}
	echo "</table>";
		?>
		</div>

		<div class='convert'>
			<table>
				<th colspan=6>Currency Convertor</th>
				<tr>
					<td>From</td><td>
									<select id='from'>
										<?php foreach ($array as $data) {
										if(empty($data['data'])){continue;}
										echo "<option value='".$data['data']['to']."'>".$val1 = $data['data']['title']."</option>";
										} ?>
									</select>
								</td><td><input class='switch' type='button' value='<>'></td>
				<td>To</td><td>
								<select id='to'>
									<?php foreach (array_reverse($array) as $data) {
									if(empty($data['data'])){continue;}
									echo "<option value='".$data['data']['to']."'>".$data['data']['title']."</option>";
									} ?>
								</select>
							</td>
				</tr>
				<tr><td>Amount</td><td><input id='aText' type='text' placeholder=' Enter Amount'></td>
					<td></td><td class='oText' colspan=2></td>
					<td ></td></tr>
				
			</table>
			
			
			
		</div>
	</div>



	




	
	<?php



	function get_array()
	{
		$filename = "rate.array";

		$handle = fopen($filename, "r");
		$contents = fread($handle, filesize($filename));
		fclose($handle);
		
		return $contents;
	}




	//function get_data()
	//{
	//	$filename = "rate.info";
	//
	//	$handle = fopen($filename, "r");
	//	$contents = fread($handle, filesize($filename));
	//	fclose($handle);
	//		
	//	list($stamp, $content) = explode("\n", $contents, 2);
	//		
	//	return $content;
	//}
	//echo $output;

	?>
	

</body>
</html>