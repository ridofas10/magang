<?php
ini_set('display_errors', 0);
// $kop1 = $_POST['kop1'];
// $kop2 = $_POST['kop2'];
// $kop3 = $_POST['kop3'];
$nomor = $_POST['nomor'];
$narasi = $_POST['narasi'];
$waktu_pengajuan = $_POST['waktu-pengajuan'];
$nama_pengelola = $_POST['nama-pengelola'];
$nama_domain = $_POST['nama-domain'];
$pangkat = $_POST['pangkat'];
$nip = $_POST['nip'];
$hp = $_POST['hp'];
$email = $_POST['email'];
$penutup = $_POST['penutup'];
$kepala_dinas = $_POST['kepala-dinas'];
$nip_kepala = $_POST['nip-kepala-dinas'];
$tanggal_pengajuan = $_POST['tanggal-pengajuan'];
$tgl = $_POST['tanggal'];

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

// 21 Oktober 2017
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Surat</title>
    <!-- <link href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" /> -->
</head>

<style>
    /* body {
        margin-left: 15em;
        margin-right: 15em;
    } */

    * {
        font-weight: bolder;
    }

    .row-1 {
        margin-top: -20px;
    }

    .nama-dinas {

        font-size: 2vw;
        margin-bottom: -.5em;
    }

    .kablogo {
        font-size: 2vw;
    }

    .alamatlogo {
        font-size: 1.5vw;
    }

    .kodeposlogo {
        font-size: 1.7vw;
    }


    #tls {
        text-align: right;
    }



    .alamat-tujuan {
        margin-right: 15px;
    }

    .garis1 {
        /* margin-top: -2.5em; */
        border-top: 3px solid black;
        height: 2px;
        border-bottom: 1px solid black;
    }

    #logo-left {
        margin: auto;
        margin-left: 50%;
        margin-right: auto;
    }

    #logo-right {
        margin: auto;
        margin-left: auto;
        margin-right: 50%;
    }

    #tempat-tgl {
        margin-left: 120px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    #camat {
        text-align: right;
    }

    #nama-camat {
        margin-top: 100px;
        text-align: center;
    }

    tr td:nth-child(1) {
        width: 10em;
    }

    #lampiran {
        margin-bottom: 1em;
    }

    #pembuka {
        text-align: justify;
        text-indent: 0.5in;
    }


    img {
        width: 110px;
        height: 110px;
        float: left;
        margin-right: 2px;
    }

    .judul {
        text-align: center;

    }

    h3,
    h4,
    h5 {
        margin-top: -0px;

    }



    .container1 {
        margin-top: -6em;
    }

    nav {
        border: 1px solid black;
    }
</style>

<body>
    <div>
        <header>


            <img src="assets/img/logo.png" />
            <div class=" judul ">

                <h4>PEMERINTAH KABUPATEN KEDIRI <h3>DINAS KOMUNIKASI DAN INFORMASI KABUPATEN KEDIRI
                        <h5>Jl. Sekartaji No.2 Doko Kab. Kediri Telp.(0354) 682152 Fax. (0354) 692279<h5>Website : www.kedirikab.go.id – subdomain : www.diskominfo.kedirikab.go.id<h4>Email : diskominfo@kedirikab.go.id <h3>K E D I R I</h3>
                                </h4>
                            </h5>
                        </h5>

                    </h3>
                </h4>

            </div>




        </header>

        <div class="container1" style="">
            <hr class="garis1" />
            <div id="alamat" class="row-1">
                <p id="tls">Kediri, <?= tgl_indo($tgl); ?></p>
                <div id="lampiran" class="col-md-6 mb-2">

                    <?php if ($nomor) {
                        echo " nomor : " . $nomor;
                    } ?>

                </div>

            </div>
            <div id="pembuka" class="row">
                &emsp; &emsp; &emsp; <?= $narasi ?>
            </div>
            <div id="tempat-tgl">
                <table>
                    <?php if ($nama_domain) { ?>
                        <tr>
                            <td>Nama Domain</td>
                            <td>:</td>
                            <td><?= $nama_domain ?> </td>
                        </tr>
                    <?php } ?>
                    <?php if ($nama_pengelola) { ?>
                        <tr>
                            <td>Nama Pengelola</td>
                            <td>:</td>
                            <td><?= $nama_pengelola ?> </td>
                        </tr>
                    <?php } ?>
                    <?php if ($waktu_pengajuan) { ?>
                        <tr>
                            <td>Tanggal Pengajuan</td>
                            <td>:</td>
                            <td><?= $waktu_pengajuan ?> </td>
                        </tr>
                    <?php } ?>

                    <?php if ($pangkat) { ?>
                        <tr>
                            <td>Pangkat / Golongan</td>
                            <td>:</td>
                            <td><?= $pangkat ?> </td>
                        </tr>
                    <?php } ?>
                    <?php if ($nip) { ?>
                        <tr>
                            <td>NIP</td>
                            <td>:</td>
                            <td><?= $nip ?> </td>
                        </tr>
                    <?php } ?>
                    <?php if ($hp) { ?>
                        <tr>
                            <td>NO Hp. (Whataspp)</td>
                            <td>:</td>
                            <td><?= $hp ?> </td>
                        </tr>
                    <?php } ?>
                    <?php if ($email) { ?>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?= $email ?> </td>
                        </tr>
                    <?php } ?>

                </table>
            </div>
            <div id="penutup" style="text-align:left"><?= $penutup ?></div>

            <?php if ($kepala_dinas) { ?>
                <div style="text-align:right;">
                    <div class=" " style="text-align: right;margin-top:5em;">
                        <div id="camat"><strong>KEPALA DINAS &nbsp; &nbsp; &nbsp;</strong></div>
                    </div>

                    <div id="nama-camat" style="text-align: right;">
                        <strong><u><?= $kepala_dinas ?> &nbsp;</u></strong><br />
                        &nbsp; &nbsp;
                        NIP. <?= $nip_kepala ?> &nbsp; &nbsp;
                    </div>
                </div>
            <?php } ?>


        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>