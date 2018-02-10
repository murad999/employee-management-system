<?php 
 include '../src/emp.php';  
 $dataa = new Emp;  
 $success_message = '';  
 if(isset($_POST['designation']))  
 {  
      $insert_data = array(  
           'designation'     =>     mysqli_real_escape_string($dataa->con, $_POST['designation'])  
      );  
      $dataa->insert('designation', $insert_data);
      
 }  
	




?>			