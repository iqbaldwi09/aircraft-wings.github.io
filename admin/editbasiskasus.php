<?php
session_start();
include "koneksi.php";

$kode = $_GET['kode'];
$sql = mysqli_query($kon, "select * from basiskasus where ID_Kasus='$kode'");
$data = mysqli_fetch_array($sql);

if (mysqli_num_rows($sql) > 0) {
	$ID_Gejala = $data['ID_Gejala'];
?>

	<!-- About-->
	<div class="container px-4 px-lg-6">
		<section class="container justify-content-center">
			<div class="col-xl-12 col-lg-6 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">

						<!-- Nested Row within Card Body -->
						<div class="p-5">

							<div id="kat">
								<div class="card-header">
									<h1 align="center">Edit Basis Kasus</h1>
								</div>

								<form action='' method="post">
									<div class="form-group">
										<label class="control-label" for="ID_Kerusakan">Nama kerusakan</label>
										<div class="controls">
											<select class="control-label" name="ID_Kerusakan" id="ID_Kerusakan">
												<?php
												$sp0 = mysqli_query($kon, "select * from kasus where ID_Kasus='$kode'");
												if ($dp0 = mysqli_fetch_array($sp0)) {
													echo "<option value='$kode'>$dp0[Nama_Kerusakan]</option>";
												}
												?>
												<?php
												$sp = mysqli_query($kon, "select * from kerusakan");
												while ($dp = mysqli_fetch_array($sp)) {
													echo "<option value=$dp[ID_Kerusakan]> $dp[Nama_Kerusakan]</option>";
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label" for="gejala">Daftar Gejala</label>
										<div class="controls">
											<?php
											$sg = mysqli_query($kon, "select * from gejala");
											while ($dg = mysqli_fetch_array($sg)) {
												$checked = in_array($dg['ID_Gejala'], explode(',', $ID_Gejala)) ? 'checked' : '';
												echo "<input type='checkbox' name='item[]' value='$dg[ID_Gejala]' $checked>";
												echo " $dg[Nama_Gejala]<br>";
											}
											?>
										</div>
									</div>
									<hr>
									<input name="simpan" type="submit" value="Simpan" class="btn btn-success btn-user btn-block" />
									<input name="batal" type="submit" value="Batal" class="btn btn-danger btn-user btn-block" />
								</form>
							</div>
						</div>
					</div>
				</div>

			</div>
	</div>
	</div>
	<!-- /.container-fluid -->

<?php
	include "koneksi.php";
	if (isset($_POST['simpan'])) {
		mysqli_query($kon, "UPDATE basiskasus SET ID_Kerusakan='$_POST[ID_Kerusakan]', ID_Gejala='" . implode(",", $_POST['item']) . "' WHERE ID_Kasus='$kode'") or die(mysqli_error($kon));

		echo "<script language=javascript> alert('Data Berhasil Disimpan');
				window.location='?p=basiskasus'</script>";
		exit;
	}

	if (isset($_POST['batal'])) {
		echo "<script language=javascript>
				window.location='?p=basiskasus';
				</script>";
		exit;
	}
}

?>