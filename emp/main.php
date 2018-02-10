<?php
include_once '../src/emp.php'; 
$obj=new Emp;
include_once 'include/header.php'; 
$employees=$obj->selectJoin_employ("employees","paygrades","designation");
// echo "<pre>";
// print_r($employees);
// $id="";
// foreach($employees as $user){
//     if($user['id']==$id){
//         $id=$user['id']; 
//         break;
//     }
   
// }
?>
<?php foreach ($employees as $user): if($user['username']==$_SESSION['user']):  $user_info=json_decode($user['emp_info'],true); ?>
<div class="row">
<div class="card-body app-heading">
    <div class="col-md-12">
          <img class="profile-img" src="../vendor/images/<?php echo $user['image'] ?>">
          <div class="app-title">
            <div class="title"><span class="highlight"><?php echo $user_info['fullname']; ?></span></div>
            <div class="description"><?php echo $user['designation']?></div>
          </div>
          <hr>
    </div>
    <h1 class="page-header" style="color:#3690ec">Profile</h1>
</div>
<div role="tabpanel" class="tab-pane active" id="tab1">
    <div class="row">
       <div class="col-md-6">

       <br><br><br>
       <b><span style="color: #2bb7b7;font-size: 20px;font-weight: bold;">Basic Info:</span></b><br><br>
       <b>Designation : <?php echo $user['designation'] ?></b><br><br>
         <b>Hire dates: <?php $d= strtotime($user['joing_date']); echo date('F d, Y',$d);?></b><br><br>
          <b>Mobile Number: <?php echo $user_info['phone']; ?></b><br><br>
          <b>Email:  <?php echo $user['email']?></b><br><br>
          <b>Address: <?php echo $user_info['address']; ?></b><br><br>
       </div>
       <div class="col-md-6" style="float:right;">
         <a href="#" >
          <img src="../vendor/images/<?php echo $user['image'] ?>"  width="400px"  class="img-responsive">
         </a><br>
         <b>Paygrade : <?php echo $user['name']?> </b><br><br>
         <b>Basic Salary : <?php echo $user['basic']?></b><br><br>
       </div>
    </div>
    </div>
    <!-- <a href="?page=view/main.php" class="btn btn-success">Back</a> -->
</div>
<?php endif; endforeach; ?> 