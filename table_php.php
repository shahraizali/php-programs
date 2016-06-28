<!doctype html>
<html>
    <head>
    
        
    </head>
    <body>
        <form method="post">  
            <input type ="text"  name ="box" placeholder="Enter number ">
            <input type ="submit"  value="print" name="print">
        </form>
        
        <?php 
               
        if($_POST["print"] == "print"){
                $number = $_POST["box"];
                for($i=0 ; $i <= 10 ; $i++){
                    
                   echo "$number X $i = ".$i*$number."</br>";
                }
            }
        
        ?>
    </body>
</html>