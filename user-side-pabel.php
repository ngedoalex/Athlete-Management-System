    <style type="text/css">
              .navbar .navbar-nav li > a {
        background: none !important;
        color: #c8c9ce !important;
        display: inline-block;
        font-family: 'Tahoma';
        font-size: 15px;
        line-height: 30px;
        padding: 10px 0;
        position: relative;
        width: 100%; 
    }
.user-area .user-menu .nav-link {
    color: #fbfbfb;
    display: block;
    font-size: 14px;
    line-height: 22px;
    padding: 5px 0;
}
    </style>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="user-dashboard.php"><?php echo $user_fulname?></a>
                <a class="navbar-brand hidden" href="user-dashboard.php"><span class="fa fa-desktop fa-sm"></span></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="user-dashboard.php"> <i class="menu-icon fa fa-dashboard"></i>Home </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Students</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-external-link"></i><a href="add_student.php" >Add New</a></li>
                            <li><i class="fa fa-users"></i><a href="all-student.php">All Students</a></li>
                        </ul>
                    </li>
                                        <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-pagelines"></i>Course</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-external-link"></i><a href="add_student.php" >Add New</a></li>
                            <li><i class="fa fa-pagelines"></i><a href="all-courses.php">All Courses</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Transactions</a>
                        <ul class="sub-menu children dropdown-menu">
                            
                            <li><i class="fa fa-bookmark"></i><a href="payments.php">Mga Bayrunon</a></li>
                            <li><i class="fa fa-money"></i><a href="payment_transaction.php">Magbayad ug Bayrunon</a></li>
       
                            
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-print"></i>Reports</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="unpaid.php">Report</a></li>
                            <li><i class="fa fa-table"></i><a href="#">Report</a></li>
                        </ul>
                    </li>



                  
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->