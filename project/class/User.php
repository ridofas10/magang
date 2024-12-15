<?php
require('class/config.php');
class User
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
}

class Get extends User
{
    public function login()
    {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM user WHERE username=:username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $row = $stmt->fetch();
        if ($stmt->rowCount() > 0) {
            if (password_verify($password, $row["password"])) {
                if ($row['superadmin'] === 0) {
                    $_SESSION['admin'] = $row['username'];
                    $_SESSION['id'] = $row['id'];
                    echo '<script>window.location="Dashboard.php"</script>';
                } else {
                    $_SESSION['superadmin'] = $row['username'];
                    $_SESSION['id'] = $row['id'];
                    echo '<script>window.location="Dashboard.php"</script>';
                }
            } else {
                $_SESSION['error'] = 1;
            }
        } else {
            $_SESSION['error'] = 2;
        }
    }
    public function getUser()
    {
        $id = $_GET['id'];
        $query = "SELECT * FROM user WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }
    public function getAllUser()
    {

        $query = "SELECT * FROM user ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getAllAdmin()
    {

        $query = "SELECT * FROM user WHERE superadmin=0";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }


    public function Captcha()
    {
        $user = new Get;
        if (isset($_POST["submit"])) {

            $captcha = $_POST['g-recaptcha-response'];
            if (!isset($captcha)) {
                echo '
          Please check the the captcha form.
          ';
                exit;
            }
            $secretKey = $_ENV['secretKey'];
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response, true);
            if ($responseKeys["success"]) {
                $user->login();
            } else {
                $_SESSION['error2'] = 1;
            }
        } else {
            $_SESSION['error2'] = 1;
        }
    }

    public function Ubah()
    {
        $id = $_POST["id"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $passwordLama = $_POST["passwordLama"];
        $passwordKonfir = $_POST["konfirmasiPass"];
        $finalPassword = null;


        if ($password !== $passwordKonfir) {
            $_SESSION['error'] = true;

            return false;
        }

        if (strlen($password) > 2) {
            $finalPassword = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $finalPassword = $passwordLama;
        }



        $query = "UPDATE `user` SET `username`=:username,`password`=:password WHERE id =:id ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $finalPassword);
        $stmt->execute();
        if ($stmt->execute()) {
            if (isset($_SESSION['admin'])) {
                $_SESSION['berhasil'] = 1;
                echo '<script>window.location="dashboard.php"</script>';
            } else {
                $_SESSION['ubah-berhasil'] = 2;
                echo '<script>window.location="dataUser.php"</script>';
            }
        }
    }

    public function Registrasi()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];

        // cek konfirmasi password
        if ($password !== $password2) {
            echo "<script>
                 alert('konfirmasi password tidak sesuai!');
            </script>";
            return false;
        }
        $cek = $this->conn->prepare("SELECT username FROM user
        WHERE username = :username");
        $cek->bindParam(':username', $username);
        $cek->execute();
        if ($cek->rowCount() > 0) {
            echo "<script>
        alert('username sudah terdaftar!');
            </script>";
            return false;
        }

        // enkripsi password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user (username, password) VALUES (:username, :password)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $passwordHash);
        $stmt->execute();
        $_SESSION['berhasil'] = 1;
        echo '<script>window.location="dataUser.php"</script>';
    }

    public function hapusUser()
    {
        $id = $_GET['id'];
        $query = "DELETE FROM user WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo "
        <script>
            alert('hapus admin berhasil');
            window.location='dataUser.php'
        </script>

        ";
    }
}
