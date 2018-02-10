<?php 
include_once 'src/emp.php'; 
$obj = new Emp();
$paygrades=$obj->select_active_list('paygrades','status=0');
?>
  <div class="row">
    <div class="col-md-12">
          <h1 class="page-header">Deactive Paygrades List</h1>
          <div class="row">
            <div class="col-lg-6">
              <div id="pay_table">
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Paygrade Name</th>
                    <th>Basic Salary</th>
                    <th>Action</th><!-- <a href="?page=view/add_paygrade.php"></a> -->
                    <!-- <i class="fa fa-plus fa-fw"></i><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New</button> -->
                  </tr>
                  </thead>
                  <tbody>
                <?php foreach($paygrades as $pays): //print_r($row);?>
                  <tr>
                    <td><?php echo $pays['name']; ?></td>
                    <td><?php echo $pays['basic']; ?></td>
                    <td class="text-center">
                         <a href="?page=view/active_paygrade.php&id=<?php echo $pays['id'] ?>" >
                           <span class="btn btn-success">Active</span>
                         </a>
                    </td>
                  </tr>
                <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
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
          <h4 class="modal-title">Add New Paygrade</h4>
        </div>
        <div class="modal-body">
           <div class="row">
            <div class="col-md-8">
                <form role="form" action="" method="post" id="paygrade">
                    <div class="form-group">
                        <input type="text" name="payg_name" id="payg_name" class="form-control" placeholder="Enter Paygrade Name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="salary_range" id="salary_range" class="form-control" placeholder="Salary Range">
                    </div>
                     <div class="form-group">
                        <select class="form-control" name="desig" id="desig" required>
                            <option default>Select Designation</option>
                            <?php while ( $row = $designation->FETCH_ASSOC()) : ?>
                            <option value=<?php echo $row['id']?>><?php echo $row['designation'] ?></option>
                        <?php endwhile;?>
                        </select>
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
