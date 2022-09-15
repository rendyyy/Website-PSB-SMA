<?php
include('../dbconnect.php');
include('submit.php');
$u = $_GET['u'];

$cekdulu = mysqli_query($conn,"select * from userdata where nisn='$u'");
    $ambil = mysqli_fetch_array($cekdulu);
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

    
if($ambil['sertifikat'] != NULL ) {
    
    $cetaksertif = "SERTIFIKAT";
    $sertif = 'images/sertifikat/'.$ambil['sertifikat'];
    
} else {
    $cetaksertif = " ";
    $sertif = NULL ;
}

require("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($conn,"select * from userdata where nisn='$u'");

$html = 
'
<img src ="../assets/img/Logo_SMAN3.png" style="float: left;height: 70px">

<div style="text-align: center">
    <div style="font-size: 20px">Formulir Pendaftaran Siswa Baru Tahun 2021</div>
    <div style="font-size: 25px">SMA NEGERI 3 TAMBUN SELATAN</div>
    <div style="font-size: 14px">Perum Graha Prima No.1 Mangunjaya Tambun Selatan Kabupaten Bekasi, Jawa Barat</div>
</div> <hr>';


$html .= 
'
<style>
table, th, td {
    padding: 5px;

}
</style>

<h2>DATA PRIBADI</h2>
<br>
<img src="images/foto/'. $ambil['foto'].'" width="120px">

<table width="100%">
<tr>
    <td width="25%">NISN</td>
    <td width="1%">:</td>
    <td width="60%">'.$u.'</td>
</tr>

<tr>
    <td>NIK</td>
    <td>:</td>
    <td>'.$ambil['nik'].'</td>
</tr>

<tr>
    <td>Nama Lengkap</td>
    <td>:</td>
    <td>'.$ambil['namalengkap'].'</td>
</tr>

<tr>
    <td>Jenis Kelamin</td>
    <td>:</td>
    <td>'.$ambil['jeniskelamin'].'</td>
</tr>

<tr>
    <td>Tempat Lahir</td>
    <td>:</td>
    <td>'.$ambil['tempatlahir'].'</td>
</tr>

<tr>
    <td>Tanggal Lahir</td>
    <td>:</td>
    <td>'.$ambil['tanggallahir'].'</td>
</tr>

<tr>
    <td>Alamat Lengkap</td>
    <td>:</td>
    <td>'.$ambil['alamat'].'</td>
</tr>

<tr>
    <td>Provinsi</td>
    <td>:</td>
    <td>'.$prov.'</td>
</tr>

<tr>
    <td>Kota/Kabupaten</td>
    <td>:</td>
    <td>'.$kab.'</td>
</tr>

<tr>
    <td>Kecamatan</td>
    <td>:</td>
    <td>'.$kec.'</td>
</tr>

<tr>
    <td>Kelurahan</td>
    <td>:</td>
    <td>'.$kel.'</td>
</tr>

<tr>
    <td>Agama</td>
    <td>:</td>
    <td>'.$ambil['agama'].'</td>
</tr>

<tr>
    <td>No Telepon</td>
    <td>:</td>
    <td>'.$ambil['telepon'].'</td>
</tr>

</table>

<h2>DATA ORANG TUA / WALI</h2>

<table width="100%">
<tr>
    <td width="25%">NIK Ayah</td>
    <td width="1%">:</td>
    <td width="60%">'.$ambil['ayahnik'].'</td>
</tr>

<tr>
    <td>Nama Ayah</td>
    <td>:</td>
    <td>'.$ambil['ayahnama'].'</td>
</tr>

<tr>
    <td>Pendidikan Ayah</td>
    <td>:</td>
    <td>'.$ambil['ayahpendidikan'].'</td>
</tr>

<tr>
    <td>Pekerjaan Ayah</td>
    <td>:</td>
    <td>'.$ambil['ayahpekerjaan'].'</td>
</tr>

<tr>
    <td>Penghasilan Ayah per bulan</td>
    <td>:</td>
    <td>'.$ambil['ayahpenghasilan'].'</td>
</tr>

<tr>
    <td>No Telepon Ayah</td>
    <td>:</td>
    <td>'.$ambil['ayahtelepon'].'</td>
</tr>
<hr>
</table>

<table width="100%">
<tr>
    <td width="25%">NIK Ibu</td>
    <td width="1%">:</td>
    <td width="60%">'.$ambil['ibunik'].'</td>
</tr>

<tr>
    <td>Nama Ibu</td>
    <td>:</td>
    <td>'.$ambil['ibunama'].'</td>
</tr>

<tr>
    <td>Pendidikan Ibu</td>
    <td>:</td>
    <td>'.$ambil['ibupendidikan'].'</td>
</tr>

<tr>
    <td>Pekerjaan Ibu</td>
    <td>:</td>
    <td>'.$ambil['ibupekerjaan'].'</td>
</tr>

<tr>
    <td>Penghasilan Ibu per bulan</td>
    <td>:</td>
    <td>'.$ambil['ibupenghasilan'].'</td>
</tr>

<tr>
    <td>No Telepon Ibu</td>
    <td>:</td>
    <td>'.$ambil['ibutelepon'].'</td>
</tr>
<hr>
</table>

<table width="100%">
<tr>
    <td width="25%">NIK Wali</td>
    <td width="1%">:</td>
    <td width="60%">'.$ambil['walinik'].'</td>
</tr>

<tr>
    <td>Nama Wali</td>
    <td>:</td>
    <td>'.$ambil['walinama'].'</td>
</tr>

<tr>
    <td>Pekerjaan Wali</td>
    <td>:</td>
    <td>'.$ambil['walipekerjaan'].'</td>
</tr>

<tr>
    <td>Penghasilan Wali per bulan</td>
    <td>:</td>
    <td>'.$ambil['walipenghasilan'].'</td>
</tr>

<tr>
    <td>No Telepon Wali</td>
    <td>:</td>
    <td>'.$ambil['walitelepon'].'</td>
</tr>

</table>

<h2>DATA SEKOLAH ASAL DAN BERKAS</h2>

<table width="100%">
<tr>
    <td width="25%">NPSN Sekolah Asal</td>
    <td width="1%">:</td>
    <td width="60%">'.$ambil['sekolahnpsn'].'</td>
</tr>

<tr>
    <td>Nama Sekolah Asal</td>
    <td>:</td>
    <td>'.$ambil['sekolahnama'].'</td>
</tr>

<tr>
    <td>Nilai Ujian Sekolah</td>
    <td>:</td>
    <td>'.$ambil['sekolahujian'].'</td>
</tr>

</table>


<h2>'.$cetaksertif.'</h2>
<img src ="'.$sertif.'" width="350px">

';

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream($u.'_'.$ambil['namalengkap'].'.pdf');
?>
