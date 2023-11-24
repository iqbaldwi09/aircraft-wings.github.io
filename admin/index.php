<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Projek TA</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
  <div class="sidebar">
    <div class="logo_details">

      <div class="logo_name">Sistem Identifikasi</div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="<?php echo "?p=kerusakan"; ?>">
          <i class="bx bx-cog"></i>
          <span class="link_name">Kerusakan</span>
        </a>
        <span class="tooltip">Kerusakan</span>
      </li>
      <li>
        <a href="<?php echo "?p=gejala"; ?>">
          <i class="bx bx-hive"></i>
          <span class="link_name">Gejala</span>
        </a>
        <span class="tooltip">Gejala</span>
      </li>
      <li>
        <a href="<?php echo "?p=basiskasus"; ?>">
          <i class="bx bx-folder-plus"></i>
          <span class="link_name">Basis Kasus</span>
        </a>
        <span class="tooltip">Basis Kasus</span>
      </li>
      <li>
        <a href="<?php echo "?p=kasusbaru"; ?>">
          <i class="bx bx-folder-open"></i>
          <span class="link_name">Kasus Baru</span>
        </a>
        <span class="tooltip">Kasus Baru</span>
      </li>
      <li>
        <a href="<?php echo "?p=logout"; ?>">
          <i class="bx bx-log-out"></i>
          <span class="link_name">Logout</span>
        </a>
        <span class="tooltip">Logout</span>
      </li>
    </ul>
  </div>

  <div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

      <?php error_reporting(E_ERROR | E_WARNING | E_PARSE); ?>
      <?php
      if ($_GET["p"] == "kerusakan") {
        include "kerusakan.php";
      } else if ($_GET["p"] == "addkerusakan") {
        include "addkerusakan.php";
      } else if ($_GET["p"] == "addkerusakanaksi") {
        include "addkerusakanaksi.php";
      } else if ($_GET["p"] == "editkerusakan") {
        include "editkerusakan.php";
      } else if ($_GET["p"] == "editkerusakanaksi") {
        include "editkerusakanaksi.php";
      } else if ($_GET["p"] == "hapuskerusakan") {
        include "hapuskerusakan.php";
      } else if ($_GET["p"] == "logout") {
        include "logout.php";
      } else if ($_GET["p"] == "gejala") {
        include "gejala.php";
      } else if ($_GET["p"] == "addgejala") {
        include "addgejala.php";
      } else if ($_GET["p"] == "hapusgejala") {
        include "hapusgejala.php";
      } else if ($_GET["p"] == "editgejala") {
        include "editgejala.php";
      } else if ($_GET["p"] == "basiskasus") {
        include "basiskasus.php";
      } else if ($_GET["p"] == "addbasiskasus") {
        include "addbasiskasus.php";
      } else if ($_GET["p"] == "hapusbasiskasus") {
        include "hapusbasiskasus.php";
      } else if ($_GET["p"] == "editbasiskasus") {
        include "editbasiskasus.php";
      } else if ($_GET["p"] == "hasilidentifikasi") {
        include "hasilidentifikasi.php";
      } else if ($_GET["p"] == "hapushasilidentifikasi") {
        include "hapushasilidentifikasi.php";
      } else if ($_GET["p"] == "kasusbaru") {
        include "kasusbaru.php";
      } else if ($_GET["p"] == "ijinkasus") {
        include "ijinkasus.php";
      } else if ($_GET["p"] == "hapuskasusbaru") {
        include "hapuskasusbaru.php";
      } else {
        include "kerusakan.php";
      }
      ?>
    </div>


  </div>

  <!-- Scripts -->
  <script src="script.js"></script>
</body>

</html>