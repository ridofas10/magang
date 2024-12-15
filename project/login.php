<?php
ini_set('display_errors', 0);
session_start();
require 'class/User.php';

$tampil = new Get;

if (isset($_POST["submit"])) {
  $tampil->Captcha();
}

if (isset($_SESSION['superadmin']) || isset($_SESSION['admin'])) {
  header('location: Dashboard.php');
}



?>




<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form User</title>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.css">
  <script src="assets/sweetalert2/dist/sweetalert2.js"></script>
  <style>
    * {
      margin: 0;
      padding: 0;

      font-family: sans-serif;
    }

    body {
      font-family: 'Arial', sans-serif;
      background-color: #f1f1f1;
      background-image: url('assets/img/bg.jpg');
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .logo {
      display: block;
      margin: 0 auto;
      margin-top: 1em;
      margin-bottom: 1em;
    }

    img {
      width: 120px;
      height: 120px;

    }

    .form {


      border-radius: 15px;
      text-align: center;


      width: 450px;
      margin: 10px auto;
      padding: 10px 40px 10px 40px;
      background: rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(5px);
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);

    }

    .btn-group {
      display: flex;
      justify-content: center;


    }

    .form input {
      border-radius: 10px;
      display: block;
      width: 100%;
      margin-bottom: 20px;
      padding: 10px;
      border: none;
      background: #f1f1f1;
      font-size: 20px;
    }

    .form h2 {
      font-size: 2em;
      font-weight: 900;
      margin-top: 0.5em;

      color: white;
      -webkit-text-stroke: 1px;
      -webkit-text-fill-color: #0066FE;


    }

    .form button {
      border-radius: 10px;
      width: 10em;
      padding: 20px;
      background: #2196f3;
      color: #fff;
      font-size: 20px;
      border: none;
      cursor: pointer;
    }

    .form input[type="checkbox"] {
      display: inline-block;
      width: 20px;
      margin: 0 5px 0 0;
    }

    .form label {
      font-size: 18px;
      font-style: italic;
      color: #2196f3;
    }

    .form a {
      font-size: 12px;
      font-style: italic;
      color: #2196f3;
      text-decoration: none;
      text-align: left;
    }
  </style>
</head>

<body>

  <div class="form">
    <img src="assets/img/kominfo.png" height="250px" style="display: block; margin: 0 auto;">
    <h2>LOGIN ADMIN</h2><br>
    <form method="post">
      <input type="text" placeholder="Masukkan Username Anda" name="username" id="username" />
      <input type="password" placeholder="Masukkan Password Anda" name="password" id="password" />
      <div class="g-recaptcha" data-sitekey="<?= $_ENV['siteKey'] ?>"></div><br>
      <div class="btn-group">
        <button type="submit" name="submit">LOGIN</button>
      </div>
    </form><br>

  </div>
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

  <?php if (isset($_SESSION['error']) == 1) {
  ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Username/Password Salah!',
      })
    </script>

  <?php
    session_unset();
    session_destroy();
  }  ?>
  <?php if (isset($_SESSION['error']) == 2) {
  ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'User Tidak ada!',
      })
    </script>

  <?php
    session_unset();
    session_destroy();
  }  ?>
</body>

</html>