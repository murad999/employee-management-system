<?php 
 include '../src/emp.php';  
 $dataa = new Emp;  
$success_message = '';

 $adm=$_POST;   
 $uname=$adm['username'];
 $pass=$adm['password']=md5($adm['password']);
if(isset($uname) && isset($pass)){
    if($uname == '' || $pass == '') {
        header("location:../?page=view/main.php");
    }else{
        $insert_data = array(  
           'username'     =>     mysqli_real_escape_string($dataa->con, $uname),
           'password'     =>     mysqli_real_escape_string($dataa->con, $pass),
           'role'     =>     mysqli_real_escape_string($dataa->con, '1'),

      );  
        //print_r($insert_data);exit;
      $dataa->insert('admins', $insert_data);
    }
}



?>




