<?php
include "header.php";

$id = $_SESSION['id'];

?>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.php" class="site_title"><i class="fa fa-database"></i> <span>Administrator</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix ">
                        <?php

                        ?>
                        <div class="profile_pic">
                            <div style="width:60px;border-radius: 100px;">
                                <img src="assets/img/logo-kominfo.png" alt="..." class="img-circle profile_img" style="width: 100%;height:60px;  object-fit:cover;">
                            </div>
                        </div>
                        <div class="profile_info">
                            <span>Welcome, </span>
                            <h2>
                                <?php if (isset($_SESSION['superadmin'])) {
                                    echo "Superadmin";
                                } else {
                                    echo " Admin";
                                } ?>


                            </h2>
                        </div>
                        <?php
                        // }}

                        ?>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <!-- <h3>General</h3> -->
                            <ul class="nav side-menu">

                                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="Dashboard.php">Dashboard</a></li>
                                    </ul>
                                </li>
                                <?php if (isset($_SESSION['superadmin'])) {

                                ?>
                                    <li><a><i class="fa fa-users"></i>Data Admin<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="dataUser.php">List Data Admin</a></li>

                                        </ul>
                                    </li>
                                <?php } ?>

                                <li><a><i class="fa fa-folder-open"></i>Data Permohonan<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="pemohon-non-approve.php">List Permohonan (belum di diterima)</a></li>
                                        <li><a href="pemohon-approve.php">List Permohonan (sudah di diterima)</a></li>

                                    </ul>
                                </li>
                                <li><a><i class="fa fa-tasks"></i> Data Layanan<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="layanan.php">List Layanan</a></li>

                                    </ul>
                                </li>


                            </ul>
                        </div>


                    </div>
                    <!-- /sidebar menu -->


                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <?php
                                // if (isset($_SESSION['id'])) {
                                //     $id_petugas = $_SESSION['id'];
                                //     $query_mysql = mysqli_query($host, "SELECT * FROM user WHERE id_user='$id_petugas'");
                                //     while ($data = mysqli_fetch_array($query_mysql)) {

                                ?>
                                <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <div style="">
                                        <i class="fa fa-user" style="width: 1.2em;font-size:x-large;"></i>
                                        <span class=" fa fa-angle-down"></span>
                                    </div>
                                </a>

                                <?php
                                // }} 
                                ?>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="profile.php?id=<?= $id ?>"> Profile</a></li>


                                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right text-danger"></i> Log Out</a></li>
                                </ul>
                            </li>


                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
            <div class="right_col" role="main">