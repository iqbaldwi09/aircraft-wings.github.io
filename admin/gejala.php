	<!-- About-->
	<div class="container">
		<!-- DataTales Example -->
		<div class="card shadow mb-3">
			<div class="card-header ">
				<h3 align="center" style="color:black;">Tabel Gejala</h3>
			</div>
			<section class="container justify-content-center">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Gejala</th>
									<th>Edit</th>
									<th>Hapus</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>No</th>
									<th>Nama Gejala</th>
									<th>Edit</th>
									<th>Hapus</th>
								</tr>
							</tfoot>
							<tbody>

								<a href="<?php echo "?p=addgejala"; ?>" class="btn btn-primary btn-block">
									<i></i>Tambahkan Gejala</a>
								<hr>
								<?php
								include "koneksi.php";
								$sqladm = "select * from gejala";
								$gejala = mysqli_query($kon, $sqladm);
								$no = 1;
								while ($radm = mysqli_fetch_array($gejala)) {
									echo "<tr>
		<td><center>" . $no . "</td>
		<td>" . $radm['Nama_Gejala'] . "</td>
		<td><center>
<a href='?p=editgejala&edit=$radm[ID_Gejala]' class='btn btn-info btn-circle btn-sm'>
<input type='hidden' name'edit' value='" . $radm['ID_Gejala'] . "'>
<i class='bx bx-edit'></i>
</a>
</td>

<td><center>
<a onClick=\"return confirm('Yakin ingin hapus?')\" href='?p=hapusgejala&hapus=$radm[ID_Gejala]' class='btn btn-danger btn-circle btn-sm'>

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

	</div>
	</div>

	</div>
	<!-- /.container-fluid -->