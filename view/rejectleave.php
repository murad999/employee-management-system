<?php
 include_once 'src/emp.php';  
 $updatedata = new Emp; 

//Update Paygrade
$regected=$_POST;

//print_r($regected);exit;
$reject_id=$regected['reject_id'];
if(isset($reject_id)){
  $upd_data=array(
      'status'=>mysqli_real_escape_string($updatedata->con,'2'),
    );
  $where_condition = array(  
             'employee_id'     =>     $regected["reject_id"]  
     );  
        if($updatedata->update("leaves", $upd_data, $where_condition)) // table name ,data, where 
        {  
             header("location:?page=view/pendding_leaves.php");  
        }  
    
}