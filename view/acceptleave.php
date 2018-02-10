<?php
 include_once 'src/emp.php';  
 $updatedata = new Emp; 

//Update Paygrade
$accepted=$_POST;

//print_r($accepted);exit;
$accept_id=$accepted['accept_id'];
if(isset($accept_id)){
  $upd_data=array(
      'status'=>mysqli_real_escape_string($updatedata->con,'1'),
    );
  $where_condition = array(  
             'employee_id'     =>     $accepted["accept_id"]  
     );  
        if($updatedata->update("leaves", $upd_data, $where_condition)) // table name ,data, where 
        {  
             header("location:?page=view/pendding_leaves.php");  
        }  
    
}