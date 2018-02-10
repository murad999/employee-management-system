<?php 
include_once 'src/emp.php'; 
$objDesignation = new Emp();
$viewdata = $objDesignation->select('designation');//send table name

?>
			<div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header">Current Employes</h1>
					<?php 
					if (!empty($_SESSION['success']) && isset($_SESSION['success'])) {
						 echo $_SESSION['success'];
						 unset($_SESSION['success']);
						 } 
				?>
                </div>
				
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="row">
				<div class="col-md-4">
					<i class="fa fa-plus fa-fw"></i><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New Admin</button>
				</div>
			</div><br/>
			
            <!-- /.row -->
             <div class="row">
                <div class="col-md-8">
                   <table class="table table-striped table-hover">
						<thead>
						  <tr>
							<th>Firstname</th>
							<th colspan="3">Action</th>
						  </tr>
						</thead>
						<tbody>
						<?php 
						foreach($viewdata as $show){
						?>
						  <tr>
							<td><?php echo $show['designation']; ?></td>
							<td>
								<div class="row">
						<div class="col-md-4">
							<a href="view/delete.php?rowid=<?php echo $show['id']; ?>" class="btn btn-info">
								<span class="glyphicon glyphicon-trash"></span>
							</a>
						</div>
					</div>
							</td>
							<td>
							<div class="col-md-4">
							<a href="?page=view/edit.php&rowid=<?php echo $show['id']; ?>" class="btn btn-info">
							<span class="glyphicon glyphicon-edit"></span>
							</a>
						</div>
							</td>
						  </tr>
						<?php }?>  
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
				  <h4 class="modal-title">Designation Details</h4>
				</div>
				<div class="modal-body">
				   <div class="row">
						<div class="col-md-8">
							<form role="form" action="view/store.php" method="post">
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fa fa-paper-plane fa-fw"></i></span>
									<input type="text" class="form-control" name="designation" placeholder="Add New Designation" required>
								</div>                    
								<button type="submit" class="btn btn-success">Save</button>
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
		  