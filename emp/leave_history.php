<?php 
include_once('../src/emp.php');
$obj= new Emp;
$id=$_GET['id'];
//echo $id;exit;
$leaves=$obj->select("leaves");
//print_r($leaves);exit();
?>
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body app-heading">
          <div class="app-title">
            <div class="title" style="text-align: center;"><span class="highlight">Leave Status</span></div>
            <div class="description"></div>
            <div class="col-md-12" style="margin-top: 30px;">
             <div class="col-md-1"></div>
             <div class="col-md-10">
             <label for="">Leave Status</label>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Request from</th>
                      <th>Request To</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($leaves as $leave):if($leave['employee_id']==$id): ?>
                    <tr>
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
             <div class="col-md-1"></div>

            </div>
        </div>

   
      </div>
    </div>

  </div>