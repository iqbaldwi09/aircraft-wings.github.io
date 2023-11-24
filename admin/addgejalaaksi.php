
<?php
session_start();
include "koneksi.php";
if (isset($_POST['simpan'])) {
	$simpan = mysqli_query($kon, "insert into gejala values ('','$_POST[Nama_Gejala]')");


	$simpan = mysqli_query($kon, $simpan) or die(mysqli_error($kon));
	if ($simpan) {
		echo "<script>
		
		window.location.href='index.php?p=gejala';
	</script>";
	} else {
		echo "<script>
		
		window.location.href='index.php?p=gejala';
	</script>";
	}
}
?>