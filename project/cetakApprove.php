<?php
require 'class/pemohonan.php';

$tabel = new pemohon();
$data = $tabel->getPemohonapprove();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemohon</title>
    <style>
    td {
        text-align: center;
    }

    * {
        text-align: center;
    }

    .garis1 {
        margin-top: -6em;
        border-top: 3px solid black;
        height: 2px;
        border-bottom: 1px solid black;
    }


    .judul {
        text-align: center;

    }

    h3 {
        /* line-height: -.4em; */


    }

    body {}

    img {
        width: 110px;
        height: 110px;
        float: left;
        margin-right: 2px;
    }

    h3 {
        margin-top: -0px;
    }

    h5 {
        margin-top: -0px;
    }

    table {
        margin-top: -11em;
    }

    tr:nth-child(even) {
        background-color: #ddd;
    }
    </style>
</head>

<body>
    <nav>
        <img src="assets/img/logo.png" />
        <div class=" judul">
            <h4>PEMERINTAH KABUPATEN KEDIRI <h3>DINAS KOMUNIKASI DAN INFORMASI KABUPATEN KEDIRI
                    <h5>Jl. Sekartaji No.2 Doko Kab. Kediri Telp.(0354) 682152 Fax. (0354) 692279<h5>Website :
                            www.kedirikab.go.id – subdomain : www.diskominfo.kedirikab.go.id<h3>Email :
                                diskominfo@kedirikab.go.id <h3>K E D I R I</h3>
                            </h3>
                        </h5>
                    </h5>

                </h3>
            </h4>





        </div>
    </nav>
    <hr class="garis1" />

    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Tanggal Pengajuan</th>
            <th>Nama Domain</th>
            <th>Nama Pengelola</th>

            <th>NIP</th>

            <th>Pangkat / Golongan</th>
            <th>Jabatan</th>
            <th>Email</th>
            <th>No. Hp</th>
            <th>Jenis Layanan</th>

        </tr>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data as $row) : ?>
            <tr>
                <td><?= $i++ ?></td>
                <td>
                    <?php if ($row['waktu_pengajuan']) {
                            echo $row['waktu_pengajuan'];
                        } ?>
                </td>
                <td><?php if ($row['nama_domain']) {
                            echo $row['nama_domain'];
                        } else {
                            echo '-';
                        } ?></td>
                <td><?php if ($row['nama_pengelola']) {
                            echo $row['nama_pengelola'];
                        } else {
                            echo '-';
                        } ?></td>
                <td><?php if ($row['nip']) {
                            echo $row['nip'];
                        } else {
                            echo '-';
                        } ?></td>
                <td><?php if ($row['pangkat_golongan']) {
                            echo $row['pangkat_golongan'];
                        } else {
                            echo '-';
                        } ?></td>
                <td><?php if ($row['jabatan']) {
                            echo $row['jabatan'];
                        } else {
                            echo '-';
                        } ?></td>
                <td><?php if ($row['email']) {
                            echo $row['email'];
                        } else {
                            echo '-';
                        } ?></td>
                <td><?php if ($row['no_hp']) {
                            echo $row['no_hp'];
                        } else {
                            echo '-';
                        } ?></td>
                <td><?php if ($row['jenis_layanan']) {
                            echo $row['jenis_layanan'];
                        } else {
                            echo '-';
                        } ?></td>
            </tr>

            <?php endforeach; ?>
        </tbody>

    </table>
</body>

</html>