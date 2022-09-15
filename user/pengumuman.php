<!doctype html>
<html class="no-js" lang="en">

<?php 
    include '../dbconnect.php';
    include '../cek.php';
    if($role!=='User'){
        header("location:../login.php");
    };
    $userid = $_SESSION['userid'];

    include 'submit.php';

    //cek dulu sudah pernah submit belum
    $cekdulu = mysqli_query($conn,"select * from userdata where userid='$userid'");
    $ambil = mysqli_fetch_array($cekdulu);
    $status = $ambil['status'];
    
	?>



<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pengumuman Siswa</title>
    <link rel="icon" type="image/png" href="../assets/img/Logo_SMAN3.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    
    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	
    <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <a><img src="../assets/img/user.png" alt="logo" width="25%"></a>
                <a class="text-light"><?= $_SESSION['usernama']; ?> </a>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
							<li ><a href="index.php"><i class="ti-home"></i><span>Dashboard</span></a></li>
                            <li>
                                <a href="daftar.php"><i class="ti-pencil-alt"></i><span>Pendaftaran</span></a>
                            </li>
                            <li class="active">
                                <a href="pengumuman.php"><i class="ti-announcement"></i><span>Pengumuman</span></a>
                            </li>
                            <?php if($status=='Lolos'){ ?>
                            <li>
                                <a href="berkas.php"><i class="ti-file"></i><span>Kelengkapan Berkas</span></a>
                            </li>
                            <?php } ?> 
                            <li>
                                <a href="#" data-toggle="modal" data-target="#logoutModal"><i class="ti-power-off"></i> <span>Logout</span></a>
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Ingin Keluar ?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih "Logout" Jika Anda Ingin Keluar</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="../logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h3><div class="date">
								<script type='text/javascript'>
						// <!--
						var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var thisDay = date.getDay(),
							thisDay = myDays[thisDay];
						var yy = date.getYear();
						var year = (yy < 1000) ? yy + 1900 : yy;
						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);		
						//-->
						</script></b></div></h3>

						</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
			
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                <div class="col-12">
                         <!-- Illustrations -->
                         
                         <?php if($status=='Proses'){ ?>
       
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h5 class="m-0 font-weight-bold text-primary">PENGUMUMAN HASIL SELEKSI</h5>
                            </div>
                            
                            <div class="card-body">
                                <div class="card text-center">
                                    <div class="card-body">
                                    <h5 class="card-title mb-4">PROSES PENILAIAN</h5>   
                                    <div class="col-auto">
                                    <i class="fas fa-spinner text-primary mb-4" style="font-size : 90px;"></i>   
                                    </div>
                                    <p class="card-text"> Terima Kasih Telah Melakukan Pendaftaran di SMAN 3 Tambun Selatan <br> Untuk Pengumuman Hasil Seleksi akan diumumkan pada tanggal :</p>
                                    <span class="badge badge-primary" style="font-size : 15px;">10 Agustus 2021</span>
                                    </div>
                                </div>     
                            </div>
                            <div class="card-footer">
                                <marquee>SMA NEGERI 3 TAMBUN SELATAN</marquee>
                            </div>
                        </div>

                        <?php } ?>

                        <?php if($status=='Lolos'){ ?>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h5 class="m-0 font-weight-bold text-primary">PENGUMUMAN HASIL SELEKSI</h5>
                            </div>
                            
                            <div class="card-body">
                                <div class="card text-center">
                                    <div class="card-body">
                                    <h5 class="card-title mb-4">SELAMAT ANDA LOLOS</h5>   
                                    <div class="col-auto">
                                    <i class="far fa-check-circle text-success mb-4" style="font-size : 90px;"></i>   
                                    </div>
                                    <p class="card-text"> Terima Kasih Telah Melakukan Pendaftaran di SMAN 3 Tambun Selatan <br> Untuk Pengisian Kelengkapan Berkas sampai tanggal :</p>
                                    <span class="badge badge-primary" style="font-size : 15px;">20 Agustus 2021</span>
                                    </div>
                                </div>     
                            </div>
                            <div class="card-footer">
                                <marquee>SMA NEGERI 3 TAMBUN SELATAN</marquee>
                            </div>

                            <?php } ?>

                        
                        <?php if($status=='Tidak Lolos'){ ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h5 class="m-0 font-weight-bold text-primary">PENGUMUMAN HASIL SELEKSI</h5>
                            </div>
                            
                            <div class="card-body">
                                <div class="card text-center">
                                    <div class="card-body">
                                    <h5 class="card-title mb-4">MOHON MAAF ANDA TIDAK LOLOS</h5>   
                                    <div class="col-auto">
                                    <i class="far fa-times-circle text-danger mb-4" style="font-size : 90px;"></i>   
                                    </div>
                                    <p class="card-text"> Mohon Maaf Anda Belum Lolos<br>Terima Kasih Telah Melakukan Seleksi Pendaftaran di SMAN 3 Tambun Selatan </p>
                                    </div>
                                </div>     
                            </div>
                            <div class="card-footer">
                                <marquee>SMA NEGERI 3 TAMBUN SELATAN</marquee>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
            
                </div>
                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>Penerimaan Siswa Baru Online - SMAN 3 Tambun Selatan</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <!-- jquery latest version -->
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="../assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="../assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
</body>

</html>
