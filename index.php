<?php 
	$server = "localhost";
	$username = "root";
	$password="";
	$con = mysql_connect($server , $username , $password);
	if(!$con){
		
		echo "could not be connected";
		
	}else{
		
		echo "connected";
	}
	
	$database = "test";
	$checkdb = mysql_select_db($database , $con);
	if(!$checkdb){
		echo "</br>not connected to specific database ";
		
	}else {
		echo "</br>connected to ".$database." successfully";
		
	}
	
	
	function view(){
		echo "<table border =2px > 
		<tr>
			<th>USERNAME</th>
			<th>PASSWORD</th>
		</tr>";
			$showquery="select * from users";
	$result = mysql_query($showquery);
	while($coming = mysql_fetch_array($result)){

		echo '<tr>	
			<td>'.$coming['username'].'</td>
			<td>'.$coming['password'].'</td>
			</br>
		</tr>';
	}
	echo "</table>";

	}
	view();
	
	
	
?>

<html>
	<head>
		<title>HOME</title>
	<head>
	
	<body>
	<div id ="refresh ">
		<div>
			<form method="post">
				<input type ="submit"  name = "submit" value="Refresh">
			</form>
		</div>
	</div>
	<div id="table">
	<form  method="post">
	<h1>display table</h1>
	<input type ="text" placeholder="Enter number" name ="val" >
	<input  type="submit" name="submit" value ="show">
	</form>
	</div>
	<div id ="insert">
		<form method="post">
		<h2>Insert Record</h2>
			<input type ="text" placeholder="Enter username" name ="username" >
			<input type ="text" placeholder="Enter password" name ="password">
			<input type ="submit" name ="submit" value="enter">
		</form>
	</div>
	<div id="delete">
	<h2>Delete Record</h2>
		<form method ="post">
				
			<input type="text" placeholder ="Enter username "name ="del">
			<input type ="submit" name="submit" value ="delete"> 
		</form>
	</div>
	<?php
		if($_POST["submit"] == "show"){
		$x = $_POST["val"];
			for($i =1 ; $i <= 10 ; $i++){
				echo "$x X $i = ".$x*$i."</br>" ;
								
			}	
		}
		if($_POST["submit"] ==  "enter"){
			$user =  $_POST["username"];
			$pass  =  $_POST["password"];
			
			$qquery =  "insert into users (username , password) values('$user' , '$pass') ";
		$qq = 	mysql_query($qquery);
				if($qq == 1){
					echo "record entered successfuly";
				}else{
					echo "error while entring the record";
				}
		}
		
		/*if($_POST["submit"] ==  "delete"){
			$s = $_POST["del"];

			$q = "delete * from users where username = $s";
			$c = 	mysql_query($q);
`			if($c == 1){
					echo "successfully deleted";
			}else{
				echo "Unsuccessfully ";
			}
		}
		*/
		
		if($_POST["submit"] == "delete"){
			echo "succe";
			$us = $_POST["del"];
			$qqq = "delete from users where username = \"$us\" ";
			$ccc = mysql_query($qqq);
			echo $ccc;
			if($ccc ==  1){
				echo "successfully deleted";
			}else{
				echo "Unsuccessfully ";
			}
			
		}

		?>
	</body>
</html>



