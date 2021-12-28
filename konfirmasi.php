<?php
include 'code crud/config.php';
$bulan = $_GET['id'];
$iduser = $_GET['iduser'];
$keterangan = "Lunas";
$tglbayar = date('Y-m-d');

$conn = mysqli_query($connect, "INSERT INTO spp
            (idsiswa, bulan, keterangan, tglbayar) 
            VALUES ('$iduser',
                    '$bulan',
                    '$keterangan',
                    '$tglbayar')");
if($conn){
?>
<script>
    swal({ title: "SPP Berhasil Dibayar",
        text: "",
        type: "success"}).then(okay => {
         if (okay) {
         <?php
        header("location: bayarspp.php?id=$iduser");	
        ?>
         }
        });
</script>
<?php
} else {
?>
<script>
    swal({ title: "Input Siswa Gagal",
        text: "",
    type: "error"}).then(okay => {
   if (okay) {
    header("location: bayarspp.php?id=$iduser");	
    }
    });
    </script>
<?php } ?>