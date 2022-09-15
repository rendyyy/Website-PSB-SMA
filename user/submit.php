<?php

if(isset($_POST['submit'])){
        $nisn = $_POST['nisn'];
        $nik = $_POST['nik'];
        $namalengkap = $_POST['namalengkap'];
        $kelamin = $_POST['jeniskelamin'];
        $userid = $_POST['id'];

        $tempatlahir = $_POST['tempatlahir'];
        $tgllahir = $_POST['tgllahir'];
        $alamat = $_POST['alamat'];
        $provinsi = $_POST['provinsi'];
        $kota = $_POST['kota'];
        $kecamatan = $_POST['kecamatan'];
        $kelurahan = $_POST['kelurahan'];

        $agama = $_POST['agama'];
        $telepon = $_POST['telepon'];

        $ayahnik = $_POST['ayahnik'];
        $ayahnama = $_POST['ayahnama'];
        $ayahpendidikan = $_POST['ayahpendidikan'];
        $ayahpekerjaan = $_POST['ayahpekerjaan'];
        $ayahpenghasilan = $_POST['ayahpenghasilan'];
        $ayahtelepon = $_POST['ayahtelepon'];

        $ibunik = $_POST['ibunik'];
        $ibunama = $_POST['ibunama'];
        $ibupendidikan = $_POST['ibupendidikan'];
        $ibupekerjaan = $_POST['ibupekerjaan'];
        $ibupenghasilan = $_POST['ibupenghasilan'];
        $ibutelepon = $_POST['ibutelepon'];

        $walinik = $_POST['walinik'];
        $walinama = $_POST['walinama'];
        $walipekerjaan = $_POST['walipekerjaan'];
        $walipenghasilan = $_POST['walipenghasilan'];
        $walitelepon = $_POST['walitelepon'];

        $sekolahnpsn = $_POST['sekolahnpsn'];
        $sekolahnama = $_POST['sekolahnama'];
        $sekolahujian = $_POST['sekolahujian'];
        $foto = 'foto_'.$nisn;
        $sertifikat = 'sertifikat_'.$nisn;

        //perihal gambar
        $nama_file_foto = $_FILES['foto']['name'];
        $nama_file_sertif = $_FILES['sertifikat']['name'];
        $ext1 = pathinfo($nama_file_foto, PATHINFO_EXTENSION);
        $ext2 = pathinfo($nama_file_sertif, PATHINFO_EXTENSION);
        $ukuran_file_foto = $_FILES['foto']['size'];
        $ukuran_file_sertif = $_FILES['sertifikat']['size'];
        $ukurantotalsiswa = $ukuran_file_foto + $ukuran_file_sertif;
        $tipe_file = $_FILES['foto']['type'];
        $tmp_file = $_FILES['foto']['tmp_name'];
        $tmp_file2 = $_FILES['sertifikat']['tmp_name'];
        $path_foto = $foto.'.'.$ext1;
        $path_sertif = $sertifikat.'.'.$ext2;
        
        if($_FILES['sertifikat']['tmp_name'] == NULL){
          $path_sertif = "";
        }

        if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
          if($ukurantotal <= 1000000){ 
            $upload = move_uploaded_file($tmp_file,"images/foto/".$path_foto);
            $upload2 = move_uploaded_file($tmp_file2,"images/sertifikat/".$path_sertif);
            if($upload||$upload2){ 
            
                $submitdata = mysqli_query($conn,"insert into userdata (userid, nisn, nik, namalengkap, jeniskelamin, tempatlahir, tanggallahir, alamat, provinsi, kabupaten, kecamatan, kelurahan, agama, telepon, ayahnik, ayahnama, ayahpendidikan, ayahpekerjaan, ayahpenghasilan, ayahtelepon, ibunik, ibunama, ibupendidikan, ibupekerjaan, ibupenghasilan, ibutelepon, walinik, walinama, walipekerjaan, walipenghasilan, walitelepon, sekolahnpsn, sekolahnama, sekolahujian, foto, sertifikat) 
                values('$userid','$nisn','$nik','$namalengkap','$kelamin','$tempatlahir','$tgllahir','$alamat','$provinsi','$kota','$kecamatan','$kelurahan','$agama','$telepon','$ayahnik','$ayahnama','$ayahpendidikan','$ayahpekerjaan','$ayahpenghasilan','$ayahtelepon','$ibunik','$ibunama','$ibupendidikan','$ibupekerjaan','$ibupenghasilan','$ibutelepon','$walinik','$walinama','$walipekerjaan','$walipenghasilan','$walitelepon','$sekolahnpsn','$sekolahnama','$sekolahujian', '$path_foto','$path_sertif')");
                
              if($submitdata){ 

                //berhasil bikin
                echo " <div class='alert alert-success'>
                        Berhasil submit data.
                    </div>
                    <meta http-equiv='refresh' content='2; url= daftar.php'/>  ";  

              }else{

                echo "<div class='alert alert-warning'>
                        Gagal submit data. Silakan coba lagi nanti.
                    </div>
                    <meta http-equiv='refresh' content='3; url= daftar.php'/> ";
                }
            }else{
              // Jika gambar gagal diupload, Lakukan :
              echo "Maaf, Terdapat masalah pada upload foto";
              echo "<br><meta http-equiv='refresh' content='5; URL=daftar.php'>";
            }
          }else{
            // Jika ukuran file lebih dari 1MB, lakukan :
            echo "Maaf, ukuran foto yang diperbolehkan tidak lebih dari 1MB";
            echo "<br><meta http-equiv='refresh' content='5; URL=daftar.php'>";
          }
        }else{
          // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
          echo "Maaf, gambar harus berformat JPG/PNG.";
          echo "<br><meta http-equiv='refresh' content='5; URL=daftar.php'>";
        }

    };




    //kalau update
    if(isset($_POST['update'])){
      $id = $_POST['id'];
      $alamat = $_POST['alamat'];
      $telepon = $_POST['telepon'];
      $ayahpendidikan = $_POST['ayahpendidikan'];
        $ayahpekerjaan = $_POST['ayahpekerjaan'];
        $ayahpenghasilan = $_POST['ayahpenghasilan'];
        $ayahtelepon = $_POST['ayahtelepon'];
      $ibupendidikan = $_POST['ibupendidikan'];
        $ibupekerjaan = $_POST['ibupekerjaan'];
        $ibupenghasilan = $_POST['ibupenghasilan'];
        $ibutelepon = $_POST['ibutelepon'];

      $walinik = $_POST['walinik'];
        $walinama = $_POST['walinama'];
        $walipekerjaan = $_POST['walipekerjaan'];
        $walipenghasilan = $_POST['walipenghasilan'];
        $walitelepon = $_POST['walitelepon'];

    $update = mysqli_query($conn,"update userdata
    set alamat='$alamat', telepon='$telepon', ayahpendidikan='$ayahpendidikan', ayahpenghasilan='$ayahpenghasilan', ayahpekerjaan='$ayahpekerjaan',
    ayahtelepon='$ayahtelepon', ibupendidikan='$ibupendidikan', ibupekerjaan='$ibupekerjaan', ibupenghasilan='$ibupenghasilan', ibutelepon='$ibutelepon',
    walinik='$walinik', walinama='$walinama', walipekerjaan='$walipekerjaan',$walipenghasilan = 'walipenghasilan', walitelepon='$walitelepon' where userid='$id'");

    if($update){ 

      //berhasil bikin
      echo " <div class='alert alert-success'>
              Berhasil submit data.
          </div>
          <meta http-equiv='refresh' content='1; url= mydata.php'/>  ";  

    }else{

      echo "<div class='alert alert-warning'>
              Gagal submit data. Silakan coba lagi nanti.
          </div>
          <meta http-equiv='refresh' content='3; url= mydata.php'/> ";
      }

    };



    
//get timezone jkt
date_default_timezone_set("Asia/Bangkok");
$today = date("Y-m-d"); //now

    //kalau konfirmasi
    if(isset($_POST['ok'])){
      $id = $_POST['id'];
      $updateaja = mysqli_query($conn,"update userdata set status='Proses', tglkonfirmasi='$today' where userid='$id'");

      if($updateaja){
        //berhasil bikin
          echo " <div class='alert alert-success'>
          Berhasil submit data.
      </div>
      <meta http-equiv='refresh' content='1; url= mydata.php'/>  ";  
      } else {
        echo "<div class='alert alert-warning'>
              Gagal submit data. Silakan coba lagi nanti.
          </div>
          <meta http-equiv='refresh' content='3; url= mydata.php'/> ";
      }
    };

    if(isset($_POST['kirim'])){
			$id= $_POST['userid'];
			$ekstensi_diperbolehkan	= array('png','jpg');
			$kk = $_FILES['kk']['name'];
      $akta = $_FILES['akta']['name'];
      $ijazah = $_FILES['ijazah']['name'];
			$x = explode('.', $kk);
      $y = explode('.', $akta);
      $z = explode('.', $ijazah);
			$ekstensikk = strtolower(end($x));
      $ekstensiakta = strtolower(end($y));
      $ekstensiijazah = strtolower(end($z));
			$ukurankk	= $_FILES['kk']['size'];
      $ukuranakta	= $_FILES['akta']['size'];
      $ukuranijazah = $_FILES['ijazah']['size'];
      $ukurantotalberkas = $ukurankk + $ukuranakta + $ukuranijazah ;
			$file_tmpkk = $_FILES['kk']['tmp_name'];
      $file_tmpakta = $_FILES['akta']['tmp_name'];
      $file_tmpijazah = $_FILES['ijazah']['tmp_name'];	
 
			if(in_array($ekstensikk, $ekstensi_diperbolehkan) === true){
				if($ukurantotalberkas < 5044070){			
					$uploadkk = move_uploaded_file($file_tmpkk, 'images/kartukeluarga/'.$kk);
                    $uploadakta = move_uploaded_file($file_tmpakta, 'images/aktakelahiran/'.$akta);
                    $uploadijazah = move_uploaded_file($file_tmpijazah, 'images/ijazah/'.$ijazah);
					
                    $query = mysqli_query($conn,"INSERT INTO berkas(userid,kartukeluarga, aktakelahiran, ijazah, statusberkas) VALUES('$userid','$kk','$akta','$ijazah','Tersimpan')");
					
                    if($query){
						echo 'FILE BERHASIL DI UPLOAD';
					}else{
						echo 'GAGAL MENGUPLOAD GAMBAR';
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		};
?>