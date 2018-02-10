<?php 
include_once 'src/emp.php'; 
$obj = new Emp();
$admins=$obj->select('admins');
$desig = $obj->select('designation');
$payg =$obj->select('paygrades');
$employees=$obj->selectJoin_employ("employees","paygrades","designation");
// echo "<pre>";
// print_r($employees);exit();
?>

<div class="row">
<h1 class="page-header">Dashboard</h1>
</div>
<div class="row">
    <div class="col-md-6">
        <div id="success"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <i class="fa fa-plus fa-fw"></i><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New Admin</button>
    </div>
    <div class="col-md-4">
        <i class="fa fa-plus fa-fw"></i><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalEmp">Add New Employee</button>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <?php 
            if (!empty($_SESSION['success']) && isset($_SESSION['success'])) {
                 echo $_SESSION['success'];
                 unset($_SESSION['success']);
                 } 
             if (!empty($_SESSION['success_update']) && isset($_SESSION['success_update'])) {
                 echo $_SESSION['success_update'];
                 unset($_SESSION['success_update']);
                 }
        ?>
        <div class="search-result">
          <ul class="result">
          <?php foreach ($employees as $user): $user_info=json_decode($user['emp_info'],true);?>
                <li id="data_<?php echo $user['id'] ?>"> 
                    <div class="img">
                        <a href="?page=view/emp_profile.php&id=<?php echo $user['id'] ?>"><img  src="vendor/images/<?php if(!empty($user['image'])){echo $user['image'];} ?>" height="150px" /></a>
                    </div>
                    <div class="info">
                    <div class="title"><a href="?page=view/emp_profile.php&id=<?php echo $user['id'] ?>"><span class="highlight"><?php echo $user_info['fullname']; ?></span> |  Join Date : <?php $d= strtotime($user['joing_date']); echo date('F d, Y',$d);?></a></div>
                    <div class="list">
                        <ul>
                            <li><b><?php echo $user['designation']?></b></li>
                            <li><?php echo $user['name']?></li>
                            <li><?php echo $user['email']?></li>
                            <li><?php echo $user_info['phone']; ?></li><br><br>
                            <a href="?page=view/edit_employ.php&&id=<?php echo $user['id'] ?>"><span class="btn btn-info" id="myBtn">Update</span></a>
                            <a href="?page=view/deactive_employ.php&&id=<?php echo $user['id']; ?>"><span class="btn btn-danger" id="myBtn">Deactive</span></a>
                        </ul>
                    </div>
                    </div>
                </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>




<!-- Modal for Admin-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Admin</h4>
        </div>
        <div class="modal-body">
           <div class="row">
                <div class="col-md-8">
					<form role="form" action="view/store_admin.php" method="post" id="admin_add">
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                            <input type="text" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <!-- Modal for Employe-->
  <div class="modal fade" id="myModalEmp" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Employee</h4>
        </div>
        <div class="modal-body">
           <div class="row">
                <div class="col-md-8">
					<form role="form" action="view/store_employee.php" id="empInfo" method="post" enctype="multipart/form-data">
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-paper-plane fa-fw"></i></span>
                            <input type="text" name="emp_info[fullname]" id="emp_info[fullname]" class="form-control" placeholder="Fullname">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                            <input type="text" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-mobile fa-fw"></i></span>
                            <input type="text" name="emp_info[phone]" id="emp_info[phone]" class="form-control" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="desig" id="desig">
                                <option default>Select Designation</option>
                            <?php foreach($desig as $deg): ?>
                                <option value="<?php echo $deg['id'] ?>"><?php echo $deg['designation']?></option>
                            <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="payg_name" id="payg_name">
                                <option default>Select Pay Grade</option>
                                <?php foreach($payg as $pg): ?>
                                <option value="<?php echo $pg['id'] ?>"><?php echo $pg['name']?></option>
                            <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                            <input type="date" name="join_date" id="join_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><i class="fa fa-institution fa-fw"></i>Address</label>
                            <textarea name="emp_info[address]" id="emp_info[address]" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-folder-open fa-fw"></i></span>
                            <input type="file" name="image" id="image" class="form-control" placeholder="">
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Register</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>