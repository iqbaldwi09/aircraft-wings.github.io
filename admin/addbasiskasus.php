<?php
session_start();
include "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Gejala</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="../img/favicon.png" />
	<link href="../style/bootstrap.min.css" rel="stylesheet" media="screen">

	<style>
		body {
			background-image: url(../img/body.jpg);
			background-repeat: repeat;
			background-attachment: fixed;
		}
	</style>
</head>

<body>

	<?php

	?>
	<div class="container">
		<section class="container justify-content-center">
			<div class="navbar-inner" style="border:1px solid #bbb; border-radius:10px; padding:10px 20px 10px 20px; margin-top:50px; margin-left:auto; margin-right:auto;">
				<div class="card-header">
					<h3 align="center">Tambah Basis Kasus</h3>
				</div>

				<div style="margin-top:10px;">
					<form class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data">
						<div class="control-group">
							<label class="control-label" for="kode">Nama Kerusakan</label>
							<div class="controls">
								<select name='ID_Kerusakan' id='ID_Kerusakan' class='input-xxlarge'>;
									<?php
									$sp = mysqli_query($kon, "select * from kerusakan");
									while ($dp = mysqli_fetch_array($sp)) {
										echo "<option value=$dp[ID_Kerusakan]>$dp[Nama_Kerusakan]</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="nama">Daftar Gejala:</label>
							<div class="controls">
								<?php
								$sg = mysqli_query($kon, "select * from gejala");
								while ($dg = mysqli_fetch_array($sg)) {
									echo "<input type='checkbox' name='item[]' ID_Gejala='item[]' value='$dg[ID_Gejala]'>";
									echo "  $dg[Nama_Gejala]<br>";
								}
								?>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="simpan"></label>
							<div class="controls">
								<input name="simpan" type="submit" id="simpan" value="Simpan" class="btn btn-success">
								<input name="batal" type="submit" id="batal" value="Batal" class="btn btn-warning">
							</div>
						</div>

						<?php

						if (isset($_POST['simpan'])) {
							// Ambil nilai yang dikirimkan melalui formulir
							$ID_Kerusakan = $_POST['ID_Kerusakan'];
							$gejala = implode(",", $_POST['item']); // Menggabungkan nilai gejala menjadi satu string dengan pemisah koma (,)

							// Lakukan operasi penyimpanan ke database
							$q = mysqli_query($kon, "INSERT INTO basiskasus (ID_Kerusakan, ID_Gejala) VALUES ('$ID_Kerusakan', '$gejala')");

							if ($q) {
								echo "<script language=javascript> alert('Data Berhasil Disimpan');
											window.location='?p=basiskasus'</script>";
							} else {
								echo "Data Gagal Di Simpan";
								echo "Silahkan <a href = '?p=basiskasus'>Ulangi Disini</a>";
							}
						}

						if (isset($_POST['batal'])) {
							echo "<script language=javascript>
								window.location='?p=basiskasus';
								</script>";
							exit;
						}
						?>
					</form>
				</div>
			</div>
	</div>

	<br><br><br><br>


</body>

</html>