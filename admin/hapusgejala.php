<?php
session_start();
include "koneksi.php";

if (isset($_GET['hapus'])) {
	$kode = $_GET['hapus'];

	// Validasi parameter kode (contoh: pastikan kode adalah angka)
	if (!is_numeric($kode)) {
		echo "Kode tidak valid.";
		exit;
	}

	$sqldelete = "DELETE FROM kerusakan WHERE ID_Gejala= '$kode'";
	$hapus = mysqli_query($kon, $sqldelete);

	if ($hapus) {
		echo "<script>
            alert('Data terhapus.');
            window.location.href='index.php?p=gejala';
        </script>";
	} else {
		echo "Gagal menghapus data: " . mysqli_error($kon);
	}
} else {
	echo "Parameter kode tidak ditemukan.";
}
