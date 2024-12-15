<?php
include "layout/Sidebar.php";
include "class/cetak.php";
include "class/pemohonan.php";
$data = new cetak;
$pemohon = new pemohon;

$get = $data->getCetak();
$getPemohon = $pemohon->getPemohonbyid();



?>

<style>
  .btn-group {
    display: flex;

    justify-content: space-between;
  }
</style>

<div class="col-md-6 col-sm-6 col-xs-6" style="height:300vh;">
  <div class="x_panel">
    <div class="x_title">
      <h2> Atur Isi Dokumen</h2>
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
      <form action="cetak.php" method="post">


        <div class="form-group">
          <label for="kepada">Tanggal Surat</label>
          <input type="date" class="form-control" id="date" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <div class="form-group">
          <label for="kepada">nomor</label>
          <input type="" class="form-control" id="nomor" name="nomor" value="<?= $get['nomor'] ?>">
        </div>

        <div class="form-group">
          <label for="kepada">Narasi Pembuka </label>
          <input class="form-control" name="narasi" id="narasi" value="<?= $get['narasi'] ?>" />

        </div>
        <?php if ($getPemohon['waktu_pengajuan']) { ?>
          <div class="form-group">
            <label for="kepada">tanggal Pengajuan Pemohon</label>
            <input value="<?= $getPemohon['waktu_pengajuan'] ?>" class="form-control" name="waktu-pengajuan">
          </div>
        <?php } ?>
        <?php if ($getPemohon['nama_domain']) { ?>
          <div class="form-group">
            <label for="kepada">Nama Domain </label>
            <input type="text" class="form-control" id="Nama Domain" name="nama-domain" value="<?= $getPemohon['nama_domain']  ?>">
          </div>
        <?php } ?>
        <?php if ($getPemohon['nama_pengelola']) { ?>
          <div class="form-group">
            <label for="kepada">Nama Pengelola Pemohon</label>
            <input type="text" class="form-control" id="Nama Domain" name="nama-pengelola" value="<?= $getPemohon['nama_pengelola'] ?>">
          </div>
        <?php } ?>
        <?php if ($getPemohon['pangkat_golongan']) {  ?>
          <div class="form-group">
            <label for="kepada">Pangkat / Golongan Pemohon</label>
            <input type="text" class="form-control" id="Nama Domain" name="pangkat" value="<?= $getPemohon['pangkat_golongan'] ?>">
          </div>
        <?php } ?>
        <?php if ($getPemohon['nip']) { ?>
          <div class="form-group">
            <label for="kepada">NIP Pemohon</label>
            <input type="text" class="form-control" id="Nama Domain" name="nip" value="<?= $getPemohon['nip'] ?>">
          </div>
        <?php } ?>
        <?php if ($getPemohon['no_hp']) {  ?>
          <div class="form-group">
            <label for="kepada">No Hp. (Whatsapp) Pemohon</label>
            <input type="text" class="form-control" id="Nama Domain" name="hp" value="<?= $getPemohon['no_hp'] ?>">
          </div>
        <?php } ?>
        <?php if ($getPemohon['email']) {  ?>
          <div class="form-group">
            <label for="kepada">Email Pemohon</label>
            <input type="text" class="form-control" id="Nama Domain" name="email" value="<?= $getPemohon['email'] ?>">
          </div>
        <?php } ?>

        <div class="form-group">
          <label for="kepada">Narasi Penutup </label>
          <input class="form-control" name="penutup" id="penutup" value="<?= $get['penutup'] ?>" />

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
          <button name="submit" type="submit" class="btn btn-primary col-12">Cetak</button>
        </div>
      </form>


    </div>
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

<script>
  document.getElementById(`narasi`).value = document.getElementById(`textarea1`).innerHTML;
  document.getElementById(`penutup`).value = document.getElementById(`textarea2`).innerHTML;
</script>`
<?php
include "layout/footer.php";
