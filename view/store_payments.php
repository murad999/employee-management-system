<?php  
include_once('src/emp.php');
$obj=new Emp;

$data=$_POST;
$empid=$data['emp_id'] ;
$empfullname=$data['fullname'] ;
$emppayg=$data['paygrade'] ;
$empext=$data['extra'] ; 
$empdesigid=$data['designation_id'] ;
$empdesig=$data['designation'] ;
$empbasic=$data['basic'] ;
$empsub=$data['subtotal'] ;
$deduc=$data['deduction'] ;
$grandtotal=$data['grandtotal'] ;
$desc=$data['description'] ;
$pdate=$data['dateselect'] ;
// echo "<pre>";
// print_r($_POST);
if(isset($grandtotal) || !empty($grandtotal) && isset($pdate) || !empty($pdate)){
	$insert_data = array(  
		'employee_id'     =>     mysqli_real_escape_string($obj->con, $empid),
		'designation_id'     =>     mysqli_real_escape_string($obj->con, $empdesigid),
		'basic'     =>     mysqli_real_escape_string($obj->con, $empbasic),
		'sub_total'     =>     mysqli_real_escape_string($obj->con, $empsub),
		'additional_total'     =>     mysqli_real_escape_string($obj->con, $empext),
		'substruction_total'     =>     mysqli_real_escape_string($obj->con, $deduc),
		'grand_total'     =>     mysqli_real_escape_string($obj->con, $grandtotal),
        'description'     =>     mysqli_real_escape_string($obj->con, $desc),
        'payment_date'     =>     mysqli_real_escape_string($obj->con, $pdate),
      );  
        //print_r($insert_data);exit;
      $obj->insert('paymenthistories', $insert_data);
}