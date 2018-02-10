<?php
ob_start();
include_once 'include/header.php'; 
session_start();
if(isset($_SESSION['user']) && !empty($_SESSION['user'] && $_SESSION['role']==0)){
?>


<body>

    <div id="wrapper">

        <!-- Navigation -->
      <?php include_once 'include/sidebar.php'; ?>  

        <div id="page-wrapper">
            <?php
                if(isset($_GET['page']) && file_exists($_GET['page'])){       
                   include_once($_GET['page']);
                }else{
                    include_once('main.php');
                }
            ?>           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include_once 'include/footer.php'; ?>
<?php  }else{

header('location:../index.php');

}
?>