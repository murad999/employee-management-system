<?php 
 include '../src/emp.php';  
 $updatedat = new Emp;  

 //Update designation
   if(isset($_POST["designation"]))  
   {  

          $update_data = array(  
             'designation'     =>     mysqli_real_escape_string($updatedat->con, $_POST['designation']) //field name, data 
  
        );  
        $where_condition = array(  
             'id'     =>     $_POST["id"]  
        );  
        if($updatedat->update("designation", $update_data, $where_condition)) // table name ,data, where 
        {  
             header("location:../?page=view/designation.php");  
        }  
    
        
   }




	
?>	