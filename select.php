<!doctype html>
<?php
		$value = $_GET["dropdown"];
		
		echo "$value";	
?>
<html>
	<head>
	</head>
	<body>
		<form method="get" >
		<select name="dropdown">
			<option value="f">First</option>
			<option value="s">Second</option>
			<option value="t">Third</option>
		</select>
		<input type ="submit" name="submit" >
		</form>
	</body>
</html>