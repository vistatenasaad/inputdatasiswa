<?php 
    include 'config.php';
    if(isset($_POST['input'])){
        $nama_file = $_FILES['foto_siswa']['name'];
        $tmp_file = $_FILES['foto_siswa']['tmp_name'];
        $path = "foto-siswa/".$nama_file; // Alamat Penyimapan foto siswa

        if(move_uploaded_file($tmp_file, $path)){
            $conn = mysqli_query($connect, "INSERT INTO data_siswa 
            (nama_atlet, tgl_reg, ttl, jenis_kelamin, bb, tb, no_hp, tingkat, kelas, ket, nama_wali, no_hpwali, alamat_wali, foto_siswa) 
            VALUES ('$_POST[nama_atlet]',
                    '$_POST[tgl_reg]',
                    '$_POST[ttl]',
                    '$_POST[jenis_kelamin]',
                    '$_POST[bb]',
                    '$_POST[tb]',
                    '$_POST[no_hp]',
                    '$_POST[tingkat]',
                    '$_POST[kelas]',
                    '$_POST[ket]',
                    '$_POST[nama_wali]',
                    '$_POST[no_hpwali]',
                    '$_POST[alamat_wali]',                    
                    '".$nama_file."'
                     )");
            if($conn){
?>
<script>
    swal({ title: "Input Siswa Berhasil",
        text: "",
    type: "success"}).then(okay => {
   if (okay) {
    window.location.href = "input-siswa";
    }
    });
</script>
<?php
}else{
?>
<script>
    swal({ title: "Input Siswa Gagal",
        text: "",
    type: "error"}).then(okay => {
   if (okay) {
    window.location.href = "input-siswa";
    }
    });
    </script>
<?php } } } ?>

