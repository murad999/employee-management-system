<?php
 include '../src/emp.php';  
 $updatedata = new Emp; 

//Update Paygrade
$pay=$_POST;

//print_r($pay);exit;
$p_name=$pay['payg'];
$p_salary=$pay['basic'];
if(isset($p_name) && isset($p_salary)){
  $upd_data=array(
      'name'=>mysqli_real_escape_string($updatedata->con,$p_name),
      'basic'=>mysqli_real_escape_string($updatedata->con,$p_salary),
    );
  $where_condition = array(  
             'id'     =>     $pay["eid"]  
     );  
        if($updatedata->update("paygrades", $upd_data, $where_condition)) // table name ,data, where 
        {  
             header("location:../?page=view/paygrade.php");  
        }  
    
}