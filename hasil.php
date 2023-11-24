<?php
include "koneksi.php";
session_start();
$query = mysqli_query($con, "SELECT * FROM hasil");

if (mysqli_num_rows($query) > 0) {
?>
    <!-- About-->
    <div class="container ">
        <!-- DataTales Example -->

        <div class="card-header ">
            <h3 align="center" style="color:black;">Hasil</h3>
        </div>
        <section class="container justify-content-center">
            <div class="card-body">
                <?php
                $maxKerusakan = $_SESSION['maxKerusakan'];
                $gejalaString = $_SESSION['gejalaString'];
                if ($row = mysqli_fetch_array($query)) {
                    $kerusakanQuery = mysqli_query($con, "SELECT * FROM kerusakan WHERE ID_Kerusakan=$maxKerusakan");
                    $kerusakanData = mysqli_fetch_array($kerusakanQuery);
                    $kerusakan = $kerusakanData['Nama_Kerusakan'];

                    echo "<h5 class='font-weight-bold'>Hasil Identifikasi: $kerusakan</h5>";

                    // Mengambil ID gejala dari hasil diagnosa
                    $gejalaIDs = explode(',', $gejalaString);
                    echo "<h6 class='m-0 font-weight-bold'>Data Gejala:</h6>";

                    // Perulangan untuk menampilkan gejala
                    foreach ($gejalaIDs as $gejalaID) {
                        // Ambil data gejala dari tabel gejala berdasarkan ID_Gejala
                        $gejalaQuery = mysqli_query($con, "SELECT * FROM gejala WHERE ID_Gejala = '$gejalaID'");

                        if ($gejalaData = mysqli_fetch_array($gejalaQuery)) {
                            echo "* " . $gejalaData['Nama_Gejala'] . "<br>";
                        }
                    }

                    // Query untuk mendapatkan data Jaccard Similarity terbaru
                    $nilai = mysqli_query($con, "SELECT * FROM hasil WHERE ID_Kerusakan = $maxKerusakan ORDER BY Tanggal_Waktu DESC LIMIT 1");

                    if ($nilai === false) {
                        // Query tidak berhasil dieksekusi, kita tampilkan pesan kesalahan
                        echo "Error executing the query: " . mysqli_error($con);
                    } else {
                        // Query berhasil dieksekusi, kita lanjutkan dengan menampilkan data
                        if (mysqli_num_rows($nilai) > 0) {
                            $nilaii = mysqli_fetch_array($nilai);
                            $nilaiJ = $nilaii['NilaiJ'];
                            $tanggal = $nilaii['tanggal'];
                            echo "<h5 class='font-weight-bold'>Kesamaan:    $nilaiJ %</h5>";
                        } else {
                            echo "Tidak ada data Jaccard Similarity yang ditemukan.";
                        }
                    }

                ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kerusakan</th>
                                    <th>Gejala</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kerusakan</th>
                                    <th>Gejala</th>
                                    <th>Nilai</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $sqlKNN = "SELECT knn.*, kerusakan.Nama_Kerusakan FROM knn INNER JOIN kerusakan ON knn.ID_Kerusakan = kerusakan.ID_Kerusakan";
                                $stmtKNN = $con->prepare($sqlKNN);
                                $stmtKNN->execute();
                                $resultKNN = $stmtKNN->get_result();

                                if ($resultKNN->num_rows > 0) {
                                    $counter = 1;
                                    while ($rowKNN = $resultKNN->fetch_assoc()) {
                                        $kerusakan = $rowKNN['Nama_Kerusakan'];

                                        echo "<tr>";
                                        echo "<td>$counter</td>";
                                        echo "<td>$kerusakan</td>";

                                        $ID_Kasus = $rowKNN['ID_Kasus'];

                                        echo "<td>";

                                        // Mengambil gejala dari tabel basiskasus berdasarkan ID_Kasus
                                        $sqlGejala = "SELECT ID_Gejala FROM basiskasus WHERE ID_Kasus = ?";
                                        $stmtGejala = $con->prepare($sqlGejala);
                                        $stmtGejala->bind_param("i", $ID_Kasus);
                                        $stmtGejala->execute();
                                        $resultGejala = $stmtGejala->get_result();

                                        if ($resultGejala->num_rows > 0) {
                                            $gejalaIDs = array();
                                            while ($rowGejala = $resultGejala->fetch_assoc()) {
                                                $gejalaIDs[] = $rowGejala['ID_Gejala'];
                                            }

                                            // Mengambil nama gejala dari tabel gejala berdasarkan ID_Gejala
                                            $sqlNamaGejala = "SELECT Nama_Gejala FROM gejala WHERE ID_Gejala IN (" . implode(',', $gejalaIDs) . ")";
                                            $resultNamaGejala = $con->query($sqlNamaGejala);

                                            if ($resultNamaGejala->num_rows > 0) {
                                                while ($rowNamaGejala = $resultNamaGejala->fetch_assoc()) {
                                                    $namaGejala = $rowNamaGejala['Nama_Gejala'];
                                                    echo "* $namaGejala <br>";
                                                }
                                            } else {
                                                echo "Tidak ada gejala yang ditemukan.";
                                            }
                                        } else {
                                            echo "Tidak ada gejala yang ditemukan.";
                                        }

                                        echo "<td>" . $rowKNN['Nilai'] . "%</td>";
                                        echo "</td>";
                                        echo "</tr>";

                                        $counter++;
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>Tidak ada data KNN yang ditemukan.</td></tr>";
                                }


                                ?>
                            </tbody>
                        </table>
                    </div>
            </div>
    </div>

    </div>
    </div>

    </div>
<?php
                }
            }


            mysqli_close($con);
?>

<!-- /.container-fluid -->