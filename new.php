// all



<!doctype html>

<html>
    
    <head>
        <title>Home</title> 
    </head>
    
    <body>
        
                 <?php
            $server = "localhost";
            $username="root";
            $password="";
            $database ="test";
    
         $con =    mysql_connect($server , $username , $password);
            if($con){
               // echo "connection to database is successful";
            }else{
                echo "Error while connecting to database ";
            }
        $db = mysql_select_db($database ,$con);
        
            if(!$db){
                echo "Error while selecting database";
            }
        ?>
<h1>Add Record</h1>
        <div id="data_entry" style="float:top;">
            <form method="post">
                <input type="text" name="username" placeholder="Enter username ">
                </br></br>
                <input type="text" name="password"
                       placeholder="Enter password">
                    </br></br>
                <input type="submit" name ="send_data" value="Add">
            </form>
          <?php      
                     //add record 
       if(!isset($_POST["send_data"])){
            $_POST["send_data"] = "";
        }
        
        if($_POST["send_data"] == "Add"){
           if(!isset($_POST["username"])){
            $_POST["username"] = "";
        }if(!isset($_POST["password"])){
            $_POST["Password"] = "";
        }
        $name = $_POST["username"];
        $pass = $_POST["password"];
            $query ="insert into users (username  , password) values ('".$name."' ,'".$pass."' )";
         if($name != "" && $pass != ""){ 
             
            $qs =   mysql_query($query);
                if(!$qs){
                    echo "Query not implemented ";
                }else{
                echo" <span style='color:lightgreen'>Record has been updated Successfully</span> ";
                }
          }else{
              echo" <span style='color:red'>!Empty Fields record not entered</span> ";
          }
        }

?>

        </div>

        <div id="display">
            
            <h2>Display table</h2>
            <form method="post">
                <input type="submit" name ="refresh" value="display table"> 
                <input type="submit" name ="hide" value="Hide table"> 
            </form>
            
   <?php                 //display data_entry

        if(!isset($_POST["refresh"])){
            $_POST["refresh"] = "";
        }
        
if($_POST["refresh"] =="display table"){

    $display_query ="select * from users ";
$result =    mysql_query($display_query);
    echo "<table border='1px'> 
        <tr>
        <th>UserName</th>
        <th>Password</th>
        </tr>
        
    ";
    while($true = mysql_fetch_array($result)){
        echo "<tr><td> ".$true["username"]."</td>
        \n<td>".$true["password"]."</td>
        </tr>";
    }
    echo "</table>";
}
  ?>
            
        </div>    
        
        <div id="update">
                <h2>delete record</h2>
            <br>
            <form method="post">
                <input type="text" placeholder="Enter username" name="user">
                <input type="submit" name="delete" value="delete">
            </form>
            
     <?php       // delete

    if(!isset($_POST["delete"])){
        $_POST["delete"] = "";
    }

    if($_POST["delete"] == "delete"){
     
        $u =  $_POST["user"];
       // DELETE FROM `users` WHERE username ='ss'
        $Q = "DELETE FROM `users` WHERE username ='".$u."'";
        if($_POST["user"]== ""){
             echo" <span style='color:red'>!Empty Field</span> ";
        }else{
        $check = mysql_query($Q);
        if($check){
            echo "in";
            echo "<span style='color:lightgreen;'>Records with username ".$u." has been deleted from database </span>";
            
        }else{
            echo "<span style ='color:red'>Record not found </span>";
        }
        }
        
    }
        ?>
            
        </div>    
       


    </body>
</html>