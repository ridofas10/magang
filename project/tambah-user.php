<?php

include "layout/Sidebar.php";
require 'class/User.php';

$user = new Get;
if (isset($_POST["submit"])) {
    $user->Registrasi();
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
                <h2>Tambah Admin</h2>
                <ul class="nav navbar-right panel_toolbox">

                    ; </li>
                    <!-- 
                <li><a class="close-link"><i class="fa fa-close"></i></a> -->
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">


                <div class="card-body">
                    <form action="" method="post">


                        <div class="form-group">
                            <label for="kepada">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="kepada">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="kepada">Konfirmasi Password </label>
                            <input type="password" class="form-control" id="password2" name="password2">
                        </div>
                        <div class="btn-group">
                            <a href="dataUser.php" class="btn btn-success col-12">Kembali</a>
                            <button name="submit" type="submit" class="btn btn-primary col-12">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>

<?php if (isset($_SESSION['error'])) {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Konfirmasi Password Tidak Sesuai!',
        })
    </script>

<?php
}
unset($_SESSION['error']);

?>
<?php
include "layout/footer.php";
