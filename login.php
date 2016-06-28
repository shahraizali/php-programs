<!doctype html>
<html>
    <head>
        <title>LOGIN</title>
    <link type="text/css" rel="stylesheet" href="login.css">
        <script>
      
        </script>
        
    </head>
    <body>
        <?php
        $server = "localhost";
        $user="root";
        $password="";
        $database="test";

    $check =     mysql_connect($server , $user , $password);
        
    if(!$check){
       echo "Error connecting to databse";
    }
    
        $checkdb = mysql_select_db($database);
    if(!$checkdb){
        echo "error while selecting database";
    }

    ?>
        <div id="header">
            
            <center><h2 >Login Screen</h2></center>
            
        </div>
     <div id ="box" >
        <form method ="post"  >
          <input type="text" class="t"  name="username" placeholder="Enter username">
            <br><br>
          <input type ="text" class="t" name ="pass" placeholder ="Enter password">
              
          </br>
         
        <input id="b" type="submit" name="login" value="login">
         
          </form> 
            
        <?php
        if(!isset($_POST["login"])){
                    $_POST["login"]="";
                }
            if($_POST["login"]== "login"){
                
                if(!isset($_POST["username"])){
                    $_POST["username"]="";
                }
                if(!isset($_POST["pass"])){
                    $_POST["pass"]="";
                }
            $u=    $_POST["username"];
                $p= $_POST["pass"];
                
                $q= "select  from users where uname ='".$u."' and upass ='".$p."'";
                
                $c = mysql_query($q);
               
            }
        
        ?>    
        
        
      </div>
    
    
    
  
    </body>
</html>