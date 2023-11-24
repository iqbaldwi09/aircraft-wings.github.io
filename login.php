<?php
session_start();
include "koneksi.php";
?>

<div class="container ">

    <!-- Outer Row -->
    <div class="row justify-content-center ">

        <div class="col-xl-5 col-lg-7 col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Silahkan Melakukan Login</h1>
                        </div>
                        <form class="user" method="post" action="loginaksi.php">
                            <div class="mb-3">
                                <label for="exampleDropdownFormEmail2" class="form-label">Username</label>
                                <input name="username" placeholder="Username" required type="text" class="form-control form-control-user" placeholder="Masukkan username...">
                            </div>
                            <div class="mb-3">
                                <label for="exampleDropdownFormPassword2" class="form-label">Password</label>
                                <input name="password" placeholder="Password" required type="password" class="form-control form-control-user" placeholder="Masukkan Password...">
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary btn-user btn-block" name="Submit" value="LOGIN"></input>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
</div>