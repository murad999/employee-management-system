<?php
 include 'src/emp.php';  
 $updatedata = new Emp; 

$id=$_GET['id'];
//echo "$id";
if(isset($id)){
  $upd_data=array(
      'active'=>mysqli_real_escape_string($updatedata->con,'1'),
    );
  	$where_condition = array(  
             'id'     =>     $id  
     );  
        if($updatedata->update("employees", $upd_data, $where_condition)) // table name ,data, where 
        {  
             header("location:?page=view/main.php");  
        }  
    
}