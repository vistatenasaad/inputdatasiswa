<?php
 include 'code crud/create-db.php';
 include 'code crud/logo.php';
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <script src="js/sweetalert2.min.js"></script>
    <title>Home</title>
    <link rel="shortcut icon" href="logo/<?php echo $logo_sekolah; ?>" type="image/x-icon">
  </head>
  <body>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #fff;">
        <div class="container">
        <a class="navbar-brand" href="#">
            <img src="logo/<?php echo $logo_sekolah; ?>" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy"> <?php echo $nama_sekolah; ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profil">Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="input-siswa">Input Siswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="data-siswa" tabindex="-1" aria-disabled="true">Data Siswa</a>
            </li>
            
            </ul>
        </div>
        </div>
        </nav>
        <div class="container">
        <div class="cover-img">
            <img src="images/home.jpg" alt="home">
        </div>
            <h1 class="page-one">Welcome</h1>
            <h1 class="page-one-2"> TAEKWONDO BUMIAJI 2021
        </h1>
        <div class="login-btn">
            <a href="login.php" class="btn-login">Login</a>
        </div>
        </div>
    <script src="js/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script defer src="fontawesome/js/all.js"></script>
  </body>
</html>