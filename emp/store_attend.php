<?php 
include_once('../src/emp.php');
$obj=new Emp;

//$date= date('D-M-Y');   
//$time = date('h-i-sa');
 //echo $date."<br>";
// echo $time."<br>";
$data=$_POST;
$emid=$data['emp_id'];
$_SESSION['seid']=$emid;
// print_r($data);

$thimesheets=$obj->select('timesheets');

$check_emid=[];
$check_date=[];
foreach($thimesheets as $thimesheet){
	if($thimesheet['employee_id']==$emid){
	  $check_emid[]=$thimesheet['employee_id'];//echo "<br>";
	  $check_date[]=$thimesheet['entry_date'];//echo "<br>";
	}
	
}
// echo "<pre>";
// print_r($check_emid);
// print_r($check_date);
// exit();


$date_ck= date('Y-m-d');
//echo $date_ck;echo "<br>";
$has_date="";
if(in_array($date_ck,$check_date)){
 	$has_date=$date_ck;
 	//echo $has_date;echo "<br>";
}
$has_emid="";
if(in_array($emid,$check_emid)){
	$has_emid= $emid;
	//echo $has_emid;
}

if($has_emid==$emid && $has_date==$date_ck){
	$_SESSION['chekmassage']=" <p class='alert alert-danger text-center'>" . "You already attendace submited" . "</p>" ;
	header('location: ?page=attendance.php');	
 }else{
 	date_default_timezone_set("Asia/Dhaka"); 
	 $date= date('y-m-d');
	 $time = date('h:i:s');
	$data=$_POST;
	$emp_id=$data['emp_id'];
	$desc=$data['description'];

	$insert_data = array(  
		'employee_id'     =>     mysqli_real_escape_string($obj->con, $emp_id),
        'description'     =>     mysqli_real_escape_string($obj->con, $desc),
        'entry_date'     =>     mysqli_real_escape_string($obj->con, $date),
        'entry_time'     =>     mysqli_real_escape_string($obj->con, $time),
      );  
        //print_r($insert_data);exit;
      $obj->insert('timesheets', $insert_data);
	
}

