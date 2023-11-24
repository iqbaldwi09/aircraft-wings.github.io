<?php
include "koneksi.php";
if (isset($_POST['simpan'])) {
	$simpan = mysqli_query($kon, "UPDATE gejala set Nama_Gejala='$_POST[Nama_Gejala]' where ID_Gejala='$_GET[edit]'");

	if ($simpan) {
		echo "<script>
		window.location.href='index.php?p=gejala';
	</script>";
	} else {
		echo "<script>
	window.location.href='index.php?p=editgejala';
		</script>";
	}
}

$qcari = mysqli_query($kon, "select * from gejala where ID_Gejala='$_GET[edit]'");
$cari = mysqli_fetch_array($qcari);
?>

<div class="container">

	<!-- Outer Row -->
	<section class="container justify-content-center">

		<div class="col-xl-12 col-lg-6 col-md-9">

			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="p-5">
						<div id="kat">
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-4">Edit Gejala</h1>
							</div>
							<form action='' method="post">

								<div class="form-group">
									<input name="Nama_Gejala" type="text" placeholder="Nama Gejala" value="<?php echo "$cari[Nama_Gejala]"; ?>" class="form-control form-control-user">
								</div>


								<hr>
								<input name="simpan" type="submit" value="Simpan" class="btn btn-success btn-user btn-block" />
							</form>
						</div>

					</div>

				</div>

			</div>

		</div>