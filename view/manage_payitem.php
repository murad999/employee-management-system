<?php 
include_once 'src/emp.php'; 
$obj = new Emp();
$payitems=$obj->select("payitems");
//print_r($payitems);
$payitem_name;
?>
  
  <div class="row">
    <div class="col-md-12">
          <h1 class="page-header">Employee PayItems</h1>
          <div class="row">
            <div class="col-lg-6">
               <?php 
                if (!empty($_SESSION['success']) && isset($_SESSION['success'])) {
                 echo $_SESSION['success'];
                 unset($_SESSION['success']);
                 }
               
                
                if (!empty($_SESSION['success_del']) && isset($_SESSION['success_del'])) {
                 echo $_SESSION['success_del'];
                 unset($_SESSION['success_del']);
                } 
             
                if (!empty($_SESSION['success_update']) && isset($_SESSION['success_update'])) {
                 echo $_SESSION['success_update'];
                 unset($_SESSION['success_update']);
                } 
                  
                ?>
              <div id="payitems_table">
                <table class="table">
                  <thead>
                  <tr>
                    <th>PayItems Name</th>
                    <!-- <a href="?page=view/add_designation.php"></a> -->
                    <th>Action</th>
                    <i class="fa fa-plus fa-fw"></i><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New</button>
                  </tr>
                  </thead>
                  <tbody>
                  <hr>
                <?php foreach($payitems as $paytm): //print_r($row);?>
                  <tr>
                    <td><?php echo $paytm['p_name']; ?></td>
                     <td>
                         <a href="?page=view/edit_payitem.php&id=<?php echo $paytm['id'] ?>"  class="btn btn-info" >
                           <span class="glyphicon glyphicon-edit"></span>
                         </a>
                    </td>
                    <td>
                         <a href="view/del_paytm.php?id=<?php echo $paytm['id']; ?>" class="btn btn-info">
                          <span class="glyphicon glyphicon-trash"></span>
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
          <h4 class="modal-title">Add New PayItems</h4>
        </div>
        <div class="modal-body">
           <div class="row">
                <div class="col-md-8">
                  <form role="form" action="view/store_payitem.php" method="post" id="payItem">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-cog fa-fw"></i></span>
                        <input type="text" name="payitem_name" id="payitem_name" class="form-control" placeholder="Add PayItems">
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




