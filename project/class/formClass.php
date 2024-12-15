<?php

require('class/config.php');
class Form
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




    public function getAll()
    {
        $id = $_GET['id'];
        $sql = "SELECT id FROM tb_layanan ";
        $row = $this->conn->prepare($sql);
        $row->execute();
        $data = $row->fetchAll();
      
$arr = [];

foreach($data as $a){
    array_push($arr,$a['id']);

}

if(!in_array($id,$arr)){
    // echo "no";
header('location:index.php');
}


    }
    public function getForm()
    {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tb_form JOIN tb_layanan ON tb_form.layanan_id =:id";
        $row = $this->conn->prepare($sql);
        $row->bindParam(':id', $id);
        $row->execute();
        $hasil = $row->fetch();
        return $hasil;
    }
    public function getLayanan()
    {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tb_layanan WHERE id =:id";
        $row = $this->conn->prepare($sql);
        $row->bindParam(':id', $id);
        $row->execute();
        $hasil = $row->fetch();
        return $hasil;
    }
}
