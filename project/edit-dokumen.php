<?php
include "layout/Sidebar.php";
include "class/cetak.php";
$data = new cetak;
if (isset($_POST['submit'])) {
  $data->updateCetak();
}

$get = $data->getCetak();

$id = $_GET['id'];
?>

<style>
  .btn-group {
    display: flex;

    justify-content: space-between;
  }
</style>

<div class="col-md-6 col-sm-6 col-xs-6" style="height:150vh;">
  <div class="x_panel">
    <div class="x_title">
      <h2> Atur Format Dokumen</h2>
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


      <form method="post">



    </div>

    <div class="form-group">
      <label for="kepada">nomor</label>
      <input type="" class="form-control" id="nomor" name="nomor" value="<?= $get['nomor'] ?>">
    </div>
    <div class="form-group">
      <label for="kepada">Narasi Pembuka </label>
      <input class="form-control" name="narasi" value="<?= $get['narasi'] ?>">
      <!-- <div id="editor1" style="height: 10em;"> -->

    </div>




    <div class="form-group">
      <label for="kepada">Narasi Penutup </label>
      <input name="penutup" class="form-control" id="penutup" value="<?= $get['penutup'] ?>" />

    </div>
    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">

      <div class="panel">
        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#satu" aria-expanded="false" aria-controls="collapseTwo">
          <h4 class="panel-title">Tambah TTD</h4>
        </a>
        <div id="satu" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
          <div class="panel-body">
            <div class="form-group">
              <label for="kepada">Nama Kepala Dinas</label>
              <input type="text" class="form-control" id="Nama Domain" name="kepala-dinas" value="<?= $get['kepala_dinas'] ?>">
            </div>
            <div class="form-group">
              <label for="kepada">NIP Kepala Dinas</label>
              <input type="text" class="form-control" id="Nama Domain" name="nip-kepala-dinas" value="<?= $get['nip_kepala_dinas'] ?>">
            </div>

          </div>
        </div>
      </div>
    </div>




    <div class="btn-group">
      <a href="pemohon-approve.php" class="btn btn-success col-12">Kembali</a>
      <button name="submit" type="submit" class="btn btn-primary col-12">Simpan & Lanjutkan</button>
    </div>
    </form>


  </div>
</div>


<div class="col-md-6 col-sm-6 col-xs-6">
  <div class="x_panel">
    <div class="x_title">
      <h2> Contoh cetak</h2>
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

      <img src="assets/img/contoh.JPG" style="width: 100%;" />
    </div>
  </div>

</div>
</div>
<script>
  document.getElementById(`narasi`).value = document.getElementById(`textarea1`).innerHTML;
  document.getElementById(`penutup`).value = document.getElementById(`textarea2`).innerHTML;
</script>`
<?php
include "layout/footer.php";
