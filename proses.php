<?php
// Koneksi ke database (sesuaikan dengan konfigurasi Anda)
include "koneksi.php";
session_start();

// Mendapatkan data gejala yang dipilih oleh pengguna
$gejala = $_POST['gejala'];

// Menentukan nilai k pada k-NN (misalnya, 3)
$k = 3;

// Mendapatkan jumlah gejala yang dipilih
$selectedSymptomsCount = count($gejala);

// Menginisialisasi array untuk menyimpan hasil kesamaan Cosine
$cosineSimilarities = array();

// Mendapatkan semua kasus dari basis kasus
$sql = "SELECT * FROM basiskasus";
$result = $con->query($sql);

// Menghitung koefisien kesamaan Cosine untuk setiap kasus
while ($row = $result->fetch_assoc()) {
    $caseSymptoms = explode(",", $row['ID_Gejala']);
    $caseSymptomsCount = count($caseSymptoms);

    // Menghitung dot product antara vektor fitur kasus dan vektor fitur gejala yang dipilih
    $dotProduct = 0;
    foreach ($gejala as $selectedSymptom) {
        if (in_array($selectedSymptom, $caseSymptoms)) {
            $dotProduct++;
        }
    }

    // Menghitung norma Euclidean dari vektor fitur kasus dan vektor fitur gejala yang dipilih
    $caseNorm = sqrt($caseSymptomsCount);
    $selectedNorm = sqrt($selectedSymptomsCount);

    // Menghitung kesamaan Cosine
    $cos = $dotProduct / ($caseNorm * $selectedNorm);
    $cosineSimilarity = $cos * 100;

    // Menyimpan koefisien kesamaan Cosine dan ID_Kerusakan pada array
    $cosineSimilarities[$row['ID_Kerusakan']] = $cosineSimilarity;
}

// Mengurutkan array koefisien kesamaan Cosine dari yang terbesar ke terkecil
arsort($cosineSimilarities);

$nilaiCosine = reset($cosineSimilarities);
// Mengambil ID_Kerusakan dengan koefisien kesamaan Cosine tertinggi
$maxKerusakan = key($cosineSimilarities);

// Mengambil informasi Kerusakan dari tabel Kerusakan berdasarkan ID_Kerusakan yang ditemukan
$sql = "SELECT * FROM kerusakan WHERE ID_Kerusakan = $maxKerusakan";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nama_Kerusakan = $row['Nama_Kerusakan'];

    // Menampilkan hasil diagnosis
    // echo "<h2>Hasil Identifikasi</h2>";
    // echo "<p>Kerusakan yang paling mungkin adalah: $nama_Kerusakan</p>";
} else {
    echo "Tidak ada hasil diagnosis yang ditemukan.";
}

$_SESSION['maxKerusakan'] = $maxKerusakan;

// Mengambil 3 ID_Kerusakan dengan koefisien kesamaan Cosine tertinggi
$top3Kerusakan = array_slice($cosineSimilarities, 1, $k, true);

mysqli_query($con, "TRUNCATE TABLE knn");
$count = 0;

foreach ($top3Kerusakan as $ID_Kerusakan => $cosineSimilarity) {
    // Mengambil informasi Kerusakan dari tabel Kerusakan berdasarkan ID_Kerusakan yang ditemukan
    $sqlGejala = "SELECT gejala.* FROM gejala INNER JOIN hasil ON gejala.ID_Gejala = hasil.ID_Gejala WHERE hasil.ID_Kerusakan = $ID_Kerusakan";
    $resultGejala = $con->query($sqlGejala);

    if ($resultGejala->num_rows > 0) {
        while ($rowGejala = $resultGejala->fetch_assoc()) {
            // echo "* " . $rowGejala['Nama_Gejala'] . "<br>";
        }
    }

    $gejalaString = implode(",", $gejala);

    $sqlKasus = "SELECT ID_Kasus FROM basiskasus WHERE ID_Kerusakan = $ID_Kerusakan";
    $resultKasus = $con->query($sqlKasus);

    if ($resultKasus->num_rows > 0) {
        while ($rowKasus = $resultKasus->fetch_assoc()) {
            $ID_Kasus = $rowKasus['ID_Kasus'];

            // Menyimpan ID_Kasus ke dalam tabel knn
            $insertKnnSql = "INSERT INTO knn (ID_Kasus, ID_Kerusakan, Nilai) VALUES ('$ID_Kasus', '$ID_Kerusakan', '$cosineSimilarity')";
            $con->query($insertKnnSql);

            $count++;

            if ($count <= $k) {
                break; // Hentikan loop setelah menyimpan tetangga terdekat sebanyak $k
            }
        }
    }
}

$tanggal_waktu = date('Y-m-d H:i:s');
$_SESSION['tanggal_waktu'] = $tanggal_waktu;
$newsql = "INSERT INTO kasusbaru (ID_Kerusakan, ID_Gejala, NilaiJ, Tanggal_Waktu) VALUES ('$maxKerusakan', '$gejalaString', '$nilaiCosine', '$tanggal_waktu')";
$insertSql = "INSERT INTO hasil (ID_Kerusakan, ID_Gejala, NilaiJ, Tanggal_Waktu) VALUES ('$maxKerusakan', '$gejalaString', '$nilaiCosine', '$tanggal_waktu')";

if ($con->query($insertSql) === TRUE && $con->query($newsql) === TRUE) {
    echo "<script>
    window.location.href='index.php?p=hasil';
    </script>";
    // echo "Hasil diagnosa berhasil disimpan ke dalam database.";
} else {
    echo "Gagal menyimpan hasil diagnosa: " . $con->error;
}

$_SESSION['gejalaString'] = $gejalaString;

exit();
