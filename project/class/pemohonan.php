<?php
require('class/config.php');
class pemohon
{
	public $conn;
	public function __construct()
	{


		try {
			$conn = new PDO('mysql:host=' . $_ENV['host'] . ';dbname=' . $_ENV['dbname'], $_ENV['username'], $_ENV['password']);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->conn = $conn;
		} catch (PDOException $e) {
			// tampilkan pesan kesalahan jika koneksi gagal
			print "Koneksi atau query bermasalah : " . $e->getMessage() . "<br/>";
			die();
		}
	}

	public function getPemohon()
	{
		$sql = "SELECT * FROM tb_permohonan ORDER BY id DESC";
		$row = $this->conn->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	public function getPemohonbyid()
	{
		$id = $_GET["id"];
		$sql = "SELECT * FROM tb_permohonan WHERE id=?";
		$row = $this->conn->prepare($sql);
		$row->execute(array($id));
		$hasil = $row->fetch();
		return $hasil;
	}

	public function editPermohonan()
	{
		$id = $_GET['id'];
		$nama = $_POST['nama_domain'];
		$pengelola = $_POST['nama_pengelola'];
		$nip = $_POST['nip'];
		$pangkat = $_POST['pangkat'];
		$no_hp = $_POST['no_hp'];
		$email = $_POST['email'];
		$jabatan = $_POST['jabatan'];
		$layanan = $_POST['layanan'];

		$data[] = $nama;
		$data[] = $pengelola;
		$data[] = $nip;
		$data[] = $pangkat;
		$data[] = $email;
		$data[] = $no_hp;
		$data[] = $layanan;
		$data[] = $jabatan;
		$data[] = $id;

		$cek = $this->conn->prepare("SELECT status FROM tb_permohonan WHERE id = :id");
		$cek->bindParam(':id', $id);
		$cek->execute();
		$cekStatus = $cek->fetch()['status'];

		// simpan data barang
		$sql = 'UPDATE tb_permohonan SET nama_domain=?,nama_pengelola=?,nip=?,pangkat_golongan=?,email=?,no_hp=?,jenis_layanan=?,jabatan=? WHERE id=?';
		$row = $this->conn->prepare($sql);
		$row->execute($data);
		// redirect
		if ($cekStatus == 0) {
			$_SESSION['ubah-berhasil'] = 1;
			echo '<script>window.location="pemohon-non-approve.php"</script>';
		} else {
			$_SESSION['ubah-berhasil-approve'] = 1;
			echo '<script>window.location="pemohon-approve.php"</script>';
		}
	}
	public function getPemohonnonapprove()
	{

		$sql = "SELECT *FROM tb_permohonan WHERE status=0 ORDER BY id DESC";
		$row = $this->conn->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	public function getPemohonapprove()
	{

		$sql = "SELECT *FROM tb_permohonan WHERE status=1 ORDER BY id DESC";
		$row = $this->conn->prepare($sql);
		$row->execute();
		$hasil = $row->fetchAll();
		return $hasil;
	}

	public function terima()
	{
		$id = $_GET['status'];
		$status = 1;


		$data[] = $status;
		$data[] = $id;
		// simpan data barang
		$sql = 'UPDATE tb_permohonan SET status=? WHERE id=?';
		$row = $this->conn->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="pemohon-non-approve.php"</script>';
	}
	public function tidakTerima()
	{
		$id = $_GET['status'];
		$status = 0;
		$data[] = $status;
		$data[] = $id;
		// simpan data barang
		$sql = 'UPDATE tb_permohonan SET status=? WHERE id=?';
		$row = $this->conn->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="pemohon-approve.php"</script>';
	}


	public function hapusGambar()
	{
		$id = $_GET['id'];
		$cek = $this->conn->prepare("SELECT * FROM tb_permohonan
        WHERE id = :id");
		$cek->bindParam(':id', $id);
		$cek->execute();
		$data = $cek->fetch();
		for ($i = 10; $i <= 13; $i++) {
			unlink('assets/upload/dokumen/' . $data[$i]);
		}
	}

	function cek($id)
	{

		$cek = $this->conn->prepare("SELECT * FROM tb_permohonan
        WHERE id = :id");
		$cek->bindParam(':id', $id);
		$cek->execute();
		$data = $cek->fetch()['status'];
		return $data;
	}
	public function hapusPemohon()
	{
		// untuk Hapus data Pemohon berdasarkan id
		$id = $_GET['id'];
		$cekStatus = $this->cek($id);
		$this->hapusGambar();


		$sql = "DELETE FROM tb_permohonan WHERE id= ?";
		$row = $this->conn->prepare($sql);
		$row->execute(array($id));
		if ($cekStatus == 0) {

			echo '<script>alert("hapus berhasil");window.location="pemohon-non-approve.php"</script>';
		} else {
			$_SESSION['hapus-berhasil'] = 1;
			echo '<script>alert("hapus berhasil");window.location="pemohon-approve.php"</script>';
		}
	}
	public function tambahPemohon()
	{

		if (!isset($_POST['checkbox'])) {

			$_SESSION['error'] = 1;
			return false;
		}
		if (isset($_POST['nama_domain'])) {
			$nama = $_POST['nama_domain'];
		} else {
			$nama = null;
		}
		if (isset($_POST['pengelola'])) {
			$pengelola = $_POST['pengelola'];
		} else {
			$pengelola = null;
		}
		if (isset($_POST['nip'])) {
			$nip = $_POST['nip'];
		} else {
			$nip = null;
		}
		if (isset($_POST['pangkat'])) {
			$pangkat = $_POST['pangkat'];
		} else {
			$pangkat = null;
		}
		if (isset($_POST['wa'])) {
			$wa = $_POST['wa'];
		} else {
			$wa = null;
		}
		if (isset($_POST['email'])) {
			$email = $_POST['email'];
		} else {
			$email = null;
		}
		if (isset($_POST['jabatan'])) {
			$jabatan = $_POST['jabatan'];
		} else {
			$jabatan = null;
		}
		if (isset($_POST['keterangan'])) {
			$keterangan = $_POST['keterangan'];
		} else {
			$keterangan = null;
		}

		$waktu_pengajuan = $_POST['waktu_pengajuan'];

		$layanan = $_POST['layanan'];



		$cek1 = $this->upload1();
		if (!$cek1) {
			$file1 = $this->upload1();
			exit;
		} else {
			$file1 = $this->upload1();
		}
		$cek2 = $this->upload2();
		if (!$cek2) {
			$file1 = $this->upload2();
			exit;
		} else {
			$file2 = $this->upload2();
		}
		$cek3 = $this->upload3();
		if (!$cek3) {
			$file3 = $this->upload3();
			exit;
		} else {
			$file3 = $this->upload3();
		}
		$cek4 = $this->upload4();
		if (!$cek4) {
			$file4 = $this->upload4();
			exit;
		} else {
			$file4 = $this->upload4();
		}

		$data[] = $waktu_pengajuan;
		$data[] = $nama;
		$data[] = $pengelola;
		$data[] = $nip;
		$data[] = $pangkat;
		$data[] = $wa;
		$data[] = $email;
		$data[] = $jabatan;
		$data[] = $layanan;
		$data[] = $keterangan;
		$data[] = $file1;
		$data[] = $file2;
		$data[] = $file3;
		$data[] = $file4;

		// simpan data

		$sql = "INSERT INTO tb_permohonan (waktu_pengajuan,nama_domain,nama_pengelola,nip,pangkat_golongan,no_hp,email,jabatan,jenis_layanan,keterangan,dokumen_ASN_KTP,dokumen_surat_pic,dokumen_surat_pengajuan,dokumen_kontrak) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$row = $this->conn->prepare($sql);
		$row->execute($data);

		// redirect
		echo '<script>window.location="konfirmasi"</script>';
	}
	public function upload1()
	{
		$namaFile = $_FILES['file1']['name'];
		$ukuranFile = $_FILES['file1']['size'];
		$error = $_FILES['file1']['error'];
		$tmpName = $_FILES['file1']['tmp_name'];

		// cek apakah tidak ada gambar yang di upload
		if ($error === 4) {
			echo "<script>
                    alert('pilih dokumen pdf terlebih dahulu!');
                    </script>";
			return false;
		}

		// cek apakah yang diupload adalah dokumen pdf
		$ekstensiGambarValid = ['pdf'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		$_SESSION['cek'] = $ekstensiGambar;
		if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
			echo "<script>
                    alert('yang anda upload bukan dokumen pdf!');
                    </script>";
			return false;
		}


		// cek jika ukurannya terlalu besar
		if ($ukuranFile > 5000000) {
			echo "<script>
                    alert('ukuran dokumen terlalu besar!');
                    </script>";
			return false;
		}


		// lolos pengecekan, gambar siap diupload
		// Generate nama gambar baru
		$namaFileBaru = 'dok1' . '_' . time()  . '.' . $ekstensiGambar;

		move_uploaded_file($tmpName, 'assets/upload/dokumen/' . $namaFileBaru);

		return $namaFileBaru;
	}
	public function upload2()
	{
		$namaFile = $_FILES['file2']['name'];
		$ukuranFile = $_FILES['file2']['size'];
		$error = $_FILES['file2']['error'];
		$tmpName = $_FILES['file2']['tmp_name'];

		// cek apakah tidak ada gambar yang di upload
		if ($error === 4) {
			echo "<script>
                    alert('pilih dokumen pdf terlebih dahulu!');
                    </script>";
			return false;
		}

		// cek apakah yang diupload adalah dokumen pdf
		$ekstensiGambarValid = ['pdf'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		$_SESSION['cek'] = $ekstensiGambar;
		if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
			echo "<script>
                    alert('yang anda upload bukan dokumen pdf!');
                    </script>";
			return false;
		}


		// cek jika ukurannya terlalu besar
		if ($ukuranFile > 5000000) {
			echo "<script>
                    alert('ukuran dokumen terlalu besar!');
                    </script>";
			return false;
		}


		// lolos pengecekan, gambar siap diupload
		// Generate nama gambar baru
		$namaFileBaru = 'dok2' . '_' . time()  . '.' . $ekstensiGambar;

		move_uploaded_file($tmpName, 'assets/upload/dokumen/' . $namaFileBaru);

		return $namaFileBaru;
	}
	public function upload3()
	{
		$namaFile = $_FILES['file3']['name'];
		$ukuranFile = $_FILES['file3']['size'];
		$error = $_FILES['file3']['error'];
		$tmpName = $_FILES['file3']['tmp_name'];

		// cek apakah tidak ada gambar yang di upload
		if ($error === 4) {
			echo "<script>
                    alert('pilih dokumen pdf terlebih dahulu!');
                    </script>";
			return false;
		}

		// cek apakah yang diupload adalah dokumen
		$ekstensiGambarValid = ['pdf'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		$_SESSION['cek'] = $ekstensiGambar;
		if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
			echo "<script>
                    alert('yang anda upload bukan dokumen pdf!');
                    </script>";
			return false;
		}


		// cek jika ukurannya terlalu besar
		if ($ukuranFile > 5000000) {
			echo "<script>
                    alert('ukuran dokumen terlalu besar!');
                    </script>";
			return false;
		}


		// lolos pengecekan, gambar siap diupload
		// Generate nama gambar baru
		$namaFileBaru = 'dok3' . '_' . time()  . '.' . $ekstensiGambar;
		move_uploaded_file($tmpName, 'assets/upload/dokumen/' . $namaFileBaru);

		return $namaFileBaru;
	}

	public function upload4()
	{
		$namaFile = $_FILES['file4']['name'];
		$ukuranFile = $_FILES['file4']['size'];
		$error = $_FILES['file4']['error'];
		$tmpName = $_FILES['file4']['tmp_name'];

		// cek apakah tidak ada gambar yang di upload
		if ($error === 4) {
			echo "<script>
                    alert('pilih dokumen pdf terlebih dahulu!');
                    </script>";
			return false;
		}

		// cek apakah yang diupload adalah gambar
		$ekstensiGambarValid = ['pdf'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		$_SESSION['cek'] = $ekstensiGambar;
		if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
			echo "<script>
                    alert('yang anda upload bukan dokumen pdf!');
                    </script>";
			return false;
		}


		// cek jika ukurannya terlalu besar
		if ($ukuranFile > 5000000) {
			echo "<script>
                    alert('ukuran dokumen terlalu besar!');
                    </script>";
			return false;
		}


		// lolos pengecekan, gambar siap diupload
		// Generate nama gambar baru
		$namaFileBaru = 'dok4' . '_' . time()  . '.' . $ekstensiGambar;

		move_uploaded_file($tmpName, 'assets/upload/dokumen/' . $namaFileBaru);

		return $namaFileBaru;
	}

	public function Captcha()
	{

		if (isset($_POST["submit"])) {

			$captcha = $_POST['g-recaptcha-response'];
			if (!isset($captcha)) {
				echo '
          Please check the the captcha form.
          ';
				exit;
			}
			$secretKey = "6LcBFHgkAAAAAIlbjtolv6uiTAbuSUElBIQ5lQFe";
			$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
			$response = file_get_contents($url);
			$responseKeys = json_decode($response, true);
			if ($responseKeys["success"]) {
				$this->tambahPemohon();
			} else {
				$_SESSION['error2'] = 1;
			}
		} else {
			$_SESSION['error2'] = 1;
		}
	}
}
