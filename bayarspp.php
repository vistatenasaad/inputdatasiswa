<?php
error_reporting(0);
session_start();
include 'code crud/logo.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <script defer src="fontawesome/js/all.js"></script>
    <title>Bayar SPP</title>
    <link rel="shortcut icon" href="logo/<?php echo $logo_sekolah; ?>" type="image/x-icon">
</head>

<body>
    <div id="none">
        <?php include 'navbar.php'; ?>
        <br>
        <?php
        if (isset($_GET['id'])) {
            $sqlSiswa = mysqli_query($connect, "SELECT * FROM data_siswa WHERE no_id='$_GET[id]'");
            $ds = mysqli_fetch_array($sqlSiswa);
            $id = $ds['no_id'];
        ?>
            <div class="card" style="margin-left:auto;margin-right:auto;border-color: #fff;">
                <div class="card-body">
                    <div class="table-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Biodata Siswa</h3>
                                <table>
                                    <tr>
                                        <td><a class="btn btn-success btn-sm" target="_blank" href="cetaklaporan.php?id=<?= $_GET['id'] ?>"><i class="fas fa-download"></i> Cetak Laporan</a></td>
                                    </tr>
                                </table>
                                <br>
                                <table>
                                    <tr>
                                        <td>Nama Siswa</td>
                                        <td> :</td>
                                        <td> <?php echo $ds['nama_atlet']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>No Reg</td>
                                        <td> :</td>
                                        <td> <?php echo $ds['tgl_reg']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tingkatan Sabuk</td>
                                        <td> :</td>
                                        <td> <?php echo $ds['tingkat']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table table-bordered table-hover" style="border-radius: 5px; font-size : 14px; width: 100%;">
                                <thead>
                                    <tr style="text-align: center; height : 25px;">
                                        <th>No</th>
                                        <th>Bulan</th>
                                        <th>Jatuh Tempo</th>
                                        <th>No. Bayar</th>
                                        <th>Tgl. Bayar</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
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
                                    $month = strtotime('2021-01-10');
                                    $end = strtotime('2022-12-10');
                                    while ($month < $end) {
                                        $no = 1;
                                        $tahun = date('Y', $month);
                                        $bulan = date('m', $month);
                                        $spp = mysqli_query($connect, "SELECT * FROM spp WHERE idsiswa='$ds[no_id]' and YEAR(bulan) = '$tahun' AND MONTH(bulan) = '$bulan'");
                                        $hasilspp = mysqli_fetch_array($spp);
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= tgl_indo(date('Y-m', $month)) ?></td>
                                            <td><?= tgl_indo(date('Y-m-d', $month)) ?></td>
                                            <?php if (!empty($hasilspp['tglbayar'])) {
                                            ?>
                                                <td><?= date('Ymd', strtotime($hasilspp['tglbayar'])) . "" . $hasilspp['idspp'] ?></td>
                                            <?php
                                            } else {
                                            ?>
                                                <td></td>
                                            <?php
                                            }
                                            ?>

                                            <td><?= tgl_indo($hasilspp['tglbayar']) ?></td>
                                            <td>Rp. 50.000</td>
                                            <td><?= $hasilspp['keterangan'] ?></td>
                                            <td>
                                                <?php
                                                if ($hasilspp['keterangan'] == "Lunas") {
                                                ?>
                                                    <a class="btn btn-success btn-sm" target="_blank" href="cetak.php?id=<?= $hasilspp['idspp'] ?>"><i class="fas fa-download"></i> Cetak</a>


                                                <?php
                                                } else {
                                                ?>
                                                    <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#konfirmasi" data-href="konfirmasi.php?id=<?= date('Y-m-d', $month) ?>&iduser=<?= $ds['no_id'] ?>"><i class="fas fa-edit"></i> Bayar</a>
                                                <?php
                                                }
                                                ?>
                                            </td>

                                        </tr>
                                    <?php
                                        $month = strtotime("+1 month", $month);
                                        $no++;
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Ingin Melunaskan Pembayaran ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a class="btn btn-primary btn-ok">Yakin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Barang</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Ingin Melunaskan Pembayaran ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary btn-ok">Yakin</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#konfirmasi').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>