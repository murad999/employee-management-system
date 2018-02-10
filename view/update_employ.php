<?php
 include '../src/emp.php';  
 $obj = new Emp; 

 //Update Paygrade
$up_emp=$_POST;
//print_r($up_emp);exit;

$email=$up_emp['email'];
$desig=$up_emp['desig'];
$payg_name=$up_emp['payg_name'];
//$emp_info=$up_emp['emp_info']=json_encode($up_emp['emp_info']);
$uname=$up_emp['username'];
$image = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];

if(isset($desig) && isset($payg_name) && isset($uname)){
	 move_uploaded_file($image_tmp,"../vendor/images/$image");
  $upd_data=array(
      'username'     =>     mysqli_real_escape_string($obj->con, $uname),
      'email'     =>     mysqli_real_escape_string($obj->con, $email),
      'designation_id'     =>     mysqli_real_escape_string($obj->con, $desig),
      'paygrade_id'     =>     mysqli_real_escape_string($obj->con, $payg_name),
      'image'     =>     mysqli_real_escape_string($obj->con, $image),
    );
  $where_condition = array(  
             'id'     =>     $up_emp["eid"]  
     );  
        if($obj->update("employees", $upd_data, $where_condition)) // table name ,data, where 
        {  
             header("location:../?page=view/main.php");  
        }  
    
}