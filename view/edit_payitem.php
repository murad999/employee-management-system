<?php 

 include 'src/emp.php';  
 $singleview = new Emp;  
 $view =   $singleview->view('payitems', $_GET['id']);//table name , id

//print_r($view);

//$id=$_GET['id'];
//echo $id;exit;

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Employee PayItem names</h1>
    </div>
    <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
    <div class="col-md-8">
        <form role="form" action="view/update_paytm.php" method="post">
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-cog fa-fw"></i></span>
                <input type="text" name="payitem_name" value="<?php echo $view['p_name'] ?>" class="form-control" placeholder="Add Designation">
                <input type="hidden" value="<?php echo $view['id']; ?>" class="form-control" name="eid">
            </div>
            <button type="submit" name="update" class="btn btn-success">Update</button>
        </form>
    </div>
</div>