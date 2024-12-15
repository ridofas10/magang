<?php
include "layout/Sidebar.php";
include "class/User.php";
$user = new Get;


if (isset($_GET['id'])) {
    $get = $user->getUser();
}

if (isset($_POST['submit'])) {
    $user->Ubah();
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
                            <input type="hidden" class="form-control" name="id" value="<?= $get['id'] ?>">
                            <input type="text" class="form-control" id="username" name="username" value="<?= $get['username'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="kepada">Password</label>
                            <input type="password" value="<?= $get['password'] ?>" class="form-control" name="passwordLama">
                        </div>
                        <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">

                            <div class="panel">
                                <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#satu" aria-expanded="false" aria-controls="collapseTwo">
                                    <h4 class="panel-title">Ganti Password</h4>
                                </a>
                                <div id="satu" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="kepada">Password Baru</label>
                                            <input type="text" class="form-control" id="password" name="password">
                                        </div>

                                        <div class="form-group">
                                            <label for="kepada">Konfirmasi Password Baru</label>
                                            <input type="text" class="form-control" id="konfirmasiPass" name="konfirmasiPass">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="btn-group">
                            <a href="Dashboard.php" class="btn btn-success col-12">Kembali</a>
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
