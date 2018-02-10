<?php
 include '../src/emp.php';  
 $dataa = new Emp;  
$success_message = '';

//Insert Paygrade	
$pay=$_POST;
$pay['payg_name'];
$pay['salary_range'];
$pay['designation'];
if(isset($pay['payg_name'])&& isset($pay['salary_range'])  && isset($pay['designation'])){
	$insert_data=array(
			'name'=>mysqli_real_escape_string($dataa->con,$pay['payg_name']),
			'designation_id'=>mysqli_real_escape_string($dataa->con,$pay['designation']),
			'basic'=>mysqli_real_escape_string($dataa->con,$pay['salary_range']),
			'status'=>mysqli_real_escape_string($dataa->con,'1')
		);
	$dataa->insert('paygrades', $insert_data);
}