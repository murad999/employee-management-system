<?php 
include_once 'src/emp.php'; 
$obj = new Emp();
$employees=$obj->selectJoin_employ("employees","paygrades","designation");
echo "<pre>";
print_r($employees);exit();

?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Current Employes</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-md-4">
        <i class="fa fa-plus fa-fw"></i><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New Admin</button>
    </div>
    <div class="col-md-4">
        <a href="?page=views/add_employee.php"><i class="fa fa-plus fa-fw"></i><button type="button" class="btn btn-primary">Add New Employee</button></a>
    </div>
</div><br/>
 <div class="row">
    <div class="col-md-8">
       <table class="table table-striped table-bordered table-hover">
			<thead>
			  <tr>
				<th>Fullname</th>
				<th>Username</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Joing Date</th>
                <th>Image</th>
				<th colspan="3">Action</th>
			  </tr>
			</thead>
			<tbody>
            <?php foreach($employees as $employ): $user_info=json_decode($employ['emp_info'],true);?>
			  <tr>
				<td><?php echo $user_info['fullname'] ?></td>
				<td><?php echo $employ['username'] ?></td>				
				<td><?php echo $employ['email'] ?></td>
				<td><?php echo $user_info['phone'] ?></td>
				<td><?php echo $user_info['address'] ?></td>
				<td><?php echo $employ['joing_date'] ?></td>
				<td><img src="vendor/images/<?php echo $employ['image'] ?>" width="100px" height="100px"></td>			
				<td><a href="delete.php?id=<?php echo $employ['id'] ?>">Details</a></td>
				<td><a href="delete.php?id=<?php echo $employ['id'] ?>">Edit</a></td>
				<td><a href="delete.php?id=<?php echo $employ['id'] ?>">Delete</a></td>
			  </tr>
            <?php endforeach; ?>
			</tbody>
		</table>
    </div>
</div>
			
			
			 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
           <div class="row">
                <div class="col-md-12">
                    <form role="form" action="view/store.php">
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-paper-plane fa-fw"></i></span>
                            <input type="text" class="form-control" placeholder="Fullname">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <input type="text" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                            <input type="text" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-mobile fa-fw"></i></span>
                            <input type="text" class="form-control" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="">
                                <option default>Select Designation</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="">
                                <option default>Select Pay Grade</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><i class="fa fa-institution fa-fw"></i>Address</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-folder-open fa-fw"></i></span>
                            <input type="file" class="form-control" placeholder="Phone">
                        </div>
                        <button type="submit" class="btn btn-success">Register</button>
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