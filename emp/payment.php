<?php 
include_once '../src/emp.php'; 
$obj=new Emp;
$id=$_GET['id'];
$paymentHistories=$obj->select('paymenthistories');
// echo "<pre>";
// print_r($paymentHistories);exit;
?>
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body app-heading">
          <div class="app-title">
            <div class="title" style="text-align: center;"><span class="highlight">Payment History</span></div>
            <div class="description"></div>
               
                <div class="col-xs-12">
                  <div class="card">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Basic Salary</th>
                          <th>Extra Salary</th>
                          <th>Sub Total</th>
                          <th>Deduction</th>
                          <th>Grand Total</th>
                          <th>Payment Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1; foreach($paymentHistories as $payment): if($payment['employee_id']==$id):?>
                        <tr>
                          <td><?php echo $i;?></td>
                          <td><?php echo $payment['basic']?></td>
                          <td><?php echo $payment['additional_total']?></td>
                          <td><?php echo $payment['sub_total']?></td>
                          <td><?php echo $payment['substruction_total']?></td>
                          <td><?php echo $payment['grand_total']?></td>
                          <td><?php $d= strtotime($payment['payment_date']); echo date('F d, Y',$d); ?></td>    
                        </tr>
                       <?php $i++; endif; endforeach;?>
                      </tbody>
                    </table>
                </div>
              
         </div>
      </div>
    </div>

  </div>