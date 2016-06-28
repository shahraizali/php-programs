<?
class class_userview
{
            		/*Author	:	Muzaffar Rahman
					Project		:	Pactice Project
					Date		:	30/04/2011
					Purpose		:	This class contains all functions related to tbl_user table
					Email		:	muzaffarrahman@yahoo.com
					*/
					
					
//constructor

      function classuser()
	           {    
			   $con = mysql_connect("localhost","root",""); 
			   if (!$con) { 
			   die('Could not connect: ' . mysql_error()); 
			   }// some code  
				mysql_select_db("tbl_user", $con);  


 }
			   
//add user function
function adduser($arr)
         {
				 $query   =  "insert into tbl_user (user_fname,user_lname,user_gender,user_email,user_password,user_cellno,user_country,user_city,user_address,user_status,user_photo) 
  values ('".$arr[0]."','".$arr[1]."','".$arr[2]."','".$arr[3]."','".$arr[4]."','".$arr[5]."','".$arr[6]."','".$arr[7]."','".$arr[8]."','".$arr[9]."','".$arr[10]['name']."')";
  
  copy($arr[10]['tmp_name'], "photos/".$arr[10]['name']);
  
  $res     =  mysql_query($query);
    if($res == 1)
	echo "Congrats... Record has been Successfully Inserted";
	else
	echo "Sorry Record is not Inserted";  

		 }  //end function add
		 
		 
//function to update customer
function updateuser($arr, $userid)
         { 
		 if($arr[10]['name']=="")
		 { 
		 
	     $query   =  "update tbl_user set user_fname='".$arr[0]."',user_lname='".$arr[1]."', user_gender ='".$arr[2]."',user_email='".$arr[3]."',user_password='".$arr[4]."', user_cellno='".$arr[5]."',user_country='".$arr[6]."',user_city='".$arr[7]."',user_address='".$arr[8]."',user_status='".$arr[9]."' where user_id=".$userid."";
			  }
			   
		else
			  {
			  unlink("photos/".$arr[11]);
			   $query   =  "update tbl_user set user_fname='".$arr[0]."',user_lname='".$arr[1]."', user_gender ='".$arr[2]."',user_email='".$arr[3]."',user_password='".$arr[4]."', user_cellno='".$arr[5]."',user_country='".$arr[6]."',user_city='".$arr[7]."',user_address='".$arr[8]."',user_status='".$arr[9]."',user_photo='".$arr[10]."' where user_id=".$userid."";
			  
		   copy($arr[10]['tmp_name'], "photos/".$arr[10]['name']);
       } //end function update*/
         
		  $rs = mysql_query($query); 
		   return $rs; 
 	   	   header("location:viewuserdata.php");

	  } 
//function to view customers
function viewdata($condition)
         {
			
			$query			=	"Select * from tbl_user ".$condition.""; 
			
			$rs		=	mysql_query($query);
			$counter	=1;
			  while($row=mysql_fetch_array($rs))
			  {
					$html	   .=	'<tr>
									<td><input type=checkbox name="chkbox'.$counter.'" id="chkbox'.$counter.'" value="'.$row['user_id'].'"></td>
									<td>'.$row['user_fname'].'</td>
									<td>'.$row['user_email'].'</td>
									<td>'.$row['user_password'].'</td>
									<td><img src="Photos/'.$row['user_photo'].'" width="100" height="100" alt="noimage"></td>
									 <td><a href="detail_user.php?id='.$row['user_id'].'"><img src="images/valid.png" alt="" title="More" border="0" /></a></td>
					  				  <td><a href="edituserdata.php?id='.$row['user_id'].'"><img src="images/user_edit.png" alt="" title="Edit" border="0" /></a></td>                          			 
						  			 <td><a href="del.php?id='.$row['user_id'].'" class="ask"><img src="images/trash.png" alt="" title="Dell" border="0" /></a></td>
				 						 </tr>';
										 $counter++;
				   
			    }	 //end while
			
			      return $html.'<input type="hidden" value="'.$counter.'" name="htotal" />';
		       }	//end function view

		   
// function to delete record
function deluser($userid)
		{	
	             
				$query		=	"delete  from tbl_user where user_id=".$userid."";
			        			
				$rs			=	mysql_query($query);
					
				return $rs;
								
		}	//end function delete
		   
		// user login function
		function login($useremail, $userpassword)
			{
			$query	= "select * from tbl_user where user_email = ".$useremail." and user_password = ".$userpassword."";
				$rs		= mysql_query($query);
				$row	= mysql_fetch_array($rs);
				
				return ($row);
			}    	   	     
			
} //end class

?>