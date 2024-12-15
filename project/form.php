<?php
ini_set('display_error', 0);
session_start();
require_once('class/pemohonan.php');
require_once('class/formClass.php');
$pemohon = new pemohon;
$form = new Form;
if (!isset($_GET['id'])) {
	header('location: index.php');
}

$form->getAll();


if (isset($_POST["submit"])) {
	$pemohon->Captcha();
}


$layanan = $form->getLayanan()['judul'];
$get = $form->getForm();
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

?>
<!DOCTYPE html>
<html>

<head>
	<link href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="assets/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
	<title>Form Pendaftaran</title>

	<style>
		body {
			display: flex;
			justify-content: center;
			background-image: url("assets/img/bg.jpg");
			background-size: cover;
			background-position: center;
			background-repeat: repeat;
			font-family: sans-serif;
			align-items: center;


		}

		.container1 {
			/* margin-top: 30em; */
			margin: 1em;
			width: 600px;
			background-color: rgba(255, 255, 255, 0.8);
			backdrop-filter: blur('10px');
			padding: 10px 30px 10px 30px;
			border: 1px solid #ccc;
			border-radius: 40px;
		}

		.container1 h2 {
			text-align: center;
			margin: 0 0 20px 0;
			padding: 0;
			color: #113f67;
		}

		.container1 input {
			width: 100%;

			height: 2.1em;
			border: 1px solid #ccc;
		}

		.container1 select {
			width: 101%;
			padding: 10px;
			margin-bottom: 10px;
			border: 1px solid #ccc;
		}

		.container1 .file-container {
			display: flex;
			justify-content: space-between;
		}

		.container1 .file-nama {
			display: flex;
			justify-content: space-between;
		}

		.container1 button {
			display: block;
			margin: 0 auto;
			width: 200px;
			height: 50px;
			background-color: #4CAF50;
			color: #fff;
			padding: 10px;
			margin-bottom: 10px;
			border: none;
			border-radius: 50px;
			cursor: pointer;
		}

		tr td:nth-child(1) {
			width: 150px;
		}

		table {
			margin-top: 10px;
		}

		.agree {
			display: flex;
			max-width: 400px;
			align-items: center;
			height: 20px;
		}

		input {

			width: 1em;
			vertical-align: middle;
		}
	</style>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.css">
	<script src="assets/sweetalert2/dist/sweetalert2.js"></script>

	<script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body>
	<div class="container1">
		<img src="assets/img/kominfo.png" height="130px" style="display:block; margin:0 auto;">
		<br>

		<h2>Form Pengajuan Layanan <?= $layanan ?> </h2>
		<form action="" method="post" enctype="multipart/form-data">
			<i style=" color:grey;"><b>BACA SYARAT & KETENTUAN <a href="download.php?file=<?= $get['syarat_ketentuan'] ?>">DISINI</a></b></i>
			<table width="100%">
				<?php if ($get['nama_domain']) { ?>
					<tr>
						<td height="40"><b>Nama Domain</b></td>
						<td><input required type="text" name="nama_domain" placeholder="Domain" /></td>
					</tr>
				<?php } ?>
				<?php if ($get['nama_pengelola']) { ?>
					<tr>
						<td height="40"><b>Nama Pengelola</b></td>
						<td><input required type="text" name="pengelola" placeholder="Nama Lengkap Pengelola"></td>
					</tr>
				<?php } ?>
				<?php if ($get['nip']) { ?>
					<tr>
						<td height="40"><b>NIP</b></td>
						<td><input required type="text" name="nip" placeholder="NIP"></td>
					</tr>
				<?php } ?>
				<?php if ($get['pangkat_golongan']) { ?>
					<tr>
						<td height="40"><b>Pangkat/Golongan</b></td>
						<td><input required type="text" name="pangkat" placeholder="Pangkat atau Golongan"></td>
					</tr>
				<?php } ?>
				<?php if ($get['no_hp']) {   ?>
					<tr>
						<td height="40"><b>No.Hp (Whatsapp)</b></td>
						<td><input required type="number" name="wa" placeholder="Nomor yang dihubungi harus Aktif"></td>
					</tr>
				<?php } ?>
				<?php if ($get['email']) {    ?>
					<tr>
						<td height="40"><b>Email</b></td>
						<td><input required type="email" name="email" placeholder="Email" /></td>
					</tr>
				<?php } ?>
				<?php if ($get['jabatan']) {    ?>
					<tr>
						<td height="40"><b>Jabatan</b></td>
						<td><input required type="text" name="jabatan" placeholder="Jabatan"></td>
					</tr>
				<?php  } ?>
				<tr>
					<td height="40"><b>Jenis Layanan</b></td>
					<td>
						<b><input required value="<?= $layanan ?>" name="layanan" readonly /></b>
					</td>
				</tr>
				<tr>
					<td height="40"><b>Keterangan</b></td>
					<td>
					
						<b><textarea  name="keterangan" style="width:100%" ></textarea></b>
						
					</td>
				</tr>

				<tr>
					<td height="70" style="width: 200px;"><b>Dokumen kartu atau KTP ASN/Non ASN <span style="color: red;font-size:small;">(pdf)</span></b></td>
					<td><input required type="file" name="file1" placeholder="Upload Dokumen"></td>
				</tr>
				<tr>
					<td height="70"><b>Dokumen Surat Penugasan PIC <span style="color: red;font-size:small;">(pdf)</span></b></td>
					<td><input required type="file" name="file2" placeholder="Upload Pendukung"></td>
				</tr>
				<tr>
					<td height="70">
						<b>Dokumen Surat Permohonan Pengajuan Layanan <span style="color: red;font-size:small;">(pdf)</span></b>
						<span id="dokumen" style="color: red;cursor: pointer;font-size:small;" data-bs-toggle="modal" data-bs-target="#exampleModal">(Lihat contoh Dokumen)</span>
					</td>
					<td><input required type="file" name="file3" placeholder="Upload Pendukung"></td>
				</tr>

				<tr>
					<td height="70"><b>Dokumen Kontrak Pengunaan Layanan <span style="color: red;font-size:small;">(pdf)</span></b></td>
					<td><input required type="file" name="file4" placeholder="Upload Pendukung"></td>
				</tr>


			</table>
			<div class="agree">
				<input name="waktu_pengajuan" type="hidden" value="<?= Tgl_indo(date('Y-m-d'))  ?>" />
				<input id="checkbox" type="checkbox" style="width: 25px;" name="checkbox" value="1" />

				<label for="checkbox"> &nbsp; Saya menyetujui <a href="download.php?file=<?= $get['syarat_ketentuan'] ?>">Syarat dan Ketentuan ini</a>.</label>
			</div>
			<div class="g-recaptcha" style="margin-top: 1em;" data-sitekey="6LcBFHgkAAAAAJzyvAYHuO7prPM_zWjyauf18gt1"></div><br>


			<button type="submit" style="margin-top: 10px;" name="submit">Submit</button>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Contoh Dokumen</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<img style="width: 100%;" src="assets/img/contoh-surat-pengajuan1.JPG" />
					<hr />Dokumen lain
					<hr />
					<img style="width: 100%;" src="assets/img/contoh-surat-pengajuan2.JPG" />
					<hr />Dokumen lain
					<!-- <hr />
					<img style="width: 100%;" src=https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgUDhXDKZtqd-d9OqFBiG5N_VGZiA6806isGcE9wK0alBdXuHZev82it7ZeC-Ws-yGV9v_f53VlWtL_wojKWgklRvggmiPkmnhb-df2Jpq3LGgKUVkukwBLhU-9tB187GTMsBL0vDikQTeZqxKauVRq6cp8zlRE8XHpv4_bOUss-IGuLsYgxMAvKMuI/s701/cop3.PNG> -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>
	<?php if (isset($_SESSION['error'])) {
	?>
		<script>
			Swal.fire({
				icon: 'error',
				title: 'Maaf',
				text: 'Silahkan menyetujui Syarat & Ketentuan untuk melanjutkan',
			})
		</script>
	<?php unset($_SESSION['error']);
	} ?>
	<?php if (isset($_SESSION['error2']) == 1) { ?>
		<script>
			Swal.fire({
				title: 'Belum Verifikasi Captcha',
				showClass: {
					popup: 'animate__animated animate__fadeInDown'
				},
				hideClass: {
					popup: 'animate__animated animate__fadeOutUp'
				}
			})
		</script>

	<?php
		session_unset();
		session_destroy();
	}  ?>

	
</body>

</html>