<?php
ini_set('display_errors', 0);
require('class/layananclass.php');

$tampil = new layananclass();

$tampil2 = $tampil->getLayanan();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="assets/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.css">
  <script src="assets/sweetalert2/dist/sweetalert2.js"></script>
  <!-- <link rel="stylesheet" href="style.css">    -->
  <title>LAYANAN PUSAT DATA</title>
  <style>
    /* Index Halaman */

    * {
      font-family: sans-serif;
      color: #003399
    }

    body {

      background-image: url('assets/img/bg.jpg');
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      background-size: cover;
      background-position: center;
      margin: 0em;
    }

    nav {
      text-align: center;



    }

    main {
      margin-top: 2em;
      margin-bottom: 2em;
      height: 100%;
      width: 900px;
      display: inline-flex;
      flex-wrap: wrap;
      gap: 5em;
      justify-content: center;

      align-items: center;
      padding: 2em;


    }

    .circle>h2 {
      font-size: 1.2em;
      font-weight: 800;
      color: #003399;
      top: 10.9em;
      -webkit-text-stroke: .9px;
      -webkit-text-fill-color: white;
      position: absolute;

    }

    .circle {
      position: relative;
      width: 200px;
      height: 200px;
      border-radius: 50%;
      box-shadow: 1px 1px 3px rgb(88, 87, 87);
      display: flex;
      justify-content: center;
      flex-direction: column;
      align-items: center;
      background-color: rgba(255, 255, 255, 0.9);
      text-align: center;
    }

    img {
      width: 180px;
      height: 180px;
      transition: 1s;
      transition-delay: 0.2s;
    }

    span {
      position: absolute;
      z-index: -1;
      width: 100%;
      height: 100%;
      border-radius: 50%;
      background-color: rgba(255, 255, 255, 0.9);
      scale: 0;
      transition: 1s;
    }

    .circle:hover>span {
      scale: 1;
    }

    .circle:hover>img {
      scale: 1.3;
    }

    .satu,
    .enam,
    .sebelas,
    .enambelas {
      background-color: rgba(255, 255, 255, 0.4);
    }

    .dua,
    .tujuh,
    .duabelas,
    .tujuhbelas {
      background-color: rgba(55, 255, 255, 0.4);
    }

    .tiga,
    .delapan,
    .tigabelas,
    .delapanbelas {
      background-color: rgba(255, 55, 255, 0.4);
    }

    .empat,
    .sembilan,
    .empatbelas,
    .sembilanbelas {
      background-color: rgba(255, 255, 55, 0.4);
    }

    .lima,
    .sepuluh,
    .limabelas,
    .duapuluh {
      background-color: rgba(255, 55, 55, 0.4);
    }

    .modal-content {
      background-color: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(5px);
    }

    /* .fade {
      background-color: rgba(black, black, black, 0.2);
      backdrop-filter: blur(5px);
    } */

    h1 {
      font-size: 2em;
      font-weight: 900;
      margin-top: 0.5em;

      color: white;
      -webkit-text-stroke: .6px;
      -webkit-text-fill-color: #2247A0;
    }

    h5 {
      margin-top: 1em;
    }
  </style>
</head>

<body>


  <nav>
    <h1>SISTEM INFORMASI LAYANAN PUSAT DATA</h1>
    <h1>DINAS KOMUNIKASI DAN INFORMATIKA KABUPATEN KEDIRI</h1>

    <h5>Jl. Sekartaji No 2 Doko Kab. Kediri Telepon (0354) 682152 Fax. (0354) 692279 </h5>
  </nav>

  <main>
    <?php
    $arr = ["satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas", "duabelas", "tigabelas", "empatbelas", "limabelas", "tujuhbelas", "delapanbelas", "sembilanbelas", "duapuluh"];

    foreach ($tampil2 as $data) { ?>
      <div class="circle <?= $arr[$data['id']] ?>" data-bs-toggle="modal" data-bs-target="#<?= $arr[$data['id']] ?>">
        <img src="assets/upload/img/<?= $data['gambar'] ?>">
        <span></span>
        <h2><?= $data['judul'] ?></h2>

      </div>
      <!-- Modal -->
      <div class="modal fade" id="<?= $arr[$data['id']] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel"><?= $data['judul'] ?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <?= $data['isi'] ?>
            </div>
            <div class="modal-footer" style="display: flex;justify-content:space-between;">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>



              <input name="id" type="hidden" />
              <a type="submit" class="btn btn-success" href="form?id=<?= $data['id'] ?>">Form Pengajuan</a>

            </div>
          </div>
        </div>
      </div>
    <?php } ?>

  </main>


</body>

</html>