<?php
ob_start();
include_once 'include/header.php'; 
include_once '../src/emp.php'; 
$obj=new Emp;
if(isset($_SESSION['user']) && !empty($_SESSION['user'] && $_SESSION['role']==0)){
    $employees=$obj->selectJoin_employ("employees","paygrades","designation");
// echo "<pre>";
// print_r($employees);
$id=[];
foreach($employees as $user){
    if($user['username']==$_SESSION['user']){
        $id[]=$user['id']; 
    }
   
}
//print_r($id);
$uid="";
foreach($id as $userid){
    $uid=$userid;
}
//echo $uid;
?>

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Togglesdfgsdfg navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?page=view/main.php"><span class="logo">EMS</span> Employee</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <?php foreach($employees as $user): if($user['id']==$uid): ?>
                        <li><a href="?page=edit_profile.php&id=<?php echo $user['id']; ?>"><i class="fa fa-user fa-fw"></i> Update Profile</a>
                        </li>
                    <?php endif;endforeach;?>
                        <li class="divider"></li>
                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <?php foreach($employees as $user): if($user['id']==$uid): ?>
                    <ul class="nav" id="side-menu">
                        <br/>
						<li>
                            <a href="?page=main.php"><i class="fa fa-dashboard fa-fw"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Attendance<span class="fa arrow"></span></a> 
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=attendance.php&id=<?php echo $user['id']; ?>">Attendance</a>
                                </li> 
                            </ul>
                        </li>
						 <li>
                            <a href="#"><i class="fa fa-cog fa-fw"></i> Leave<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=leave_history.php&id=<?php echo $user['id']; ?>">Leave History</a>
                                </li>
                                <li>
                                    <a href="?page=leave_apply.php&id=<?php echo $user['id']; ?>">Leave Apply</a>
                                </li>
                                
                            </ul>
                            
                        </li> 
						 <li>
                            <a href="#"><i class="fa fa-money fa-fw"></i> Salary<span class="fa arrow"></span></a> 
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=salary.php&id=<?php echo $user['id']; ?>">Salary info</a>
                                </li> 
                            </ul>
                        </li>
                        <li>
                            <a href="?page=payment.php&id=<?php echo $user['id']; ?>"><i class="fa fa-cc-visa fa-fw"></i> Payment<span class="fa arrow"></span></a>  
                        </li>
                    </ul>
                <?php break;endif;  endforeach;?>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <?php } ?>