<?php 
include_once 'src/emp.php'; 
$obj = new Emp();
//print_r($_POST);
 $id=$_POST['emp_id'];
 //echo $id."<br>";
 $all_infos=$obj->select_active_list_emp('employees','paygrades','designation','active=1');
 // echo "<pre>";
 // print_r($all_infos);exit;

 $salaries = $obj->select('salaries');
 // echo "<pre>";
 // print_r($salaries);exit;
$times=$obj->select_month_year_day('timesheets','employee_id='.$id);
 foreach($all_infos as $info): $user_info=json_decode($info['emp_info'],true); if($info['id']==$id):

?>
<div class="row">
	<h1 class="page-header">Payments</h1>
    <div class="col-md-6">
    	<div class="row">
    		<form action="?page=view/store_payments.php" method="post">
    			<div class="col-md-6">
	          	     <label for="">Full Name</label>
	          		   <input type="hidden" readonly="" value="<?php echo $info['id']; ?>" name="emp_id" class="form-control" placeholder="Input">
	               	 <input type="text" readonly="" name="fullname" value="<?php echo $user_info['fullname']; ?>" class="form-control"  placeholder="Input"><br>
	               	 <label for="">Paygrade</label>
	              	 <input type="text" readonly="" name="paygrade" value="<?php echo $info['name']; ?>" class="form-control" placeholder="Input"><br>
	                 <label for="">Extra Salary</label>
	                 <?php 
	                 $py=$info['paygrade_id'];
	                 $bas=$info['basic'];
	                 $totalsalary = 0; 
						 foreach($salaries as $data){
							if($data['paygrade_id']==$py){
								$totalsalary+=$data['amount']."<br>";

							}
						}
					$net_total=$bas+$totalsalary;
					//echo $net_total;
	                 ?>
	      			<input type="text" readonly="" name="extra" value="<?php foreach($salaries as $data){ if($data['paygrade_id']==$py){echo $totalsalary; break;}}?>" class="form-control" placeholder="extra slary"><br>
          		</div>
          		<div class="col-md-6">
          	      <label for="">Designation</label>
          	      <input type="hidden" readonly="" name="designation_id" value="<?php echo $info['designation_id']; ?>" class="form-control" placeholder="Input">
                	<input type="text" readonly="" name="designation" value="<?php echo $info['designation']; ?>" class="form-control" placeholder="Input"><br>
          		    <label for="">Basic Salary</label>
              	  <input type="text" readonly="" name="basic" value="<?php echo $info['basic']; ?>" class="form-control" placeholder=""><br>
                  <label for="">Sub Total Salary</label>
       		      	<input type="text" id="subtotal" name="subtotal" readonly="" value="<?php echo $net_total;?>" class="form-control" placeholder=""><br>
            	</div>
            	 <label for="">Deduction Salary</label>
		     	<input type="text" value="" name="deduction" onkeyup="xyz(this.value)" id="deduct" class="form-control" placeholder="Deduct Salary"><br>
		      <label for="">Grand total</label>
		     	<input type="text" id="grand" name="grandtotal" value="" class="form-control" placeholder="Grand total"><br>
		     	<textarea type="text" value="" name="description" class="form-control" placeholder="Description....."></textarea><br>
		      <label for="">Select Date of Payment</label>
		     	<input type="date"  name="dateselect" class="form-control" placeholder="Select Date"><br>
		      <button type="submit" class="btn btn-success">Submit</button>
    		</form>
    		<hr>
    	</div>
    </div>  
    <div class="col-md-6">
		<div class="item">
		<img  src="vendor/images/<?php echo $info['image'] ?>">
		</div>
		<div class="paymentempname">
		<?php $month=0; ?>
		<h2>	<?php echo $user_info['fullname']; ?></h2>
		   <h4>  Last payment Date : 
		    <?php foreach ($times as $time) : //print_r($time);//exit?>
		    {{$lastpaydate->payment_date}}  </h4>
		    <h4>Year : <?php echo $time['entry_year']?></h4> 
		    <?php $month  = $time['entry_month'];
		      $monthName = date('F', mktime(0, 0, 0, $month, 10));
		     ?>
		    <h4>Month : <?php echo $monthName ;?></h4> 
		    <h4>Total attendance this month : <?php echo $time['total_entry'];?> day</h4> 
		<?php endforeach;?>
		    <?php 
		    $perdaysalary=($net_total/25);
		    $total = $perdaysalary* $time['total_entry']; 
		    $amount_deduction = $net_total-$total;
		     ?>
		     <h4>Perday salary : <?php echo $perdaysalary?> tk</h4>
		     <h4>Total salary this month: <?php echo $total;?> tk</h4>
		     <h4>Total amount deduction from sub total: <?php echo $amount_deduction?> tk</h4>  
		   	 <br>         
		 <br> 
		<h4>Calculator</h4>         
	<form  name=calculator>
	   <table  border=2>
	   <tr>
	   <td colspan=4><input class="input" type=text name=txt1 size="30"></td>
	   </tr>
	      <tr>
	      <td><input class="button" type=button value="0" name="zero" onclick="sharifcal(zero.value)"></td>
	      <td><input class="button" type=button value="1" name="one" onclick="sharifcal(one.value)"></td>
	      <td><input class="button" type=button value="2" name="two" onclick="sharifcal(two.value)"></td>
	      <td><input class="operator" type=button value="+" name="plus" onclick="sharifcal(plus.value)"></td>
	      </tr>
	      <tr>
	      <td><input class="button" type=button value="3" name="three" onclick="sharifcal(three.value)"></td>
	      <td><input class="button" type=button value="4" name="four" onclick="sharifcal(four.value)"></td>
	      <td><input class="button" type=button value="5" name="five" onclick="sharifcal(five.value)"></td>
	      <td><input class="operator" type=button value="-" name="minus" onclick="sharifcal(minus.value)"></td>
	      </tr>
	      <tr>
	      <td><input class="button" type=button value="6" name="six" onclick="sharifcal(six.value)"></td>
	      <td><input class="button" type=button value="7" name="seven" onclick="sharifcal(seven.value)"></td>
	      <td><input class="button" type=button value="8" name="eight" onclick="sharifcal(eight.value)"></td>
	      <td><input class="operator" type=button value="*" name="multiply" onclick="sharifcal(multiply.value)"></td>
	      </tr>
	      <tr>
	      <td><input class="button" type=button value="9" name="nine" onclick="sharifcal(nine.value)">
	      </td>   <td><input class="cancel" type=button value="CE" onClick="calculator.reset();">
	      </td>   <td><input class="operator" type=button name=eqlbtn value== onclick="txt1.value=eval(txt1.value)"></td>
	      <td><input class="operator" type=button value="/" name="divide" onclick="sharifcal(divide.value)"></td>
	      </tr>
	   </table>
	 </form>
	</div>
	<a href="?page=view/payment_manag.php"><button class="btn btn-success"  style="margin: 60px 40px">Back</button></a>
 </div>

</div>
<?php endif;endforeach; ?>
