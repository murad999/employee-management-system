<?php 
if(isset($_GET['id'])){
  $uid=$_GET['id'];
//echo $uid;
}
//print_r($_POST);
?>
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body app-heading">
          <div class="app-title">
            <div class="title" style="text-align: center;"><span class="highlight">Leave Panel</span></div>
            <?php 
              if (!empty($_SESSION['leave_in']) && isset($_SESSION['leave_in'])) {
                 echo $_SESSION['leave_in'];
                 unset($_SESSION['leave_in']);
                 } 
            ?>
            <div class="description"></div>
            <div class="col-md-12" style="margin-top: 30px;">
             
             <div class="col-md-10 col-md-offset-1">
                <form action="?page=store_leaves.php" method="post">
                  <div class="col-md-6">
                   <label for="">Select leave form</label>
                   <input type="date" name="leave_from" required  class="form-control" placeholder="leave from">
                  </div>
                  <div class="col-md-6">
                    <label for="">Select leave to</label>
                   <input type="date"  required name="leave_to" class="form-control" placeholder="leave To">
                  </div>
                   <br>
                   <br>
                   <div class="col-md-12">
                     <label for="">Description</label>
                     <textarea name="descrtiption" id="textarea" required class="form-control"  placeholder="What the pretext in your have?...." rows="10" ></textarea>
                     <input type="hidden" value="<?php echo $uid;?>" name="emp_id">
                    <input type="submit" value="Submit" class="btn btn-success" style="margin-top: 30px">
                 </div>
                   
                </form>
            </div>
      
            </div>
        </div>
      </div>
    </div>

  </div> 

  <script type="text/javascript">
    
    $('.textarea').wysihtml5();
  </script>