<?php
//ob_start();
include_once 'include/header.php'; 
include_once 'src/emp.php';
$obj=new Emp;
$admins=$obj->select('admins');
$role_id=[];
$_SESSION['user']=[];
$pass=[]; 
foreach($admins as $admin){
     $_SESSION['user'][]=$admin['username'];
     $role_id[]=$admin['role'];
        $pass[]=$admin['password'];
}

$employees=$obj->select('employees'); 
foreach($employees as $employee){
     $_SESSION['user'][]=$employee['username'];
     $role_id[]=$employee['role'];
    $pass[]=$employee['password'];
}
//print_r($_SESSION['user']);exit();
$_SESSION['role']=$role_id;
if(isset($_POST['submit']) && !empty($_POST['submit'])){
    $data=$_POST;
    $password=md5($data['password']);
    if($data['username']==$_SESSION['user'] && $password==$pass && $_SESSION['role']==1){
            header('location:index.php');
    }else{
        if( in_array(isset($data['username']),$_SESSION['user']) && in_array(isset($password),$pass) &&  in_array(isset($_SESSION['role']),$role_id)){
            header('location:emp/profile.php');
        }
    }
}

?>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Log In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter User Name" name="username" type="text" autofocus required="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Login ">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'include/footer.php'; ?>
</body>

</html>
