// sum  with php

<!doctype html>
<html>
    <head>
    
        
    </head>
    <body>
        <form method="post">  
            <input type ="text"  name ="f" placeholder="Enter first number "></br><br>
        <input type ="text"  name ="s" placeholder="Enter second number ">
            <input type ="submit"  value="sum" name="sum">
        </form>
        
        <?php 
               
        if($_POST["sum"] == "sum"){
                $f = $_POST["f"];
                $s = $_POST["s"];
                $l = $f+$s;
                echo " SUM = $l";
            }
        
        ?>
    </body>
</html>