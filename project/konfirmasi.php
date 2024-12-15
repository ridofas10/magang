<?php
ini_set('display_errors', 0);


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
			height: 100vh;


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
			height: 60%;
		}

		.container1 h2 {
			text-align: center;
			margin: 0 0 20px 0;
			padding: 0;
			color: #113f67;
		}

		.container1 a {
			display: block;
			margin: 2em auto;
			width: 200px;
			height: 50px;
			background-color: #4CAF50;
			color: #fff;
			padding: 10px;

			border: none;
			border-radius: 10px;
			cursor: pointer;
			text-align: center;
			text-decoration: none;
		}
	</style>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.css">
	<script src="assets/sweetalert2/dist/sweetalert2.js"></script>



</head>

<body>
	<div class="container1">
		<img src="assets/img/kominfo.png" height="130px" style="display:block; margin:0 auto;">
		<br>

		<h2>Terima Kasih Telah Mengisi Form </h2>
		<a href="index.php">Kembali ke Home</a>

</body>

</html>