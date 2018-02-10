<?php 
 include 'src/emp.php';  
 $obj= new Emp; 
$desig = $obj->select('designation');
//print_r($desig);exit();
$payg =$obj->select('paygrades');
 $id=$_GET['id'];
 //echo $id;
 $em_views =   $obj->view('employees', $id);//table name , id
 // echo "<pre>";
 // print_r($em_views);
 //echo $em_views['id'];
 $degid=$em_views['designation_id'];
 $pgid=$em_views['paygrade_id'];
$user_info=json_decode($em_views['emp_info'],true);
 ?>
 <div class="row">
 	<div class="col-md-12">
 	<h1 class="page-header">Employee</h1>
        <?php 
            if (!empty($_SESSION['success']) && isset($_SESSION['success'])) {
                 echo $_SESSION['success'];
                 unset($_SESSION['success']);
                 } 
        ?>
     </div>
    <div class="col-lg-6 col-lg-offset-3">
	    <form role="form" action="view/update_employ.php" method="post" enctype="multipart/form-data">
	    	<label for="">User Name</label>
	        <div class="form-group input-group">
	            <span class="input-group-addon"><i class="fa fa-paper-plane fa-fw"></i></span>
	            <input type="text" name="username" class="form-control" value="<?php echo $em_views['username'];?>">
	        </div>
	        <label for="">Email</label>
	        <div class="form-group input-group">
	            <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
	            <input type="email" name="email" class="form-control" value="<?php echo $em_views['email']; ?>">
	        </div> 
	        <label for="">Select Designation</label>
	        <div class="form-group">
	            <select class="form-control" name="desig">
	                <option default>Select Designation</option>
	                <?php $degid; foreach($desig as $deg) : ?>
	                <option value="<?php echo $deg['id'] ?>" <?php if($deg['id']==$degid){echo "selected";}?>><?php echo $deg['designation'] ?></option>
	            <?php endforeach; ?>
	            </select>
	        </div>
	        <label for="">Select Paygrades</label>
	        <div class="form-group">
	            <select class="form-control" name="payg_name">
	                <option default>Select Pay Grade</option>
	                <?php foreach($payg as $pag): ?>
	                <option value="<?php echo $pag['id'] ?>" <?php if($pag['id']==$pgid){echo "selected";} ?>><?php echo $pag['name'] ?></option>	
	                <?php endforeach; ?>          
	            </select>
	        </div>
	        <label for="">Select Image</label>
	        <div class="form-group input-group">
	            <span class="input-group-addon"><i class="fa fa-folder-open fa-fw"></i></span>
	            <input type="file" name="image" class="form-control" placeholder="">
	        </div>
	        <input type="hidden" value="<?php echo $em_views['id']; ?>" class="form-control" name="eid">
	        <button type="submit" class="btn btn-success">Update</button>
	    </form>
    </div>
</div>