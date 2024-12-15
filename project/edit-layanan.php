<?php
require_once('class/layananclass.php');
include "layout/Sidebar.php";
$layananclass = new layananclass;
$get = $layananclass->getLayananbyid();
if (isset($_POST["submit"])) {
    $layananclass->editLayanan();
}
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
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
                <form id="demo-form2" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="first-name">judul<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                            <input type="text" name="judul" id="judul" value="<?= $get['judul'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">ISI<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                            <div style="height:15em;margin-bottom:3em;">
                                <input type="hidden" name="isi" value="">
                                <div id="editor" style="height: 100%;">
                                    <?= $get['isi'] ?>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- gambar -->
                    <div class="form-group">
                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="first-name">Ganti Gambar<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                            <img src="assets/upload/img/<?= $get['gambar'] ?>" width="150px" />
                            <input name="gambarLama" id="gambar" class="form-control col-md-7 col-xs-12" value="<?= $get['gambar'] ?>" type="hidden">
                            <input type="file" name="gambar" id="gambar" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div style="display: flex;justify-content:space-around;">
                            <a href="layanan.php" class="btn btn-primary">Cancel</a>

                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
</div>
<?php include "layout/footer.php" ?>