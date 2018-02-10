
<?php 
 include 'src/emp.php';  
 $singleview = new Emp;  
 
 
   $view =   $singleview->view('designation', $_GET['rowid']);//table name , id

   // if(isset($_POST["submit"]))  
   // {  
   //      $update_data = array(  
   //           'designation'     =>     mysqli_real_escape_string($data->con, $_POST['designation']),  
  
   //      );  
   //      $where_condition = array(  
   //           'id'     =>     $view["id"]  
   //      );  
   //      if($singleview->update("designation", $update_data, $where_condition)) // table name ,data, where 
   //      {  
   //           header("location:test_class.php?updated=1");  
   //      }  
   // }  
	
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
        <form role="form" action="view/update.php" method="post">
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-cog fa-fw"></i></span>
                <input type="text" name="designation" value="<?php echo $view['designation']; ?>" class="form-control" placeholder="Add Designation" required>
                <input type="hidden" value="<?php echo $view['id']; ?>" class="form-control" name="id" placeholder="Add New Designation">
            </div>
            <button type="submit" name="update" class="btn btn-success">Update</button>
        </form>
    </div>
</div>