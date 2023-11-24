            <!-- About-->
            <div class="container">
                <!-- DataTales Example -->
                <div class="card shadow mb-3">
                    <div class="card-header ">
                        <h3 align="center" style="color:black;">Tabel Kerusakan</h3>
                    </div>
                    <section class="container justify-content-center">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <a href="<?php echo "?p=addkerusakan"; ?>" class="btn btn-primary btn-block">
                                            <i></i>Tambah</a>
                                        <hr>

                                        <?php
                                        include "koneksi.php";
                                        $sqladm = "select * from kerusakan";
                                        $kerusakan = mysqli_query($kon, $sqladm);
                                        $no = 1;
                                        while ($radm = mysqli_fetch_array($kerusakan)) {
                                            echo "<tr>
		
		<td>" . $no . "</td>
		<td>" . $radm['Nama_Kerusakan'] . "</td>
		


<td><center>
<a href='?p=editkerusakan&edit=$radm[ID_Kerusakan]' class='btn btn-info btn-circle btn-sm'>
<i class='bx bx-edit'></i>
</a>
</td>

<td><center>
<a onClick=\"return confirm('Yakin ingin hapus?')\" href='?p=hapuskerusakan&hapus=$radm[ID_Kerusakan]' class='btn btn-danger btn-circle btn-sm'>

<i class='bx bx-trash'></i>
</a>
</td>

		</tr>";
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
                </section>

            </div>



            <!-- /.container-fluid -->