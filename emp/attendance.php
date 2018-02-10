<?php 
date_default_timezone_set("Asia/Dhaka"); 
$date= date('D-M-Y');   
$time = date('h-i-sa');
if(isset($_GET['id'])){
  $uid=$_GET['id'];
//echo $uid;
}
  
?>
      
<div class="row">
    <div class="col-lg-12">
      <div class="card">
      <?php 
        if (!empty($_SESSION['checkin']) && isset($_SESSION['checkin'])) {
           echo $_SESSION['checkin'];
           unset($_SESSION['checkin']);
           } 
        if (!empty($_SESSION['chekmassage']) && isset($_SESSION['chekmassage'])) {
           echo $_SESSION['chekmassage'];
           unset($_SESSION['chekmassage']);
           } 
      ?>
      
        <div class="card-body app-heading">
          <div class="app-title">
            <div class="title" style="text-align: center;"><span class="highlight">Attendence</span>
             <form action="?page=store_attend.php" method="post">
                <input type="hidden" value="<?php echo $uid;?>" name="emp_id">
                <div class="card">
                <textarea name="description" id="" cols="35" rows="3" placeholder="Description....."></textarea><br>
                <button type="submit" name="submit" class="btn btn-success ">Check In</button>
                 <!-- <button type="submit" class="btn btn-primary">Check Out</button><br> -->
                </div>  
             </form>
             </div>        
            </div>
        </div>
      </div>