<?php

include('class/config.php');
class Cetak
{
    public $conn;
    public function __construct()
    {


        try {
            $conn = new PDO('mysql:host=' . $_ENV['host'] . ';dbname=' . $_ENV['dbname'], $_ENV['username'], $_ENV['password']);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn = $conn;
        } catch (Exception $e) {
        }
    }




    function getCetak()
    {
        $id = 1;
        $query = "SELECT * FROM cetak WHERE id=:id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch();
        if ($stmt->rowCount() > 0) {
            return $data;
        } else {
            return false;
        }
    }

    function updateCetak()
    {
        $cek = $this->getCetak();
        if (!$cek) {
            $this->addCetak();
        }


        $id_pemohon = $_GET['id'];
        $id = 1;
        // $kop1 = $_POST['kop1'];
        // $kop2 = $_POST['kop2'];
        // $kop3 = $_POST['kop3'];
        $nomor = $_POST['nomor'];
        $narasi = $_POST['narasi'];
        $penutup = $_POST['penutup'];
        $kepala_dinas = $_POST['kepala-dinas'];
        $nip_kepala = $_POST['nip-kepala-dinas'];

        $query = "UPDATE cetak SET nomor=:nomor,narasi=:narasi,penutup=:penutup,kepala_dinas=:kepala_dinas,nip_kepala_dinas=:nip_kepala_dinas WHERE id=:id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nomor', $nomor);
        $stmt->bindParam(':narasi', $narasi);
        $stmt->bindParam(':penutup', $penutup);
        $stmt->bindParam(':kepala_dinas', $kepala_dinas);
        $stmt->bindParam(':nip_kepala_dinas', $nip_kepala);
        $stmt->execute();
        echo '<script>window.location="dokumen.php?id=' . $id_pemohon . '"</script>';
    }
    function addCetak()
    {
        $id_pemohon = $_GET['id'];
        $id = 1;
        $kop1 = $_POST['kop1'];
        $kop2 = $_POST['kop2'];
        $kop3 = $_POST['kop3'];
        $nomor = $_POST['nomor'];
        $narasi = $_POST['narasi'];
        $penutup = $_POST['penutup'];
        $kepala_dinas = $_POST['kepala-dinas'];
        $nip_kepala = $_POST['nip-kepala-dinas'];

        $query = "INSERT INTO cetak (id,nomor,narasi,penutup,kepala_dinas,nip_kepala_dinas) VALUES (:id,:kop1,:kop2,:kop3,:nomor,:narasi,:penutup,:kepala_dinas,:nip_kepala_dinas)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nomor', $nomor);
        $stmt->bindParam(':narasi', $narasi);
        $stmt->bindParam(':penutup', $penutup);
        $stmt->bindParam(':kepala_dinas', $kepala_dinas);
        $stmt->bindParam(':nip_kepala_dinas', $nip_kepala);
        $stmt->execute();
        echo '<script>window.location="dokumen.php?id=' . $id_pemohon . '"</script>';
        exit;
    }
}
