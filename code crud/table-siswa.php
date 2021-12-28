<?php
include 'config.php';
$columns = array('nama_atlet', 'tgl_reg', 'ttl', 'jenis_kelamin', 'bb', 'tb', 'no_hp', 'tingkat', 'kelas', 'ket');

$query = "SELECT * FROM data_siswa WHERE ";

if (isset($_POST["search"]["value"])) {
  $query .= '
  (nama_atlet LIKE "%' . $_POST["search"]["value"] . '%"
  OR ket LIKE "%' . $_POST["search"]["value"] . '%"  
  OR bb LIKE "%' . $_POST["search"]["value"] . '%"
  OR jenis_kelamin LIKE "%' . $_POST["search"]["value"] . '%"
  OR kelas LIKE "%' . $_POST["search"]["value"] . '%"
  OR tingkat LIKE "%' . $_POST["search"]["value"] . '%")';
}

if (isset($_POST["order"])) {
  $query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' 
 ';
} else {
  $query .= 'ORDER BY nama_atlet ASC ';
} 

$query1 = '';
$no = 1;
if ($_POST["length"] != -1) {
  $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while ($row = mysqli_fetch_array($result)) {
  $sub_array = array();
  $sub_array[] = $no++;
  $sub_array[] = $row["nama_atlet"];
  $sub_array[] = $row["tgl_reg"];
  $sub_array[] = $row["ttl"];
  $sub_array[] = $row["jenis_kelamin"];
  $sub_array[] = $row["bb"];
  $sub_array[] = $row["tb"];
  $sub_array[] = $row["no_hp"];
  $sub_array[] = $row["tingkat"];
  $sub_array[] = $row["kelas"];
  $sub_array[] = $row["ket"];
  $sub_array[] = '<center><a href="editsiswa.php?id=' . $row['no_id'] . '" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
 <a href="bayarspp.php?id=' . $row['no_id'] . '" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Bayar SPP</a>
 </center>';
  $data[] = $sub_array;
}

function get_all_data($connect)
{
  $query = "SELECT * FROM data_siswa";
  $result = mysqli_query($connect, $query);
  return mysqli_num_rows($result);
}

$output = array(
  "draw"    => intval($_POST["draw"]),
  "recordsTotal"  =>  get_all_data($connect),
  "recordsFiltered" => $number_filter_row,
  "data"    => $data
);

echo json_encode($output);
