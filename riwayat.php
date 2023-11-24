<?php
include "koneksi.php";

$query = mysqli_query($con, "SELECT * FROM hasil");

if (mysqli_num_rows($query) > 0) {
?>
    <!-- About-->
    <div class="container ">
        <!-- DataTales Example -->
        <div class="card shadow ">
            <div class="card-header ">
                <h3 align="center" style="color:black;">Riwayat Identifikasi</h3>
            </div>
            <div class="card-body ">
                <section class="container justify-content-center">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100px" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kerusakan</th>
                                    <th>Gejala</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kerusakan</th>
                                    <th>Gejala</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_array($query)) {
                                    $kerusakanQuery = mysqli_query($con, "SELECT * FROM kerusakan WHERE ID_Kerusakan='$row[ID_Kerusakan]'");
                                    $kerusakanData = mysqli_fetch_array($kerusakanQuery);
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $kerusakanData['Nama_Kerusakan']; ?></td>
                                        <td>
                                            <?php
                                            // Mengambil ID gejala dari hasil diagnosa
                                            $gejalaIDs = explode(',', $row['ID_Gejala']);

                                            // Perulangan untuk menampilkan gejala
                                            foreach ($gejalaIDs as $gejalaID) {
                                                // Ambil data gejala dari tabel gejala berdasarkan ID_Gejala
                                                $gejalaQuery = mysqli_query($con, "SELECT * FROM gejala WHERE ID_Gejala = '$gejalaID'");
                                                if ($gejalaData = mysqli_fetch_array($gejalaQuery)) {
                                                    echo "* " . $gejalaData['Nama_Gejala'] . "<br>";
                                                }
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                    $i++;
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
} else {
    echo "Tidak ada data yang ditemukan.";
}

mysqli_close($con);
?>

<!-- /.container-fluid -->