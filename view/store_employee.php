<?php 
include '../src/emp.php';  
$dataa = new Emp;  
$success_message = '';


if(isset($_POST['submit'])){
 $data=$_POST;  
 //print_r($data); 
$uname=$data['username'];
$email=$data['email'];
//echo $data['email'];
$desig=$data['desig'];
$payg_name=$data['payg_name'];
$pass=$data['password']=md5($data['password']);
$emp_info=$data['emp_info']=json_encode($data['emp_info']);
$join_date=$data['join_date'];
// echo "<pre>";
// print_r($data);
// echo "</pre>";
//inserting image
$image = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];
//echo $image_tmp;
    if($uname == '' || $pass == '' || $email == '' || $desig=='' || $payg_name == '' || $emp_info=='' || $join_date == '' || $image == '') {
        header("location:../?page=view/main.php");
    }else{
        //print_r($_POST);exit();
        move_uploaded_file($image_tmp,"../vendor/images/$image");
        $insert_data = array(  
           'username'     =>     mysqli_real_escape_string($dataa->con, $uname),
           'password'     =>     mysqli_real_escape_string($dataa->con, $pass),
           'email'     =>     mysqli_real_escape_string($dataa->con, $email),
           'designation_id'     =>     mysqli_real_escape_string($dataa->con, $desig),
           'paygrade_id'     =>     mysqli_real_escape_string($dataa->con, $payg_name),
           'emp_info'     =>     mysqli_real_escape_string($dataa->con, $emp_info),
           'joing_date'     =>     mysqli_real_escape_string($dataa->con, $join_date),
           'image'     =>     mysqli_real_escape_string($dataa->con, $image),
           'active'     =>     mysqli_real_escape_string($dataa->con, '1'),
           'role'     =>     mysqli_real_escape_string($dataa->con, '0'),

      );  
        //print_r($insert_data);exit;
      $dataa->insert('employees', $insert_data);
       
    }

}
?>