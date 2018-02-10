<?php
include_once '../src/emp.php'; 
$obj=new Emp;
if(isset($_SESSION['user']) && !empty($_SESSION['user']) && $_SESSION['role']==0){
  $uid=$_GET['id'];
  //echo $uname;exit;
//     $emp_info=$obj->select('employees');
//   // echo "<pre>";
//   // print_r($emp_info);exit();
//   $username=[];
//   $ids=[];
// $_SESSION['user_data']=[];
// $pgid="";
//   foreach($emp_info as $info){
//      $username[]=$info['username'];
//      $ids[]=$info['id'];
//   }


    // if(in_array($_SESSION['username'],$username)){
    //   $us=$_SESSION['user'];//exit;
    //   //$_SESSION['id']=$us;
    //   echo $us;
    //   //echo "username ". $_SESSION['user'];
    // }
    // //print_r($info['id']);exit;

    // if(in_array($info['id'],$ids)){
    //   $id=$info['id'];//exit;
    //   //$_SESSION['id']=$us;
    //   echo $id;
    //   //echo "username ". $_SESSION['user'];
    // }
  //print_r($username);exit();
    $datas = $obj->selectJoin_viewSalary('salaries','paygrades','payitems');
  $emps=$obj->selectJoin_employ('employees','paygrades','designation');
   // echo "<pre>";
   // print_r($emps);exit;
?>
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body app-heading">
          <div class="app-title">
            <div class="title" style="text-align: center;"><span class="highlight">Salary Info</span></div>
            <div class="description"></div>
                <div class="col-md-6">
                <div class="card card-mini">
                  <?php foreach($emps as $emp): if($emp['id']==$uid):?>
                  <div class="card-header">
                    <label for="">Designation : <?php echo $emp['designation']; ?></label>
                  </div>
                  <div class="card-body">
                       <b>Paygrade :  <?php echo $emp['name'] ?></b><br><br>
                        <b>Basic:  <?php echo $emp['basic'] ?></b><br><br>      
                  </div>
                <?php endif; endforeach;?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-mini">
                  <div class="card-header">
                    Extra salary
                  </div>
                  <div class="card-body">
                    <!-- <b>Home :4000</b><br><br>
                    <b>Health: 500</b><br><br>
                    <b>Lunch: 500</b><br><br>
                    <b>Extra: 500</b><br><br>
                    <b>Transport: 500</b><br><br> -->
                     <?php $totalsalary = 0; $basic="";?>
                     <?php foreach($emps as $emp): if($emp['id']==$uid):?>
                        <?php foreach($datas as $data){
                          if($data['paygrade_id']==$emp['paygrade_id']){
                            $totalsalary+=$data['amount'];
                            //echo $totalsalary;
                          }
                          } ?>
                        
                           <?php 
                            foreach ($datas as $data){ 
                              if($data['paygrade_id']==$emp['paygrade_id']){ 
                                 $basic = $data['basic'];
                                break;
                        } 
                      } 
                           ?>
                      <?php foreach($datas as $data): if($data['paygrade_id']==$emp['paygrade_id']): ?>
                        
                         <b style="padding-left: 27px">Payitem Name:  <?php echo $data['p_name'];?></b><br><br>
                         <b style="padding-left: 27px">amount :  <?php echo $data['amount'];?></b><br><br>
                       <?php endif; endforeach;?> 
                    
              
                     
                            <h3>  Grand salary : <?php if($totalsalary){echo $totalsalary+$basic;}else{echo $emp['basic'];}  ?> </h3>
                      
           <?php endif; endforeach;?>


                  </div>
                </div>
              </div>
         </div>
      </div>
    </div>
  </div>
</div>
<?php  }else{

header('location:../index.php');

}
?>