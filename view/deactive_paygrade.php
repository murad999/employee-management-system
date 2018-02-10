<?php
 include_once('src/emp.php') ;  
 $updatedata = new Emp; 

$id=$_GET['id'];
//echo $id;

if(isset($id)){
  $upd_data=array(
      'status'=>mysqli_real_escape_string($updatedata->con,'0'),
    );
  	$where_condition = array(  
             'id'     =>     $id  
     );  
    //print_r($updatedata->update("paygrades", $upd_data, $where_condition));exit;
        if($updatedata->update("paygrades", $upd_data, $where_condition)) // table name ,data, where 
        {  
             header("location:?page=view/paygrade.php");  
        }  
    
}

