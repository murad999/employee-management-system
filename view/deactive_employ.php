<?php
 include 'src/emp.php';  
 $updatedata = new Emp; 

$id=$_GET['id'];
//echo $id;exit();

if(isset($id)){
  //echo $id;exit();
  $upd_data=array(
      'active' => mysqli_real_escape_string($updatedata->con,'0'),
    );
  //print_r($upd_data);exit();
  	$where_condition = array(  
             'id'     =>     $id  
     ); 
     //print_r($updatedata->update("employees", $upd_data, $where_condition));exit(); 
        if($updatedata->update("employees", $upd_data, $where_condition)) // table name ,data, where 
        {  
          //print_r($da);exit;
             header("location:?page=view/main.php");  
             //echo "dsfsdf";
        }  
    
}