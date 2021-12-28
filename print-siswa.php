<?php
include 'code crud/logo.php';
include 'code crud/config.php';
require_once __DIR__ . '/vendor/autoload.php';

if(isset($_GET['id'])){
    $sql = mysqli_query($connect, "SELECT * FROM data_siswa WHERE no_id = '$_GET[id]' ");
    $data = mysqli_fetch_array($sql);
    if($data) {
    // Data Siswa
    $no_id = $data['no_id'];
    $nama_atlet = $data['nama_atlet'];
    $tgl_reg = $data['tgl_reg'];
    $ttl = $data['ttl'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $bb = $data['bb'];
    $tb = $data['tb'];
    $no_hp = $data['no_hp'];
    $tingkat = $data['tingkat'];
    $kelas = $data['kelas'];
    $foto_siswa = $data['foto_siswa'];
    // Data Ayah
    $nama_wali = $data['nama_wali'];
    $no_hpwali = $data['no_hpwali'];
    $alamat_wali = $data['alamat_wali'];

} }

    $sekolah = mysqli_query($connect, "SELECT * FROM profil_sekolah WHERE no_id = '1' ");
    $data1 = mysqli_fetch_array($sekolah);
    if($data1) {
     $nama_sekolah = $data1['nama_sekolah'];
     $alamat_sekolah = $data1['alamat_sekolah'];
     $no_tlp = $data1['no_tlp'];
     $kepsek = $data1['kepsek'];
     $nis_kepsek = $data1['nis_kepsek'];
     $wakil_kepsek = $data1['wakil_kepsek'];
     $nis_wakil = $data1['nis_wakil'];
     $logo_sekolah = $data1['logo_sekolah'];
     $logo_awal = $data1['logo_sekolah'];
 }

$nama = 'adi';
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Print Siswa</title>
</head>
    <style>
        body { font-family: Times New Roman;}
        .logo { width : 100px;}
            hr { border-color : black; color : black;}
        .foto-siswa {
            display: block;
            margin-left: 263px;
            width: 150px;
        }
    </style>
<body>
<table width="100%">
        <tr>
            <td style="width:150px;"><img src="logo/'. $logo_sekolah .'" alt="" srcset="" class="logo"></td>
            <td style="text-align: center;">
            <h1>'. $nama_sekolah .'</h1>
            <p style="word-wrap: break-word; width : 150px;">'. $alamat_sekolah .'</p>
            <p>Telp : '. $no_tlp .'</p>
            <td style="width:100px;">&nbsp;</td>
        </td>
        </tr>
    </table>
    <hr />
    <h2 style="text-align: center;">Biodata Siswa</h2>
    <br >
    <h3>* Data Siswa</h3>
    <table>
        <tr>
            <td width="56%">Nama Lengkap</td>
            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
            <td>'. $nama_atlet .'</td>
        </tr>
        <tr>
            <td>No Regristrasi</td>
            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
            <td>'. $no_reg .'</td>
        </tr>
        <tr>
            <td>Tempat/Tanggal Lahir</td>
            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
            <td>'. $ttl .'</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
            <td>'. $jenis_kelamin .'</td>
        </tr>
        <tr>
            <td>Berat Badan</td>
            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
            <td>'. $bb .'</td>
        </tr>
        <tr>
            <td>Tinggi Badan</td>
            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
            <td>'. $tb .'</td>
        </tr>
        <tr>
            <td>Nomor Handphone</td>
            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
            <td>'. $no_hp .'</td>
        </tr>
        <tr>
            <td>Tingkat Sabuk</td>
            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
            <td>'. $tingkat .'</td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
            <td>'. $kelas .'</td>
        </tr>
    </table>
    <br>
    <h3>* Data Wali Atlet</h3>
    <table>
        
        <tr>
            <td>Nama Wali</td>
            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
            <td>'. $nama_wali .'</td>
        </tr>
        <tr>
            <td>Nomor Handphone</td>
            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
            <td>'. $no_hpwali .'</td>
        </tr>
        <tr>
            <td>Alamat Lengkap Wali</td>
            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
            <td>'. $alamat_wali .'</td>
        </tr>
    </table>
    <br><br><br>
    <table width="100%">
        <tr>
            <td style="text-align: center;">Pelatih 1</td>
            <td style="text-align: center;">Pelatih 2</td>
        </tr>
        <tr>
            <td style="text-align: center;">&nbsp;</td>
            <td style="text-align: center;">&nbsp;</td>
        </tr>
        <tr>
            <td style="text-align: center;">&nbsp;</td>
            <td style="text-align: center;">&nbsp;</td>
        </tr>
        <tr>
            <td style="text-align: center;">'. $wakil_kepsek .'</td>
            <td style="text-align: center;">'. $kepsek .'</td>
        </tr>
        
    </table>
</body>
</html>';

$mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
$mpdf->WriteHTML($html);
$mpdf->Output('biodata-siswa.pdf', \Mpdf\Output\Destination::INLINE);
exit; 
?>