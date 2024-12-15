<?php

require_once('class/layananclass.php');
include "layout/Sidebar.php";
$layananclass = new layananclass;
$get = $layananclass->getLayanan();

if (isset($_GET['id'])) {
    $layananclass->hapusLayanan();
}


?>
<style>

</style>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2> Daftar Layanan </h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <a class="btn btn-success" href="tambah-layanan.php">Tambah Layanan</a>

            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                <?php foreach ($get as $data) { ?>
                    <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#<?= $data['id'] ?>" aria-expanded="false" aria-controls="collapseTwo">
                            <h4 class="panel-title"><?= $data['judul'] ?></h4>
                        </a>
                        <div id="<?= $data['id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p><strong><?= $data['judul'] ?></strong>
                                </p>
                                <?= $data['isi'] ?>
                                <div style="display:flex; justify-content:space-between;margin-top:1em;">
                                    <a href="?id=<?= $data['id'] ?>" onclick="return confirm('yakin ingin menghapus layanan ?')" class="btn btn-danger">hapus</a>

                                    <a href="edit-layanan.php?id=<?= $data['id'] ?>" class="btn btn-success">edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>


<?php if (isset($_SESSION['berhasil-edit-layanan'])) {

?>
    <script>
        Swal.fire(
            'Success!',
            'Edit Berhasil!',
            'success'
        )
    </script>

<?php

}
unset($_SESSION['berhasil-edit-layanan']);

?>
<?php
include "layout/footer.php";
?>