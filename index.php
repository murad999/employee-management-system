<?php
ob_start();
include_once 'include/header.php'; 
include_once 'src/emp.php';
$obj=new Emp;
$data=$_POST;
// echo "<pre>";
// print_r($data);
$admins=$obj->select('admins');
$role_id=[];
$user=[];
$pass=[]; 
//$ides=[];

  foreach($admins as $admin){
      //$ides=[]=$admin['id'];
       $user[]=$admin['username'];
       $role_id[]=$admin['role'];
          $pass[]=$admin['password'];
  }

//print_r($admin);

$employees=$obj->select('employees'); 

  foreach($employees as $employee){
      //$ides=[]=$employee['id'];
       $user[]=$employee['username'];
       $role_id[]=$employee['role'];
      $pass[]=$employee['password'];
  }

//print_r($employee);
//print_r($user);exit();
//$_SESSION['role']=$role_id;
//$_SESSION['user']=$user;
//print_r($_SESSION['user']);//exit();

if(isset($_POST['submit']) && !empty($_POST['submit'])){
    $data=$_POST;
    $password=md5($data['password']);

    if(in_array($data['username'],$user)){
      $us=$data['username'];//exit;
      $_SESSION['user']=$us;
      //echo "username ". $_SESSION['user'];
    }

    if(in_array($password,$pass)){
      $ps=$password;//exit;
      $_SESSION['pass']=$ps;
      //echo "pass ". $_SESSION['pass'];
    }

    if(in_array($data['action'],$role_id)){
      $rol=$data['action'];//exit;
      $_SESSION['role']=$rol;
      //echo "role ".$_SESSION['role'];
    }


    if($data['username']==$_SESSION['user'] && $data['username']=="admin" && $password==$_SESSION['pass'] && $_SESSION['role']==$data['action']){
            header('location:admin.php');
    }else{
        if($data['username']==$_SESSION['user'] && $data['username']=="admin" && $password==$_SESSION['pass'] && $_SESSION['role']==0){
            header('location:404.php');
        }elseif($data['username']==$_SESSION['user'] && $password==$_SESSION['pass'] && $_SESSION['role']==$data['action']){
            header('location:emp/');
        }
    }
}


?>
    <div class="container">
        <div class="row bg-color">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
          <div class="panel-heading">
          <div class="app-brand"><span class="highlight">EMS</span> Login</div>
          </div>
          <div class="panel-body">
          <form action="" method="POST">
              <div class="input-group space">
                <span class="input-group-addon" id="basic-addon1">
                  <i class="fa fa-user" aria-hidden="true"></i></span>
                <input type="text" name="username" class="form-control" placeholder="Username" aria-describedby="basic-addon1" required>
              </div>
              <div class="input-group space">
                <span class="input-group-addon" id="basic-addon2">
                  <i class="fa fa-key" aria-hidden="true"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon2" required>
              </div>
               <select required class="form-control" name="action">
                  <option value="">Select Your Role</option>
                  <option value="0">Employee</option>
                  <option value="1">Admin</option>                    
                </select>

                 <div class="text-center" style="margin-top: 20px;">
                  <input type="submit" name="submit" class="btn btn-success btn-submit" value="Login">
              </div>
          </form>
      </div>
      </div>
    </div>
  </div>
</div>
<?php include_once 'include/footer.php'; ?>