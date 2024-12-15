<?php
require('class/config.php');
class layananclass
{
    public $conn;
    public function __construct()
    {


        try {
            $conn = new PDO('mysql:host=' . $_ENV['host'] . ';dbname=' . $_ENV['dbname'], $_ENV['username'], $_ENV['password']);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn = $conn;
        } catch (PDOException $e) {

            die();
        }
    }
    public function getLayanan()
    {

        $sql = "SELECT *FROM tb_layanan ORDER BY id DESC";
        $row = $this->conn->prepare($sql);
        $row->execute();
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function getLayananbyid()
    {
        $id = $_GET["id"];
        $sql = "SELECT * FROM tb_layanan WHERE id=?";
        $row = $this->conn->prepare($sql);
        $row->execute(array($id));
        $hasil = $row->fetch();
        return $hasil;
    }
    public function getLastLayanan()
    {
        $sql = "SELECT * FROM tb_layanan ORDER BY id DESC";
        $row = $this->conn->prepare($sql);
        $row->execute();
        $hasil = $row->fetch();
        return $hasil['id'];
    }

    public function tambahLayanan()
    {
        $id = $this->getLastLayanan() + 1;
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $this->tambahForm($id);
        $cek = $this->uploadLayanan();
        if (!$cek) {
            $this->uploadLayanan();
            exit;
        } else {
            $gambar = $this->uploadLayanan();
        }
        $data[] = $id;
        $data[] = $judul;
        $data[] = $isi;
        $data[] = $gambar;

        // simpan data

        $sql = 'INSERT INTO tb_layanan (id,judul,isi,gambar)VALUES (?,?,?,?)';
        $row = $this->conn->prepare($sql);
        $row->execute($data);
        $this->conn = null;
        echo '<script>alert("Berhasil Tambah Data");window.location="layanan.php"</script>';
    }

    public function editLayanan()
    {
        $id = $_GET['id'];
        // menangkap data post 
        $cekisi = $this->conn->prepare("SELECT isi FROM tb_layanan
        WHERE id = :id");
        $cekisi->bindParam(':id', $id);
        $cekisi->execute();
        $fetchIsi = $cekisi->fetch()['isi'];

        $judul = $_POST['judul'];

        $isi = $_POST['isi'];

        if (!$isi) {
            $isi = $fetchIsi;
        } else {
            $isi = $_POST['isi'];
        }

        $gambarLama = $_POST['gambarLama'];
        if ($_FILES['gambar']['error'] !== 4) {
            $cek = $this->uploadLayanan();
            $gambar = $cek;
            $cekGambar = $this->conn->prepare("SELECT gambar FROM tb_layanan
            WHERE id = :id");
            $cekGambar->bindParam(':id', $id);
            $cekGambar->execute();
            $delete = $cekGambar->fetch()['gambar'];
            if ($delete) {
                unlink('assets/upload/img/' . $delete);
            }
        } else {
            $gambar = $gambarLama;
        }

        $data[] = $judul;
        $data[] = $isi;
        $data[] = $gambar;
        $data[] = $id;

        // simpan data barang
        $sql = 'UPDATE tb_layanan SET judul=?,isi=?,gambar=? WHERE id=?';
        $row = $this->conn->prepare($sql);
        $row->execute($data);
        if ($row->execute()) {
            $_SESSION['berhasil-edit-layanan'] = 1;
            echo '<script>window.location="layanan.php"</script>';
        }
    }

    public function deleteFormLayanan($id)
    {
        $cek = $this->conn->prepare("SELECT * FROM tb_form
        WHERE layanan_id = :layanan_id");
        $cek->bindParam(':layanan_id', $id);
        $cek->execute();
        $syarat_ketentuan = $cek->fetch()['syarat_ketentuan'];
        if ($syarat_ketentuan) {
            unlink('assets/upload/dokumen/' . $syarat_ketentuan);
        }

        $cek2 = $this->conn->prepare("DELETE FROM tb_form
        WHERE layanan_id = :layanan_id");
        $cek2->bindParam(':layanan_id', $id);
        $cek2->execute();
    }
    public function hapusLayanan()
    {
        // untuk Hapus data Pemohon berdasarkan id
        $id = $_GET['id'];
        $this->deleteFormLayanan($id);
        $cek = $this->conn->prepare("SELECT gambar FROM tb_layanan
        WHERE id = :id");
        $cek->bindParam(':id', $id);
        $cek->execute();
        $gambar = $cek->fetch()['gambar'];
        if ($gambar) {
            unlink('assets/upload/img/' . $gambar);
        }



        $sql = "DELETE FROM tb_layanan WHERE id= ?";
        $row = $this->conn->prepare($sql);
        $row->execute(array($id));

        echo '<script>alert("Berhasil Hapus Data");window.location="layanan.php"</script>';
    }

    public function uploadLayanan()
    {
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];
        // cek apakah tidak ada gambar yang di upload
        if ($error === 4) {
            echo "<script>
                    alert('pilih gambar terlebih dahulu!');
                    </script>";
            return false;
        }

        // cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['png', 'PNG'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        $_SESSION['cek'] = $namaFile;
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
                    alert('yang anda upload bukan gambar!');
                    </script>";
            return false;
        }


        // cek jika ukurannya terlalu besar
        if ($ukuranFile > 1000000) {
            echo "<script>
                    alert('ukuran gambar terlalu besar!');
                    </script>";
            return false;
        }


        // lolos pengecekan, gambar siap diupload
        // Generate nama gambar baru
        $namaFileBaru = time();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'assets/upload/img/' . $namaFileBaru);

        return $namaFileBaru;
    }

    // function untuk cekbox
    public function getForm()
    {
        $sql = "SELECT * FROM tb_form JOIN tb_layanan ON tb_form.layanan_id = 14";
        $row = $this->conn->prepare($sql);
        $row->execute();
        $hasil = $row->fetch();
        return $hasil;
    }
    public function tambahForm($id)
    {
        if (!$_POST['nama_domain']) {
            $nama_domain = 0;
        } else {
            $nama_domain = 1;
        }

        if (!$_POST['nama_pengelola']) {
            $nama_pengelola = 0;
        } else {
            $nama_pengelola = 1;
        }

        if (!$_POST['nip']) {
            $nip = 0;
        } else {
            $nip = 1;
        }

        if (!$_POST['pangkat_golongan']) {
            $pangkat_golongan = 0;
        } else {
            $pangkat_golongan = 1;
        }

        if (!$_POST['jabatan']) {
            $jabatan = 0;
        } else {
            $jabatan = 1;
        }

        if (!$_POST['no_hp']) {
            $no_hp = 0;
        } else {
            $no_hp = 1;
        }

        if (!$_POST['email']) {
            $email = 0;
        } else {
            $email = 1;
        }
        $syarat = $this->uploadDokumen();
        if (!$syarat) {
            $syarat = $this->uploadDokumen();
            exit;
        } else {
            $syarat = $this->uploadDokumen();
        }
        $data[] = $id;
        $data[] = $nama_domain;
        $data[] = $nama_pengelola;
        $data[] = $nip;
        $data[] = $pangkat_golongan;
        $data[] = $jabatan;
        $data[] = $no_hp;
        $data[] = $email;
        $data[] = $syarat;

        // simpan data

        $sql = 'INSERT INTO tb_form (layanan_id,nama_domain,nama_pengelola,nip,pangkat_golongan,jabatan,no_hp,email,syarat_ketentuan)VALUES (?,?,?,?,?,?,?,?,?)';
        $row = $this->conn->prepare($sql);
        $row->execute($data);
    }

    public function uploadDokumen()
    {
        $namaFile = $_FILES['syarat']['name'];
        $ukuranFile = $_FILES['syarat']['size'];
        $error = $_FILES['syarat']['error'];
        $tmpName = $_FILES['syarat']['tmp_name'];

        // cek apakah tidak ada gambar yang di upload
        if ($error === 4) {
            echo "<script>
                    alert('pilih Dokumen pdf terlebih dahulu!');
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
                    alert('yang anda upload bukan Pdf!');
                    </script>";
            return false;
        }




        // lolos pengecekan, gambar siap diupload
        // Generate nama gambar baru
        $namaFileBaru = 'sk' . '_' . time()  . '.' . $ekstensiGambar;

        move_uploaded_file($tmpName, 'assets/upload/dokumen/' . $namaFileBaru);

        return $namaFileBaru;
    }
}
