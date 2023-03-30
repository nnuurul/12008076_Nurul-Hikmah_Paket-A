<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pelaporan Pengaduan Masyarakat</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php">Pelaporan Pengaduan Masyarakat</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <?php
            if ($_SESSION['login']=='admin') { ?>
            <a class="nav-link" href="index.php?page=pengaduan">Data Pengaduan</a>
            <a class="nav-link" href="index.php?page=tanggapan">Data Tanggapan</a>
            <a class="nav-link" href="index.php?page=masyarakat">Data Masyarakat</a>
            <a class="nav-link" href="index.php?page=petugas">Data Petugas</a>
            <a class="nav-link" href="../config/aksi_logout.php">Logout</a>
            
            <?php } elseif ($_SESSION['login']=='petugas') { ?>
            <a class="nav-link" href="index.php?page=pengaduan">Data Pengaduan</a>
            <a class="nav-link" href="index.php?page=tanggapan">Data Tanggapan</a>
            <a class="nav-link" href="../config/aksi_logout.php">Logout</a>

            <?php } elseif ($_SESSION['login']=='masyarakat') { ?>
            <a class="nav-link" href="../config/aksi_logout.php">Logout</a>


            <?php } else { ?>
            <a class="nav-link" href="index.php?page=registrasi">Registrasi</a>
            <a class="nav-link" href="index.php?page=login">Login</a>
            
          <?php } ?>
        </ul>
    </div>
  </div>
</nav>