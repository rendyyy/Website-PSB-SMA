<!doctype html>
<html class="no-js" lang="en">

<?php 
    include '../dbconnect.php';
    include '../cek.php';
    if($role!=='Admin'){
        header("location:../login.php");
    };

    include '../user/submit.php';
    $userid = $_GET['u'];



    //cek dulu sudah pernah submit belum
    $cekdulu = mysqli_query($conn,"select * from userdata where userid='$userid'");
    $ambil = mysqli_fetch_array($cekdulu);

    $cekberkas = mysqli_query($conn,"select * from berkas where userid='$userid'");
    $ambilberkas = mysqli_fetch_array($cekberkas);

	?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tampilkan Formulir Siswa - SMAN 3 Tambun Selatan</title>
    <link rel="icon" type="image/png" href="../assets/img/Logo_SMAN3.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    
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
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
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
                <a><img src="../assets/img/user.png" alt="logo" width="30%"></a>
                <a class="text-light">ADMIN</a>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
							<li><a href="index.php"><i class="ti-home"></i><span>Dashboard</span></a></li>
                            <li class="active">
                                <a href="form.php"><i class="ti-file"></i><span>Formulir</span></a>
                            </li>
                            <li>
                                <a href="user.php"><i class="ti-user"></i><span>Siswa Terdaftar</span></a>
                            </li>
                            <li>
                                <a href="admin.php"><i class="ti-user"></i><span>Kelola Admin</span></a>
                            </li>
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
                            <span aria-hidden="true">??</span>
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

						</script></b></div></h3>

						</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
			
            <!-- page title area end -->
            <div class="main-content-inner">

                <!-- panduan -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                    <a href="form.php" class="btn btn-info" style="margin-bottom:2%;">Kembali</a>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2><?php echo $ambil['namalengkap']?></h2>
                                </div>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive">
                                    <?php echo "<img src='../user/images/foto/".$ambil['foto']."'style= width:150px;'>"?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


<!------------------ Pemisah ------------------->


            <form method="post" enctype="multipart/form-data">
                <!-- formulir -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Data Pribadi</h2>
                                </div>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive" style="overflow-x:hidden;">
                                    
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>NISN</label>
                                                <input name="nisn" type="text" class="form-control" maxlength="12" value="<?php echo $ambil['nisn']?>" disabled>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>NIK</label>
                                                <input name="nik" type="text" class="form-control" maxlength="16" value="<?php echo $ambil['nik']?>" disabled>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input name="namalengkap" type="text" class="form-control" maxlength="50" value="<?php echo $ambil['namalengkap']?>" disabled>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select class="form-control" name="jeniskelamin" disabled>
                                                <?php $jk = $ambil['jeniskelamin'];
                                                if($jk=='L'){
                                                    echo '<option>Laki-laki</option>';
                                                } else {
                                                    echo '<option>Perempuan</option>';
                                                };
                                                ?>
                                            </select>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Tempat Lahir</label>
                                                <input name="tempatlahir" type="text" class="form-control" maxlength="20" value="<?php echo $ambil['tempatlahir']?>" disabled>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input name="tgllahir" type="date" class="form-control" value="<?php echo $ambil['tanggallahir']?>" disabled>
                                            </div>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                                <label>Alamat Lengkap</label>
                                                <input name="alamat" type="text" class="form-control" placeholder="Alamat" value="<?php echo $ambil['alamat']?>" disabled>
                                            </div>

                                            <?php
                                            //get alamat
                                            $ambilprov = $ambil['provinsi'];
                                            $prov1 = mysqli_query($conn,"select name from provinces where id='$ambilprov'");
                                            $prov = mysqli_fetch_array($prov1)['name'];
                                            $ambilkota = $ambil['kabupaten'];
                                            $kab1 = mysqli_query($conn,"select name from regencies where id='$ambilkota'");
                                            $kab = mysqli_fetch_array($kab1)['name'];
                                            $ambilkec = $ambil['kecamatan'];
                                            $kec1 = mysqli_query($conn,"select name from districts where id='$ambilkec'");
                                            $kec = mysqli_fetch_array($kec1)['name'];
                                            $ambilkel = $ambil['kelurahan'];
                                            $kel1 = mysqli_query($conn,"select name from villages where id='$ambilkel'");
                                            $kel = mysqli_fetch_array($kel1)['name'];

                                            ?>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                            <label>Provinsi:</label>
                                            <input type="text" class="form-control" value="<?php echo $prov; ?>" disabled>
                                        </div>
                                        </div>
                                        <div class="col">
                                        <div class="form-group">
                                            <label>Kota/Kabupaten:</label>
                                            <input type="text" class="form-control" value="<?php echo $kab; ?>" disabled>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                        <div class="form-group">
                                            <label>Kecamatan:</label>
                                            <input type="text" class="form-control" value="<?php echo $kec; ?>" disabled>
                                        </div>
                                        </div>
                                        <div class="col">
                                        <div class="form-group">
                                            <label>Kelurahan:</label>
                                            <input type="text" class="form-control" value="<?php echo $kel; ?>" disabled>
                                        </div>
                                        </div>
                                    </div>
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Agama</label>
                                                <input type="text" class="form-control" value="<?php echo $ambil['agama']?>" disabled>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>No Telepon</label>
                                                <input name="telepon" type="text" class="form-control" maxlength="15" value="<?php echo $ambil['telepon']?>" disabled>
                                            </div>
                                            </div>
                                        </div>
                                            
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                

                    <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Data Orang Tua</h2>
                                </div>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive" style="overflow-x:hidden;">
                                        
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>NIK Ayah</label>
                                                <input name="ayahnik" type="text" class="form-control" value="<?php echo $ambil['ayahnik']?>" disabled>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nama Ayah</label>
                                                <input name="ayahnama" type="text" class="form-control" value="<?php echo $ambil['ayahnama']?>" disabled>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Pendidikan Ayah</label>
                                                <select class="form-control" name="ayahpendidikan" disabled>
                                                <option selected value="<?php echo $ambil['ayahpendidikan']?>"><?php echo $ambil['ayahpendidikan']?></option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Pekerjaan Ayah</label>
                                                <select class="form-control" name="ayahpekerjaan" disabled>
                                                <option selected value="<?php echo $ambil['ayahpekerjaan']?>"> <?php echo $ambil['ayahpekerjaan']?></option>
                                                </select>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Penghasilan Ayah per bulan</label>
                                                <select class="form-control" name="ayahpenghasilan" disabled>
                                                <option selected value="<?php echo $ambil['ayahpenghasilan']?>"><?php echo $ambil['ayahpenghasilan']?></option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>No Telepon Ayah</label>
                                                <input name="ayahtelepon" type="text" class="form-control" maxlength="15" value="<?php echo $ambil['ayahtelepon']?>" disabled>
                                            </div>
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        <br>


                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>NIK Ibu</label>
                                                <input name="ibunik" type="text" class="form-control" value="<?php echo $ambil['ibunik']?>" disabled>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nama Ibu</label>
                                                <input name="ibunama" type="text" class="form-control" value="<?php echo $ambil['ibunama']?>" disabled>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Pendidikan Ibu</label>
                                                <select class="form-control" name="ibupendidikan" disabled>
                                                    <option selected value="<?php echo $ambil['ibupendidikan']?>"><?php echo $ambil['ibupendidikan']?></option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Pekerjaan Ibu</label>
                                                <select class="form-control" name="ibupekerjaan" disabled>
                                                    <option selected value="<?php echo $ambil['ibupekerjaan']?>"> <?php echo $ambil['ibupekerjaan']?></option>
                                                </select>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Penghasilan Ibu per bulan</label>
                                                <select class="form-control" name="ibupenghasilan" disabled>
                                                <option selected value="<?php echo $ambil['ibupenghasilan']?>"><?php echo $ambil['ibupenghasilan']?></option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>No Telepon Ibu</label>
                                                <input name="ibutelepon" type="text" class="form-control" maxlength="15" value="<?php echo $ambil['ibutelepon']?>" disabled>
                                            </div>
                                            </div>
                                        </div>

                                        <br>
                                        <hr>
                                        <br>


                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>NIK Wali</label>
                                                <input name="walinik" type="text" class="form-control"  value="<?php echo $ambil['walinik']?>" maxlength="16" disabled>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nama Wali</label>
                                                <input name="walinama" type="text" class="form-control"  value="<?php echo $ambil['walinama']?>" maxlength="40" disabled>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Pekerjaan Wali</label>
                                                <select class="form-control" name="walipekerjaan" disabled>
                                                    <option selected value="<?php echo $ambil['walipekerjaan']?>"><?php echo $ambil['walipekerjaan']?></option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Penghasilan Wali per bulan</label>
                                                <select class="form-control" name="walipenghasilan" disabled>
                                                <option selected value="<?php echo $ambil['walipenghasilan']?>"><?php echo $ambil['walipenghasilan']?></option>
                                                </select>
                                            </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>No Telepon Wali</label>
                                                <input name="walitelepon" type="text" class="form-control" maxlength="15" value="<?php echo $ambil['walitelepon']?>" disabled>
                                                <input type="hidden" value="<?=$userid;?>" name="id">
                                            </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Data Sekolah Asal & Berkas</h2>
                                </div>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive" style="overflow-x:hidden;">
                                        
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>NPSN Sekolah Asal</label>
                                                <input name="sekolahnpsn" type="text" class="form-control"  value="<?php echo $ambil['sekolahnpsn']?>" disabled>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nama Sekolah Asal</label>
                                                <input name="sekolahnama" type="text" class="form-control" value="<?php echo $ambil['sekolahnama']?>" disabled>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Nilai Ujian Sekolah</label>
                                                <input name="sekolahujian" type="text" class="form-control" value="<?php echo $ambil['sekolahujian']?>" disabled>
                                            </div>
                                            </div>
                                        </div>

                                        
                                        <?php if($ambil ['sertifikat'] != NULL ) {?>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                        <label for="sertifikat" class=" form-control-label"><b>Sertifikat</b></label>
                                                        <br><?php echo "<img src='../user/images/sertifikat/".$ambil['sertifikat']."'style= width:600px;' alt= 'Tidak Ada Sertifikat'>"?>
                                                    </div>
                                                </div>                                            
                                        </div>
                                        <?php } ?>

                                        <?php if($ambilberkas ['kartukeluarga'] != NULL ) {?>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                        <label for="kartukeluarga" class=" form-control-label">Kartu Keluarga </label>
                                                        <br><?php echo "<img src='../user/images/kartukeluarga/".$ambilberkas['kartukeluarga']."'style= width:600px;'>"?>
                                                    </div>
                                                </div>
                                        </div>
                                        <?php } ?>
                                        
                                        <?php if($ambilberkas ['aktakelahiran'] != NULL ) {?>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                        <label for="aktakelahiran" class=" form-control-label">Akta Kelahiran </label>
                                                        <br><?php echo "<img src='../user/images/aktakelahiran/".$ambilberkas['aktakelahiran']."'style= width:600px;' alt= 'Tidak Ada Akta Kelahiran'>"?>
                                                    </div>
                                                </div>
                                        </div>
                                        <?php } ?>

                                        <?php if($ambilberkas ['ijazah'] != NULL ) {?>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                        <label for="ijazah" class=" form-control-label">Ijazah </label>
                                                        <br><?php echo "<img src='../user/images/ijazah/".$ambilberkas['ijazah']."'style= width:600px;' alt= 'Tidak Ada Ijazah'>"?>
                                                    </div>
                                                </div>
                                        </div>    
                                        <?php } ?>

                                        <div class="modal-footer">
                                            <a href="report.php?u=<?php echo $ambil['nisn']?>" class="btn btn-primary">Lihat Bukti Pendaftaran</a>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>

            </form>

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
