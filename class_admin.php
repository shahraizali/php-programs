<?php

class class_admin
{
            /*Author	:	Muhammad Bilal
					Project		:	Pactice Project
					Date		:	30/04/2011
					Purpose		:	This class contains all functions related to tbl_admin table
					Email		:	bilalchishti_109@yahoo.com
					*/
					
					
//constructor

      function class_admin()
	           {      }
			   
			   
//function for admin login
function login($name,$password)
{
   $query	=	"select from tbl_admin where admin_fname='".$name."' and admin_password='".$password."'";
   $rs		=	mysql_query($query);
}			   


//function to update admin
function update($arr, $adminid)
         { 
		      $query   =  "update tbl_admin set admin_fname='".$arr[0]."',admin_lname='".$arr[1]."',admin_gender='".$arr[2]."',admin_password='".$arr[3]."',admin_dob='".$arr[4]."',admin_email='".$arr[5]."' where admin_id=".$adminid."";
			  
		     mysql_query($query);	   
       } //end function update
	   

//function to view admin information
function view()
         {
		        $query			=	"Select * from tbl_admin";
				$rs				=	mysql_query($query);

			  while($row = mysql_fetch_array($rs))
			  {
					$html	   .=	 '<tr>
					<td><input type="checkbox" name="" /></td>
					<td>'.$row['admin_id'].'</td>
					<td>'.$row['admin_fname'].'</td>
					<td>'.$row['admin_lname'].'</td>
					<td>'.$row['admin_gender'].'</td>
					<td>'.$row['admin_email'].'</td>
					<td>'.$row['admin_dob'].'</td>
					
					 <td><a href="adminupdatadata.php?id='.$row['admin_id'].'"><img src="images/user_edit.png" alt="" title="" border="0" /></a></td>
				  </tr>';
			  }	 //end while
			
			return $html;			   

		   }	//end function view

	   

}

?>