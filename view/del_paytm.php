<?php 
 include '../src/emp.php';  
 $objDesignation = new Emp;  
 $success_message = 'deleted';  
 //$objDesignation->del('designation', $_GET['rowid']);
 //
 $id=$_GET['id'];
	//echo $id;
$objDesignation->del('payitems', $id);
?>	