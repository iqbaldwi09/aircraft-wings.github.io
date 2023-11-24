<?php
session_start();
include "koneksi.php";

$query = mysqli_query($kon, "SELECT * FROM kasusbaru");
if (mysqli_num_rows($query) > 0) {
?>

    <!-- About-->
    <div class="container">
        <!-- DataTales Example -->
        <div class="card shadow mb-3">
            <div class="card-header ">
                <h3 align="center" style="color:black;">Tabel Kasus Baru</h3>
            </div>
            <section class="container justify-content-center">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kerusakan</th>
                                    <th>Gejala</th>
                                    <th>ijin</th>
                                    <th>Hapus</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kerusakan</th>
                                    <th>Gejala</th>
                                    <th>ijin</th>
                                    <th>Hapus</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_array($query)) {
                                    $kerusakanQuery = mysqli_query($kon, "SELECT * FROM kerusakan WHERE ID_Kerusakan='$row[ID_Kerusakan]'");
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
                                                $gejalaQuery = mysqli_query($kon, "SELECT * FROM gejala WHERE ID_Gejala = '$gejalaID'");
                                                if ($gejalaData = mysqli_fetch_array($gejalaQuery)) {
                                                    echo "* " . $gejalaData['Nama_Gejala'] . "<br>";
                                                }
                                            }
                                            ?>
                                        <td><a href="?p=ijinkasus&kode=<?php echo $row['ID_Kb']; ?>" class="btn btn-success btn-circle btn-sm">
                                                <i class="bx bx-like"></i></a></td>
                                        <td><a onClick="return confirm('Yakin ingin hapus?')" href="?p=hapuskasusbaru&kode=<?php echo $row['ID_Kb']; ?>" class="btn btn-danger btn-circle btn-sm">
                                                <i class="bx bx-trash"></i></a>

                                        </td>
                                    </tr>
                                <?php
                                    $i++;
                                }
                                ?>
                        </table>

                    </div>
                </div>
        </div>

    </div>
    </div>

    </div>
<?php
}
?>
<!-- /.container-fluid -->