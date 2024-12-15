<?php
require_once('class/pemohonan.php');
include "layout/Sidebar.php";
$pemohon = new pemohon;
$get = $pemohon->getPemohonbyid();
if (isset($_POST["submit"])) {
    $pemohon->editPermohonan();
}
?>


<style>
    .btn-group {
        display: flex;

        justify-content: space-between;
    }
</style>
<div class="right_col" role="main">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Layanan </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <br />
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="foto_lama" value="">
                    <?php if (isset($get['nama_domain'])) { ?>
                        <div class="form-group">
                            <label for="instansi">Nama Domain</label>
                            <input type="text" class="form-control" id="nama" name="nama_domain" value="<?= $get["nama_domain"] ?>">
                        </div>
                    <?php } ?>
                    <?php if (isset($get['nama_pengelola'])) { ?>
                        <div class="form-group">
                            <label for="instansi">Nama Pengelola</label>
                            <input type="text" class="form-control" id="nama" name="nama_pengelola" value="<?= $get["nama_pengelola"] ?>">
                        </div>
                    <?php } ?>
                    <?php if (isset($get['nip'])) { ?>
                        <div class="form-group">
                            <label for="kepada">NIP</label>
                            <input type="text" class="form-control" name="nip" value="<?= $get["nip"] ?>">
                        </div>
                    <?php } ?>
                    <?php if (isset($get['pangkat_golongan'])) { ?>
                        <div class="form-group">
                            <label for="kepada">Pangkat / Golongan</label>
                            <input type="text" class="form-control" name="pangkat" value="<?= $get["pangkat_golongan"] ?>">
                        </div>
                    <?php } ?>
                    <?php if (isset($get['jabatan'])) { ?>
                        <div class="form-group">
                            <label for="kepada">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" value="<?= $get["jabatan"] ?>">
                        </div>
                    <?php } ?>
                    <?php if (isset($get['email'])) { ?>
                        <div class="form-group">
                            <label for="kepada">Email</label>
                            <input type="text" class="form-control" name="email" value="<?= $get["email"] ?>">
                        </div>
                    <?php } ?>
                    <?php if (isset($get['no_hp'])) { ?>
                        <div class="form-group">
                            <label for="kepada">No Hp</label>
                            <input type="text" class="form-control" id="hp" name="no_hp" value="<?= $get["no_hp"] ?>">
                        </div>
                    <?php }  ?>
                    <?php if (isset($get['jenis_layanan'])) { ?>
                        <div class="form-group">
                            <label for="kepada">Jenis Layanan</label>
                            <input type="text" class="form-control" id="hp" name="layanan" value="<?= $get["jenis_layanan"] ?>">
                        </div>
                    <?php }  ?>

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
<?php include "layout/footer.php" ?>