<?php
session_start();
include "koneksi.php";
$kode = $_GET['kode'];

$query = "INSERT INTO basiskasus (ID_Kerusakan, ID_Gejala) 
          SELECT ID_Kerusakan, ID_Gejala FROM kasusbaru WHERE ID_Kb = ?";

// Persiapkan statement
$stmt = $kon->prepare($query);

if ($stmt) {
    // Bind parameter
    $stmt->bind_param("s", $kode);

    // Eksekusi statement
    if ($stmt->execute()) {
        // Query berhasil dieksekusi, lanjutkan dengan menghapus data dari tabel kasusbaru
        $sqldelete = "DELETE FROM kasusbaru WHERE ID_Kb = ?";

        // Persiapkan statement penghapusan
        $stmtDelete = $kon->prepare($sqldelete);

        if ($stmtDelete) {
            // Bind parameter untuk statement penghapusan
            $stmtDelete->bind_param("s", $kode);

            // Eksekusi statement penghapusan
            if ($stmtDelete->execute()) {
                // Data berhasil dihapus dari tabel kasusbaru, redirect ke halaman lain
                echo "<script>
		alert('data telah di ijinkan');
		window.location.href='index.php?p=kasusbaru';
	</script>";
                exit; // Pastikan keluar dari skrip setelah mengalihkan
            } else {
                echo "Gagal menghapus data dari kasusbaru: " . $stmtDelete->error;
            }

            // Tutup statement penghapusan
            $stmtDelete->close();
        } else {
            echo "Gagal menyiapkan statement penghapusan: " . $kon->error;
        }
    } else {
        echo "Gagal memindahkan data ke basiskasus: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
} else {
    echo "Gagal menyiapkan statement: " . $kon->error;
}

// Tutup koneksi database setelah selesai
$kon->close();
