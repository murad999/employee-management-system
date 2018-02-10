<?php 
include_once 'src/emp.php'; 
$obj = new Emp();
$all_emoloys=$obj->select_active_list('employees','active=1');
$all_payments=$obj->selectJoin_paymenthistory_emp('paymenthistories','employees');
// echo "<pre>";
// print_r($all_payments);

?>
<div class="row">
  <div class="col-md-6" style="padding-left: 50px;">
   <h2 style="padding-left: 0px;">Payment</h2><hr>
    <?php 
      if (!empty($_SESSION['submit_payment']) && isset($_SESSION['submit_payment'])) {
         echo $_SESSION['submit_payment'];
         unset($_SESSION['submit_payment']);
         } 
    ?>
   <form action="?page=view/user_payment_deatails.php" method="post">
   <label for="">Select Employee</label>
   <div class="form-group">
        <select class="form-control" name="emp_id">
            <option default>Select employee Id</option>
            <?php foreach($all_emoloys as $employ): $user_info=json_decode($employ['emp_info'],true);?>
		   <option value="<?php echo $employ['id'] ?>"><?php echo $user_info['fullname'] ; ?></option>
		<?php endforeach;?>
        </select>
    </div>
   <button class="btn btn-success btn-sm">Submit</button>
   </form>
</div>
  <div class="row">
    <div class="col-md-12">
          <h3 class="page-header">Payment Histories</h3>
          <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Employee Name</th>
                            <th>Email</th>
                            <th>Total Payment</th>
                            <th>Payment Month</th>
                            <th>Year</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach($all_payments as $payment):$user_info=json_decode($payment['emp_info'],true);?>
                        <?php $month= date('m', strtotime($payment['payment_date']));
                        $year= date('Y',strtotime($payment['payment_date'])); ?>
                        <?php  $monthName = date('F', mktime(0, 0, 0, $month, 10)); ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $user_info['fullname']?></td>
                            <td><?php echo $payment['email']?></td>
                            <td><?php echo $payment['grand_total']?></td>
                            <td><?php echo $monthName;?></td>
                            <td><?php echo $year;?></td>
                        </tr>
                      <?php $i++; endforeach?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
    </div>
  </div>

  