<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Togglesdfgsdfg navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?page=view/main.php"><span class="logo">EMS</span> Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <br/>
						<li>
                            <a href="?page=view/main.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Employe Info<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=view/main.php">Current Employes</a> <!-- ?page=view/current_employ.php -->
                                </li>
                                <li>
                                    <a href="?page=view/deactive_employ_list.php">Deactive Employes</a>
                                </li>
                            </ul>
                            
                        </li>
						 <li>
                            <a href="#"><i class="fa fa-cog fa-fw"></i> Designation Info<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=view/designation.php">Designation Details</a>
                                </li>
                                
                            </ul>
                            
                        </li> 
                        <li>
                            <a href="#"><i class="fa fa-pie-chart fa-fw"></i> Paygrade Info<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=view/paygrade.php">Current Paygrades</a>
                                </li>
                                <li>
                                    <a href="?page=view/deactive_pay_list.php">Deactive Paygrades</a>
                                </li>
                                <li>
                                    <a href="?page=view/manage_payitem.php">Manage Payitems</a>
                                </li>
                            </ul> 
                        </li>
						 <li>
                            <a href="#"><i class="fa fa-money fa-fw"></i> Salary Info<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=view/salary_manag.php">Salary Management</a>
                                </li>
                            </ul>   
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cc-visa fa-fw"></i> Payment<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=view/payment_manag.php">Payment Management</a>
                                </li>
                            </ul>   
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pie-chart fa-fw"></i> Leave Info<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=view/pendding_leaves.php">Pandding Leave Applications</a>
                                </li>
                                <li>
                                    <a href="?page=view/leaves_history.php">Leave Histories</a>
                                </li>
                            </ul> 
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
