<?php
require_once('class/layananclass.php');
include "layout/Sidebar.php";
$layananclass = new layananclass;

if (isset($_POST["submit"])) {
    $layananclass->tambahLayanan();
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
                <form id="demo-form2" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="form-group">
                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="first-name">Judul <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                            <input type="text" name="judul" id="judul" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="last-name">Isi <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                            <div style="height:15em;margin-bottom:3em;">
                                <input type="hidden" name="isi" value="">
                                <div id="editor" style="height: 100%;">

                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- gambar -->
                    <div class="form-group">
                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="first-name">Upload Gambar<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                            <input type="file" name="gambar" id="gambar" value="gambar" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group" style="display:flex;justify-content:center;">
                        <label class="" for="first-name">Format Form :
                        </label>

                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Nama Domain <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <input type="checkbox" name="nama_domain" id="nama_domain" value="nama_domain" class="form-control col-md-7 col-xs-12" checked>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Nama Pengelola <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <input type="checkbox" name="nama_pengelola" id="nama_pengelola" value="nama_pengelola" class="form-control col-md-7 col-xs-12" checked>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">NIP <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <input type="checkbox" name="nip" id="nip" value="nip" class="form-control col-md-7 col-xs-12" checked>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Pangkat/Golongan <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <input type="checkbox" name="pangkat_golongan" id="pangkat_golongan" value="pangkat_golongan" class="form-control col-md-7 col-xs-12" checked>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Jabatan <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <input type="checkbox" name="jabatan" id="jabatan" value="jabatan" class="form-control col-md-7 col-xs-12" checked>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">No.Hp(Whatsapp) <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <input type="checkbox" name="no_hp" id="no_hp" value="no_hp" class="form-control col-md-7 col-xs-12" checked>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <input type="checkbox" name="email" id="email" value="email" class="form-control col-md-7 col-xs-12" checked>
                        </div>
                    </div>
                    <br />
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Upload Dokumen Syarat & Ketentuan (pdf)<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                            <input type="file" name="syarat" id="syarat" value="syarat" required="required" class="form-control col-md-7 col-xs-12">
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