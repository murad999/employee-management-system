<?php 
 include '../src/emp.php';  
 $dataa = new Emp;

 //print_r($_POST);
 $paygid=$_POST['pgid'];
 $salarylists=$_POST['salarylist'];
 //print_r($salarylists);exit;
$query = "DELETE FROM salaries WHERE paygrade_id ='$paygid'";
$dataa->delete($query);


//echo "$query";exit;
 $data=[];

 foreach($salarylists as $p_itemid => $amount){
 	//echo $p_itemid. 'id' . '=' . 'value'. $amount;
 	$data[]=['payitem_id'=>$p_itemid,'paygrade_id'=>$paygid,'amount'=>$amount];
 
 		$insert_data = array(  
           'payitem_id'     =>     mysqli_real_escape_string($dataa->con, $p_itemid),  
           'paygrade_id'     =>     mysqli_real_escape_string($dataa->con, $paygid),  
           'amount'     =>     mysqli_real_escape_string($dataa->con, $amount),  
      );  
 	  
      $dataa->insert('salaries', $insert_data);
 	 
 }


 
 //echo "<pre>";
 //print_r($data);