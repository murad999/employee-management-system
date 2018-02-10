<?php 
include_once('src/emp.php');
$obj= new Emp;
$id=$_GET['id'];
//echo $id;exit;
$leaves=$obj->selectJoin_leave_emp("leaves","employees");
//print_r($leaves);exit();
//
?>
<div class="row">
<div class="col-md-12">
<div class="card">
<h1 class="page-header extcol">Employes Leaves Applications</h1>

	      <?php foreach ($leaves as $leave) : if($leave['employee_id']==$id && $leave['status']==0): $user_info=json_decode($leave['emp_info'],true); ?>
			 <div class="img">
                        <a href="#"><img  src="vendor/images/<?php echo $leave['image']?>" height="150px" /></a>
             </div>
				<h2>Fullname : <?php echo $user_info['fullname']?></h2>
				<hr>
				<hr>
				<h3>Leave form : <?php echo $leave['leave_from']?></h3>
				<h3>Leave To : <?php echo $leave['leave_to']?></h3>
				<h3>Leave details : </h3>

				<div class="lev_det">
				<?php echo strip_tags(html_entity_decode($leave['description'])); ?>
				</div><br><br>
				<table>
					<tbody>
						<tr>
							<td>
							<form action="?page=view/acceptleave.php" method="post">
			            	 <input type="hidden" value="<?php echo $leave['employee_id'] ?>" name="accept_id">
			            	 <button class="btn btn-success">Accept</button>
			    			</form>
			    			</td>
			           		 <td>
			           		 <form action="?page=view/rejectleave.php" method="post">
			                     <input type="hidden" value="<?php echo $leave['employee_id'] ?>" name="reject_id">
			                     <button class="btn btn-danger">Reject</button>
			           		 </form>
			            	</td>
						</tr>
					</tbody>
				</table>
				<hr>	
	       <?php endif;endforeach; ?>

</div>
</div>
</div>
