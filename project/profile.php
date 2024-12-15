<?php
include "layout/Sidebar.php";
require 'class/User.php';

$user = new Get;

if (isset($_GET['id'])) {
    $get = $user->getUser();
}

?>

<style>
    .card {

        display: flex;
        margin-left: 30%;
        flex-direction: column;
        align-items: center;
    }

    .btn-group {
        display: flex;

        justify-content: space-between;
    }
</style>

<div class="right_col" role="main">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="x_panel">
            <div class="x_title">
                <h2> Profile Saya</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <!-- 
                <li><a class="close-link"><i class="fa fa-close"></i></a> -->
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">


                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">


                        <div class="form-group">
                            <label for="kepada">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $get['username'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="kepada">Password</label>
                            <input type="password" value="<?= $get['username'] ?>" class="form-control" id="password" name="password" readonly>
                        </div>
                        <div class="btn-group">
                            <a href="Dashboard.php" class="btn btn-success col-12">Kembali</a>
                            <a href="edit-User.php?id=<?= $id ?>" name="submit" type="submit" class="btn btn-primary col-12">Edit</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>


<?php
include "layout/footer.php";
