<?php
session_start();
include "koneksi.php";

$Nama_Kerusakan = $_POST['Nama_Kerusakan'];



$sql = "insert into kerusakan (ID_Kerusakan, Nama_Kerusakan) value ('$ID_Kerusakan', '$Nama_Kerusakan')";

$kerusakan = mysqli_query($kon, $sql) or die(mysqli_error($kon));
if ($kerusakan) {
	echo "<script>
		
			window.location.href='index.php?p=kerusakan';
		</script>";
} else {
	echo "<script>
		
			window.location.href='index.php?p=addkerusakan';
		</script>";
}
