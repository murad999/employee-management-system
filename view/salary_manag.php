<?php
include_once 'src/emp.php'; 
$obj = new Emp();
$deg_paygs=$obj->select_join('designation','paygrades');

//echo "<pre>";
//print_r($info);exit();
//success
//SELECT * FROM designation LEFT JOIN paygrades ON paygrades.designation_id = designation.id

?>

<div class="row">
    <div class="col-md-12">
          <h1 class="page-header">Paygrade wise basic salary information</h1>
          <div class="row">
            <div class="col-md-8">  
              <?php 
                if (!empty($_SESSION['success']) && isset($_SESSION['success'])) {
                   echo $_SESSION['success'];
                   unset($_SESSION['success']);
                   } 
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div id="pay_table">
                <table class="table table-bordered">
                  <thead>
                  <tr>
                    <th>Paygrade Name</th>
                    <th>Designation Name</th>
                    <th>Basic Salary</th>
                    <th colspan="2" class="text-center">Salary</th><!-- <a href="?page=view/add_paygrade.php"></a> -->
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($deg_paygs as $deg_payg): ?>
                  <tr>
                    <td><?php echo $deg_payg['name']; ?></td>
                    <td><?php echo $deg_payg['designation']; ?></td>
                    <td><?php echo $deg_payg['basic']; ?></td>
                     <td  class="text-center">
                         <a href="?page=view/add_ext_salary.php&id=<?php                              echo $deg_payg['id'] ?>">
                           <span class="btn btn-info" id="myBtn">Edit                                Salary</span>
                         </a>
                    </td>
                    <td  class="text-center">
                         <a href="?page=view/view_salary.php&&id=<?php echo $deg_payg['id'] ?>" >
                           <span class="btn btn-success" id="myBtn">Show Salary</span>
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