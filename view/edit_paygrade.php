<?php 
 include 'src/emp.php';  
 $singleview = new Emp;  
 $view =   $singleview->view('paygrades', $_GET['id']);//table name , id
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Employee designation names</h1>
    </div>
    <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
    <div class="col-md-8">
        <form role="form" action="view/update_payg.php" method="post">
            <div class="form-group">
                <input type="text" name="payg" value="<?php echo $view['name'] ?>" class="form-control" placeholder="Add Designation">
            </div>
            <div class="form-group">
                <input type="text" name="basic" value="<?php echo $view['basic'] ?>" class="form-control" placeholder="Add Designation">
                <input type="hidden" value="<?php echo $view['id']; ?>" class="form-control" name="eid" placeholder="Add New Designation">
            </div>
            <button type="submit" name="update" class="btn btn-success">Update</button>
        </form>
    </div>
</div>