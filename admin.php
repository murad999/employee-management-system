<?php
session_start();
//echo $_SESSION['user'];exit;
//if($_REQUEST){}

//echo $_SESSION['role'];exit;
if(isset($_SESSION['user']) && !empty($_SESSION['user'] && $_SESSION['role']==1)){


ob_start();
 include_once 'include/header.php'; ?>


<body>

    <div id="wrapper">

        <!-- Navigation -->
      <?php include_once 'include/sidebar.php'; ?>  

        <div id="page-wrapper">
            <?php
                        if(isset($_GET['page']) && file_exists($_GET['page'])){       
                           include_once($_GET['page']);
                        }else{
                            include_once('view/main.php');
                        }
                    ?>
            
               
               
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include_once 'include/footer.php'; ?>
</body>

</html>
<?php }else{

header('location:index.php');

}


?>