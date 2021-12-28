<?php
if(!empty($_FILES['file']['name']))
{
 $conn = new PDO("mysql:host=localhost;dbname=crud_siswa;", "root", "", array(
        PDO::MYSQL_ATTR_LOCAL_INFILE => true,
    ));

 $total_row = count(file($_FILES['file']['tmp_name']));

 $file_location = str_replace("\\", "/", $_FILES['file']['tmp_name']);

 $query = '
 LOAD DATA LOCAL INFILE "'.$file_location.'" IGNORE 
 INTO TABLE data_siswa 
 FIELDS TERMINATED BY "," 
 LINES TERMINATED BY "\r\n" 
 IGNORE 1 LINES 
 (@column1,@column2,@column3,@column4,@column5,@column6,@column7,@column8,@column9,@column10,@column11,@column12) 
 SET nama_atlet = @column1,  tgl_reg = @column2,  ttl = @column3,  jenis_kelamin = @column4,  bb = @column5,  tb = @column6,  no_hp = @column7,  tingkat = @column8,  kelas = @column9,  nama_wali = @column10,  no_hpwali = @column11,  alamat_wali = @column12, ket = @column13
 ';

 $statement = $conn->prepare($query);

 $statement->execute();

 $output = array(
  'success' => 'Total <b>'.$total_row.'</b> Data imported Success..'
 );

 echo json_encode($output);
}

?>
