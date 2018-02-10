<?php 
 include '../src/emp.php';  
 $objDesignation = new Emp;  
 $success_message = '';  
 $objDesignation->del('designation', $_GET['rowid']);
	
?>			