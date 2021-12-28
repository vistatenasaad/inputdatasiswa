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

function bulanku($bulan)
{
    if ($bulan == "01") {
        $bulanku = "Januari";
    } elseif ($bulan == "02") {
        $bulanku = "Februari";
    } elseif ($bulan == "03") {
        $bulanku = "Maret";
    } elseif ($bulan == "04") {
        $bulanku = "April";
    } elseif ($bulan == "05") {
        $bulanku = "Mei";
    } elseif ($bulan == "06") {
        $bulanku = "Juni";
    } elseif ($bulan == "07") {
        $bulanku = "Juli";
    } elseif ($bulan == "08") {
        $bulanku = "Agustus";
    } elseif ($bulan == "09") {
        $bulanku = "September";
    } elseif ($bulan == "10") {
        $bulanku = "Oktober";
    } elseif ($bulan == "11") {
        $bulanku = "November";
    } elseif ($bulan == "12") {
        $bulanku = "Desember";
    }
    return $bulanku;
}

$siswa = mysqli_query($connect, "SELECT * FROM data_siswa WHERE no_id='$_GET[id]'");
$s = mysqli_fetch_array($siswa);
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', '', 16);

$sql = "SELECT * FROM profil_sekolah";
$result = $connect->query($sql);
while ($row = $result->fetch_assoc()) {
    $nama_sekolah = $row['nama_sekolah'];
    $logo_sekolah = $row['logo_sekolah'];

    $pdf->Image('logo/'.$logo_sekolah, 45, 8, 25, 25);
    $pdf->Ln(7);

    $pdf->Cell(190, 7, "PEMBAYARAN SPP", 0, 1, 'C');
    // $pdf->Cell(10,10,'',0,1);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(190, 7, "TAEKWONDO BUMIAJI", 0, 1, 'C');

    $pdf->Cell(10, 10, '___________________________________________________________', 0, 1);
    $pdf->Cell(189, 10, '', 0, 1); //end of line
    //set font jadi arial, regular, 12pt
    $pdf->SetFont('Arial', '', 12);

    $pdf->SetLeftMargin(35);
    $pdf->Cell(50, 5, 'Nama Siswa', 0, 0);
    $pdf->Cell(100, 5, ' : ' . $s['nama_atlet'], 0, 1); //end of line

    $pdf->Cell(50, 5, 'Tingat Sabuk', 0, 0);
    $pdf->Cell(100, 5, ' : ' . $s['tingkat'], 0, 1); //end of line

    $pdf->Cell(50, 5, 'Kelas', 0, 0);
    $pdf->Cell(100, 5, ' : ' . $s['kelas'], 0, 1); //end of line

    //buat dummy cell untuk memberi jarak vertikal
    $pdf->Cell(189, 10, '', 0, 1); //end of line

    $pdf->SetFont('Arial', 'B', 14);

    $month = strtotime('2021-01-10');
    $end = strtotime('2022-12-10');
    $pdf->SetLeftMargin(35);
    $pdf->Cell(70, 5, 'Bulan', 1, 0, 'C');
    $pdf->Cell(54, 5, 'Jumlah', 1, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
    while ($month < $end) {
        $no = 1;
        $tahun = date('Y', $month);
        $bulan = date('m', $month);
        $spp = mysqli_query($connect, "SELECT * FROM spp WHERE idsiswa='$_GET[id]' and YEAR(bulan) = '$tahun' AND MONTH(bulan) = '$bulan'");
        $hasilspp = mysqli_fetch_array($spp);
        $pdf->Cell(70, 5, bulanku($bulan) . ' ' . $tahun . ' ', 1, 0, 'R');
        if ($hasilspp) {
            if ($hasilspp['keterangan'] == "Lunas") {
                $jumlah = "Rp. 50.000";
            } else {
                $jumlah = "";
            }
        } else {
            $jumlah = "";
        }
        $pdf->Cell(54, 5, $jumlah, 1, 1, 'C');



        $month = strtotime("+1 month", $month);
        $no++;
    }

    $pdf->Cell(90, 10, "", 0, 1, 'C');
    $pdf->Cell(50, 10, 'Jawa Timur, ' . tgl_indo(date('Y-m-d')), 0, 1, '');
    $pdf->Cell(90, 10, "", 0, 1, 'C');
    $pdf->Cell(90, 10, "", 0, 1, 'C');
    $pdf->Cell(50, 10, $row['kepsek'], 0, 1, '');
    $pdf->Cell(50, 10, $row['nis_kepsek'], 0, 0, '');
}
$pdf->Output();
