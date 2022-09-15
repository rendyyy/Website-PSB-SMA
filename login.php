<?php
session_start();
include 'dbconnect.php';
$alert = '';

if(isset($_SESSION['role'])){
	$role = $_SESSION['role'];

	if($role=='Admin'){
		header("location:admin");
	} else {
		header("location:user");
	}
	
}


if(isset($_POST['btn-login']))
{
 $email = mysqli_real_escape_string($conn,$_POST['email']);
 $password = mysqli_real_escape_string($conn,$_POST['password']);

 // menyeleksi data user dengan username dan password yang sesuai
$cariadmin = mysqli_query($conn,"select * from admin where adminemail='$email' and adminpassword='$password';");
$cariuser = mysqli_query($conn,"select * from user where useremail='$email' and userpassword='$password';");

// menghitung jumlah data yang ditemukan
$cekadmin = mysqli_num_rows($cariadmin);
$cekuser = mysqli_num_rows($cariuser);
 
// cek apakah username dan password di temukan pada database
	if($cekadmin > 0){
	
	//jika admin
	$data = mysqli_fetch_assoc($cariadmin);
 
		// buat session login dan username
		$_SESSION['email'] = $data['adminemail'];
		$_SESSION['role'] = "Admin";
		header("location:admin");
 	} else if($cekuser > 0){
	//jika user biasa
	$data = mysqli_fetch_assoc($cariuser);
 
		// buat session login dan username
		$_SESSION['email'] = $data['useremail'];
		$_SESSION['userid'] = $data['userid'];
        $_SESSION['usernama'] = $data['usernama'];
		$_SESSION['role'] = "User";
		header("location:user");
	} else {
	//jika user tidak ditemukan
	echo "<div class='alert alert-warning'>Username atau Password salah</div>
    <meta http-equiv='refresh' content='2'>";
	}
 
}


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Aplikasi Penerimaan Siswa Baru Online SMAN 3 Tambun Selatan">
    <meta name="author" content="">

    <title>Login - Penerimaan Siswa Baru</title>

	<link rel="icon" type="image/png" href="assets/img/Logo_SMAN3.png">

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

	<style>
		.img-logo{
			max-height: 150px;
			margin-bottom: 20px;
		}
	</style>

</head>

<body class="bg-info">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="p-5">
                                    <div class="text-center">
										<img src="assets/img/Logo_SMAN3.png" alt="logo SMAN 3 Tambun Selatan" class="img-logo">
                                        <h1 class="h3 text-gray-900 "><b>LOGIN PENERIMAAN SISWA BARU</h1>
										<h1 class="h3 text-gray-900 mb-4"><b>SMAN 3 TAMBUN SELATAN</h1>
                                    </div>
                                    <form method="post">
										<div class="form-group">
											<input type="email" class="form-control" placeholder="Email" name="email" autofocus required>
										</div>
										<div class="form-group">
											<input type="password" class="form-control" placeholder="Password" name="password" required>
										</div>
										<button type="submit" class="btn btn-primary btn-user btn-block" name="btn-login">MASUK</button>
                                    </form>
									<br>
                                    <div class="text-center">
										
                                        <a >Belum Mempunyai Akun ? <a href="register.php"> Daftar Disini</a> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>