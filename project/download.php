<?php

$file = $_GET['file'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
        }

        body {
            height: 100vh;
        }

        iframe {
            height: 100%;
            width: 100%;
        }
    </style>
</head>

<body>
    <iframe src="<?php echo 'assets/upload/dokumen/' . $file; ?>" width="90%" height="500px">
    </iframe>
</body>

</html>