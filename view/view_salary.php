<?php  
include_once 'src/emp.php'; 
$obj = new Emp();

$id=$_GET['id'];
//echo $id ."<br>";
$datas = $obj->selectJoin_viewSalary('salaries','paygrades','payitems');

 // echo "<pre>";
 // print_r($datas);
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
          Employee salary Information
        </h1>
        <div class="card-body">
          <div class="row ">
            <div class="col-md-6 shadow">
              <h2>Paygrade : <?php foreach ($datas as $data){ if($data['paygrade_id']==$id){ echo $data['name'] ; break;} }  ?> </h2>
              
                      <table class="table">
                       <thead>
                        <th  class="text-center">Payitem Name</th>
                        <th  class="text-center">Amount</th>
                      </thead>
                        <?php $totalsalary = 0; ?>
                      	<?php foreach($datas as $data){
                      		if($data['paygrade_id']==$id){
                      			$totalsalary+=$data['amount'];

                      		}
                      		} ?>
                        <?php //$totalsalary+=  $salarys->amount; ?>
                      <tbody>
                      <?php foreach($datas as $data): if($data['paygrade_id'] == $id): ?>
                        <tr>
                        <td> <?php if($data['paygrade_id']==$id){echo $data['p_name']; }?></td>
                        <td><?php if($data['paygrade_id']==$id){echo $data['amount'];} ?></td>
                        <td> </td>
                        <td> </td>
                        </tr>
                    <?php endif; endforeach; ?>
                      </tbody>
                  </table>
              
            </div>
            <div class="col-md-6">
             <?php $basic=""?>
             <?php 
             	foreach ($datas as $data){ 
             		if($data['paygrade_id']==$id){ 
             			$basic = $data['basic'];
             			break;
					} 
				} 
             ?>
              <h2>Basic Amount</h2><b><?php if($data['paygrade_id']==$id){echo $basic ;} ?> </b>
                      <table class="table">
                      <thead>
                        <th>Total payitems amount</th>
                        <th>Total</th>
                      </thead>
                      <tbody>
                      <?php //foreach($datas as $data): if($data['paygrade_id'] == $id): ?>
                        <tr>
                        <td><?php foreach($datas as $data){ if($data['paygrade_id']==$id){echo $totalsalary; break;} }?></td>
                        <td> 
                        <?php foreach($datas as $data){if($data['paygrade_id']==$id){echo $totalsalary+$basic; break;} } ?>
                        </td>
                        </tr>
                        <?php //endif; endforeach; ?>
                      </tbody>
                  </table>
            </div>
          </div><br><br>
           <a href="?page=view/salary_manag.php" class="btn btn-success">Back</a>
        </div>
    </div>
</div>

