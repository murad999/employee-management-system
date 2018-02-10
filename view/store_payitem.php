 <?php 
 include '../src/emp.php';  
 $dataa = new Emp;  
 $success_message = '';  
 if(isset($_POST['payitem_name']))  
 {  
 	if($_POST['payitem_name'] == ''){
 		header("location:../?page=view/manage_payitem.php");
 	}else{
 		$insert_data = array(  
           'p_name'     =>     mysqli_real_escape_string($dataa->con, $_POST['payitem_name'])  
      );  
      $dataa->insert('payitems', $insert_data);
 	}
      
      
 }  
	