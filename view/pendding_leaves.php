<?php 
include_once('src/emp.php');
$obj= new Emp;
//$id=$_GET['id'];
//echo $id;exit;
$leaves=$obj->selectJoin_leave_emp("leaves","employees");
//print_r($leaves);exit();



?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header extcol">Employes Leaves Applications</h1>
		<?php 
	        if (!empty($_SESSION['success_update']) && isset($_SESSION['success_update'])) {
	           echo $_SESSION['success_update'];
	           unset($_SESSION['success_update']);
	           } 
         ?>
         <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>Employee Name</th>
              <th>Leave from</th>
              <th>Leave To</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($leaves as $leave): if($leave['status']==0): $user_info=json_decode($leave['emp_info'],true);?>
            <tr>
              <td><a href="?page=view/leave_details.php&&id=<?php echo $leave['employee_id']?>"><?php echo $user_info['fullname'];?></a></td>
              <td><?php echo $leave['leave_from'];?></td>
              <td><?php echo $leave['leave_to'];?></td>
                <?php if($leave['status']==0): ?>
                     <td><?php echo 'Pending';?></td> 
                <?php elseif ($leave['status']==1): ?>
                    <td><?php echo 'Accepted';?></td>
                 <?php elseif ($leave['status']==2) : ?>
                    <td><?php echo 'Rejected';?></td>   
               <?php endif; 
                    // if($leave['status']==0){
                    // echo "<td>"."Pending"."</td>"; 
                    // }elseif($leave['status']==1){
                    //     echo "<td>"."Accepted"."</td>"; 
                    // }elseif($leave['status']==2){
                    //     echo "<td>"."Rejected"."</td>";
                    // }
               ?>
            </tr>
             <?php endif; endforeach;  ?>
          </tbody>
        </table>
    </div>
</div>