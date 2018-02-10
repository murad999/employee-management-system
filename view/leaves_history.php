<?php 
include_once('src/emp.php');
$obj= new Emp;
$leaves=$obj->select_active_list('leaves','status=1');
$leaves2=$obj->select_active_list('leaves','status=2');

//print_r($leaves);
//print_r($_POST);

?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header extcol">Employes Leaves Applications</h1>
        <div class="col-md-6">
        	<form action="" method="post">
	       <select class="form-control" name="status"  >
	            <option default>Select status</option>
	            <option value="1">Accepted</option>
	            <option value="2">Rejected</option>
	        </select>
	      <button class="btn btn-success btn-secr">Search</button>
	     </form>
        </div>
		<?php if(isset($_POST['status']) && $_POST['status']==1):?>
         <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>Employee ID</th>
              <th>Leave from</th>
              <th>Leave To</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($leaves as $leave): if($leave['status']==1): ?>
            <tr>
              <td><a href="?page=view/leave_details.php&&id=<?php echo $leave['employee_id']?>"><?php echo $leave['employee_id'];?></a></td>
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
    <?php elseif(isset($_POST['status']) && $_POST['status']==2): ?>
    	<table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>Employee ID</th>
              <th>Leave from</th>
              <th>Leave To</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($leaves2 as $leave): if($leave['status']==2):// print_r($leave);exit;?>
            <tr>
              <td><a href="?page=view/leave_details.php&&id=<?php echo $leave['employee_id']?>"><?php echo $leave['employee_id'];?></a></td>
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
    <?php else : ?>
    	<table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>Employee ID</th>
              <th>Leave from</th>
              <th>Leave To</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($leaves as $leave): if($leave['status']==1): ?>
            <tr>
              <td><a href="?page=view/leave_details.php&&id=<?php echo $leave['employee_id']?>"><?php echo $leave['employee_id'];?></a></td>
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
        <?php endif;?>
    </div>
</div>