<?php
include 'config.php';
if (isset($_GET['id'])) {
    $sql = mysqli_query($connect, "SELECT * FROM data_siswa WHERE no_id = '$_GET[id]' ");
    $data = mysqli_fetch_array($sql);
    if ($data) {
        // Data Atlet
        $no_id = $data['no_id'];
        $nama_atlet = $data['nama_siswa'];
        $no_reg = $data['tgl_reg'];
        $ttl = $data['ttl'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $bb = $data['bb'];
        $tb = $data['tb'];
        $no_hp = $data['no_hp'];
        $tingkat = $data['tingkat'];
        $kelas = $data['kelas'];
        $ket = $data['ket'];
        $foto_siswa = $data['foto_siswa'];
        // Data Wali
        $nama_wali = $data['nama_wali'];
        $no_hpwali = $data['no_hpwali'];
        $alamat_wali = $data['alamat_wali'];
    }
}
if (isset($_POST['update'])) {
    if (empty($_POST['nama_atlet'])) {
        echo "<script>alert('Anda Belom Melakukan Perubahan...');document.location='views-data';</script>";
    } else {
        $nama_file = $_FILES['foto_siswa']['name'];
        $tmp_file = $_FILES['foto_siswa']['tmp_name'];
        $path = "foto-siswa/" . $nama_file;
        if ($nama_file == '') {
            // Jika Gambar tidak di ganti 
            // Tetap lakukan perubahan tanpa ada gambar...
            $upedit = mysqli_query($connect, "UPDATE data_siswa SET 
                                nama_atlet = '$_POST[nama_atlet]',
                                tgl_reg = '$_POST[tgl_reg]',
                                ttl = '$_POST[ttl]',
                                jenis_kelamin = '$_POST[jenis_kelamin]',
                                bb = '$_POST[bb]',
                                tb = '$_POST[tb]',
                                no_hp = '$_POST[np_hp]',
                                tingkat = '$_POST[tingkat]',
                                kelas = '$_POST[kelas]',
                                ket = '$_POST[ket]',
                                nama_wali = '$_POST[nama_wali]',
                                no_hpwali = '$_POST[no_hpwali]',
                                alamat_wali = '$_POST[alamat_wali]'
                                WHERE no_id = '$_GET[id]' ");
            if ($upedit) {
                ?>
                <script>
                    swal({
                        title: "Data siswa brhasil dirubah",
                        text: "",
                        type: "success"
                    }).then(okay => {
                        if (okay) {
                            window.location.href = "data-siswa";
                        }
                    });
                </script>
            <?php
                        } else {
                            //Merubah Profil Gagal
                        }
                    } else { // Jika Gambar dan lainya di rubah Maka Lakukan Perubahan untuk semua
                        if (move_uploaded_file($tmp_file, $path)) {
                            $uppdate = mysqli_query($connect, "UPDATE data_siswa SET 
                              nama_atlet = '$_POST[nama_atlet]',
                              tgl_reg = '$_POST[tgl_reg]',
                              ttl = '$_POST[ttl]',
                              jenis_kelamin = '$_POST[jenis_kelamin]',
                              bb = '$_POST[bb]',
                              tb = '$_POST[tb]',
                              no_hp = '$_POST[no_hp]',
                              tingkat = '$_POST[tingkat]',
                              kelas = '$_POST[kelas]',
                              ket = '$_POST[ket]',
                              nama_wali = '$_POST[nama_wali]',
                              no_hpwali = '$_POST[no_hpwali]',
                              alamat_wali = '$_POST[alamat_wali]',
                              foto_siswa ='" . $nama_file . "' 
                                WHERE no_id = '$_GET[id]' ");
                        }
                        unlink("foto-siswa/" . $foto_siswa);
                    }
                    if ($uppdate) {
                        ?>
            <script>
                swal({
                    title: "Data siswa brhasil dirubah",
                    text: "",
                    type: "success"
                }).then(okay => {
                    if (okay) {
                        window.location.href = "data-siswa";
                    }
                });
            </script>
<?php
        } else {
            //Merubah Profil Gagagl
        }
    }
}
?>