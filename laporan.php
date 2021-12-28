<?php
include 'code crud/config.php';
require('fpdf17/fpdf.php');
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
if (isset($_GET['id'])) {
    $sqlSiswa = mysqli_query($connect, "SELECT * FROM data_siswa WHERE no_id='$ds[idsiswa]'");
    $ds = mysqli_fetch_array($sqlSiswa);
    $siswa = mysqli_query($connect, "SELECT * FROM spp WHERE idspp='$_GET[id]'");
    $s = mysqli_fetch_array($siswa);
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetFont('Arial', 'B', 14);

    //Cell(width , height , text , border , end line , [align] )

    $pdf->Cell(0, 10, 'LAPORAN PEMBAYARAN SPP TAEKWONDO BUMIAJI', 0, 0, 'C');
    $pdf->Cell(189, 10, '', 0, 1); //end of line
    //set font jadi arial, regular, 12pt
    $pdf->SetFont('Arial', '', 12);

    $pdf->Cell(59, 5, '', 0, 1); //end of line

    $pdf->Cell(50, 5, 'Tanggal Pembayaran : ', 0, 0);
    $pdf->Cell(100, 5, tgl_indo($ds['tglbayar']), 0, 1); //end of line

    $pdf->Cell(50, 5, 'Bulan SPP :', 0, 0);
    $pdf->Cell(100, 5, tgl_indo($ds['bulan']), 0, 1); //end of line

    $pdf->Cell(50, 5, 'Nama Siswa :', 0, 0);
    $pdf->Cell(100, 5, $s['nama_atlet'], 0, 1); //end of line

    $pdf->Cell(50, 5, 'Tingat Sabuk :', 0, 0);
    $pdf->Cell(100, 5, $s['tingkat'], 0, 1); //end of line

    $pdf->Cell(50, 5, 'Kelas :', 0, 0);
    $pdf->Cell(100, 5, $s['kelas'], 0, 1); //end of line

    //buat dummy cell untuk memberi jarak vertikal
    $pdf->Cell(189, 10, '', 0, 1); //end of line


    //invoice 
    $pdf->SetFont('Arial', 'B', 12);

    $pdf->SetFont('Arial', 'B', 12);

    //Angka diratakan kanan, jadi kita beri property 'R'

    $pdf->Cell(130, 5, 'No Bayar', 1, 0);
    $pdf->Cell(54, 5, date('Ymd', strtotime($ds['tglbayar'])) . "" . $ds['idspp'], 1, 1, 'R'); //end of line

    $pdf->Cell(130, 5, 'Jumlah', 1, 0);
    $pdf->Cell(54, 5, 'Rp. 50.000', 1, 1, 'R'); //end of line

    $pdf->Cell(130, 5, 'Keterangan', 1, 0);
    $pdf->Cell(54, 5, $ds['keterangan'], 1, 1, 'R'); //end of line

    $pdf->Output();
}
