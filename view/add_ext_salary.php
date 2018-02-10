<?php 
include_once 'src/emp.php'; 
$obj = new Emp();

$id=$_GET['id'];
//echo $id ."<br>";
$deg_paygs=$obj->select_join('designation','paygrades');
//echo "<pre>";
//print_r($deg_paygs);

$payitms=$obj->select('payitems');
$salas=$obj->select('salaries');

//print_r($salas);
//$arr=array();
//$arr2=array();
// $salarylist=[];
//         foreach ($salas as $key=> $salary)
//         {
//           //print_r($salary) ;
//             //$salarylist[$salary=>'payitem_id']=[$salary=>'amount'];
//             //['payitem_id'=>$p_itemid,'paygrade_id'=>$paygid,'amount'=>$amount];


 //print_r( $deg_payg);exit;
//echo "<pre>";
//print_r($arr);
//echo $arr['4']['designation'];
//exit();

?>

<div class="row">
<?php foreach($deg_paygs as $deg_payg): if($deg_payg['id']==$id): ?>
    <div class="col-md-12">
          <h1 class="page-header">Employee management system</h1>
          <h4>Employee designation names :<?php if($deg_payg['id'] == $id){echo $deg_payg['designation'];}  ?></h4>
          <hr>
          <h3><strong>Basic: </strong><?php if($deg_payg['id'] == $id){echo $deg_payg['basic'];}?></h3>
    </div>

	<div class="col-md-12">
		<form action="view/store_ext_salary.php" method="post">
                     <?php foreach($payitms as $paytm) : ?>
                       <span class="col-xs-12 deg">
                       <br>
                       <br>
                       </span>
                       <span class="col-xs-6"><strong><?php echo $paytm['p_name'] ?></strong> Exact($)</span>
                       <span class="col-xs-5 col-xs-offset-1">Percent (%) </span>
                       <span class="col-xs-6">                         
                       <input class="form-control exact_input" type="number" id="acccurate_<?php echo $paytm['id'] ?>" data_acccurate="<?php echo $paytm['id'] ?>" name="salarylist[<?php echo $paytm['id'] ?>]" value="<?php foreach($salas as $val){ if($val['paygrade_id'] == $id && $paytm['id']==$val['payitem_id']){echo $val['amount'];} } ?>" placeholder="Enter amount">
                        </span>
                        <span class="col-xs-6">
                        <span class="col-xs-1">
                         OR        
                        </span>
                        <span class="col-xs-11">
                        <input class="form-control percent_input" id="percent_<?php echo $paytm['id'] ?>" value="<?php foreach($salas as $val){ if($val['paygrade_id'] == $id && $paytm['id']== $val['payitem_id']){echo $val['amount']*100/$deg_payg['basic'];} } ?>" basic_payment="<?php if($deg_payg['id']==$id){echo $deg_payg['basic'];} ?>"  placeholder="Enter % amount">
                        </span>
                        </span>
                        <input type="hidden" value="<?php echo $id; ?>" class="form-control" name="pgid">
                       <?php 
                        
                         // foreach($salas as $val){ if($val['paygrade_id'] == $id && $paytm['id']==$val['payitem_id']){echo $td +=$val['amount'];} }

                            ?>
						<?php endforeach; ?>
                  <h4><strong>Total ammount: </strong > <span id="total_ammount"></span> </h4>
                <button class="btn btn-success">submit</button>
                </form>
	</div>
  <?php endif; endforeach;?>
</div>