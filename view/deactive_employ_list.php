<?php 
include_once 'src/emp.php'; 
$obj = new Emp();
$employs=$obj->select_active_list_emp('employees',"paygrades","designation",'active=0');
// echo "<pre>";
// print_r($employs);
?>
<div class="row">
    <div class="col-md-12">
        <?php 
            if (!empty($_SESSION['success']) && isset($_SESSION['success'])) {
                 echo $_SESSION['success'];
                 unset($_SESSION['success']);
                 } 
        ?>
        <div class="search-result">
          <ul class="result">
          <?php foreach ($employs as $user): $user_info=json_decode($user['emp_info'],true); //print_r($user_info);exit();?>
                <li id="data_<?php echo $user['id'] ?>"> 
                    <div class="img">
                        <a href="?page=view/emp_profile.php&id=<?php echo $user['id'] ?>"><img  src="vendor/images/<?php echo $user['image'] ?>" height="150px" /></a>
                    </div>
                    <div class="info">
                    <div class="title"><a href="?page=view/emp_profile.php&id=<?php echo $user['id'] ?>"><span class="highlight"><?php echo $user_info['fullname']; ?></span> |  Join Date : <?php $d= strtotime($user['joing_date']); echo date('F d, Y',$d);?></a></div>
                    <div class="list">
                        <ul>
                            <li><b><?php echo $user['designation']?></b></li>
                            <li><?php echo $user['name']?></li>
                            <li><?php echo $user['email']?></li>
                            <li><?php echo $user_info['phone']; ?></li><br><br>  
                            <a href="?page=view/active_employ.php&&id=<?php echo $user['id']; ?>"><span class="btn btn-success" id="myBtn">Active</span></a>
                        </ul>
                    </div>
                    </div>
                </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>