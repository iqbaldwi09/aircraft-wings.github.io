<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<body>

    <div class="card mb-4">
        <!-- Page Heading -->
        <a href="#" class="d-block card-header py-3" aria-expanded="true" aria-controls="collapseCardExample">

        </a>

        <div class="d-block card-body py-3">
            <div class="collapse show" id="collapseCardExample">
                <div class="row ">

                    <div class="col-lg-12">
                        <section class="container justify-content-center">


                            <form method="POST" action="proses.php">
                                <table class="table table-condensed table-hover">
                                    <div id="view">
                                        <h3 align="center" style="color:black;">Pilihlah gejala sesuai dengan keadaan anda.</h3>
                                    </div>
                                    <?php
                                    $sg = mysqli_query($con, "select * from gejala");
                                    while ($dg = mysqli_fetch_array($sg)) {
                                        echo
                                        "<tr>
                                        <td class='text-center'  width='2%'><input type='checkbox' name='gejala[]' ID_Gejala='item[]' value='$dg[ID_Gejala]'></td>
										<td class='text-left text-error' style='color:black;' width='98%'>$dg[Nama_Gejala]</td>		
		
                                    </tr>";
                                    }
                                    ?>
                                </table>
                                <div>
                                    <input type="submit" class="btn btn-primary" value="Lakukan Identifikasi">
                                </div>


                            </form>

                    </div>


                </div>

            </div>

        </div>

    </div>

    <br><br><br><br>
</body>

</html>