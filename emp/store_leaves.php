<?php 
include_once('../src/emp.php');
$obj=new Emp;



// $data=$_POST;
// $emid=$data['emp_id'];
// 
// 	echo "<pre>";
// print_r($_POST);exit;
	$data=$_POST;
	$emp_id=$data['emp_id'];
	$leave_from=$data['leave_from'];
	$leave_to=$data['leave_to'];	$desc=$data['descrtiption'];

if(isset($leave_from) && isset($leave_to)  && isset($desc)){
	
	$insert_data = array(  
		'leave_from'     =>     mysqli_real_escape_string($obj->con, $leave_from),
		'leave_to'     =>     mysqli_real_escape_string($obj->con, $leave_to),
        'description'     =>     mysqli_real_escape_string($obj->con, $desc),
        'employee_id'     =>     mysqli_real_escape_string($obj->con, $emp_id),  
        'status'     =>     mysqli_real_escape_string($obj->con, '0'),
      );  
        //print_r($insert_data);exit;
      $obj->insert('leaves', $insert_data);
}
