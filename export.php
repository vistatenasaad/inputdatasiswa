<?php
  include 'code crud/config.php';
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Data Siswa.xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Siswa</title>
</head>
<style>
    table {width : 100%; border-collapse: collapse; border: 1px solid #ACACAC;}
    table tr td {border: 1px solid black;}
</style>
<body style="border: 0.1pt solid #ccc">
    <table>
        <thead>
        <tr>
            <td>No</td>
            <td>Nama Atlet</td>
            <td>No_Regristrasi</td>
            <td>Tempat/Tanggal Lahir</td>
            <td>Jenis Kelamin</td>
            <td>Berat Badan</td>
            <td>Tinggi Badan</td>
            <td>Nomor Handphone</td>
            <td>Tingkat</td>
            <td>Kelas</td>
            <td>Ket</td>
            <td>Nama Wali</td>
            <td>No Handphone Wali</td>
            <td>Alamat Lengkap Wali</td>
        </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        $conn = mysqli_query($connect, "SELECT * FROM data_siswa ORDER BY nama_atlet ASC");
        while($row = mysqli_fetch_array($conn)){
            ?>
            <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['nama_atlet']; ?></td>
            <td><?php echo $row['tgl_reg']; ?></td>
            <td><?php echo $row['ttl']; ?></td>
            <td><?php echo $row['jenis_kelamin']; ?></td>
            <td><?php echo $row['bb']; ?></td>
            <td><?php echo $row['tb']; ?></td>
            <td><?php echo $row['no_hp']; ?></td>
            <td><?php echo $row['tingkat']; ?></td>
            <td><?php echo $row['kelas']; ?></td>
            <td><?php echo $row['ket']; ?></td>
            <td><?php echo $row['nama_wali']; ?></td>
            <td><?php echo $row['no_hpwali']; ?></td>
            <td><?php echo $row['alamat_wali']; ?></td>
            </tr>
           <?php } ?>
        </tbody>
    </table>
</body>
</html>