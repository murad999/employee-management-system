<?php
 include '../src/emp.php';  
 $updatedata = new Emp; 

//Update Paygrade
$pay=$_POST;

//print_r($pay);exit;
$ptm_name=$pay['payitem_name'];

if(isset($ptm_name)){
  if($ptm_name==''){
    header("location:../?page=view/manage_payitem.php");
  }else{
    $upd_data=array(
      'name'=>mysqli_real_escape_string($updatedata->con,$ptm_name),
    );
    $where_condition = array(  
               'id'     =>     $pay["eid"]  
       );  
          if($updatedata->update("payitems", $upd_data, $where_condition)) // table name ,data, where 
          {  
               header("location:../?page=view/manage_payitem.php");  
          }  
  }
  
    
}