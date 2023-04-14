<?php
include_once 'connect.php';

// Tạo kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Lấy dữ liệu từ bảng users
$sql = "SELECT * FROM data_xskt_mt WHERE created_at = '$date'";
$result = $conn->query($sql);

// Tạo mảng chứa dữ liệu
$data = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    array_push($data, $row);
  }
}
$text_show = "KQ xổ số miền Trung ngày ";
foreach($data as $key_data => $value) {
  $chuoi_thoi_gian = $value['created_at'];
  $ngay_thang_nam = date("Y-m-d", strtotime($chuoi_thoi_gian));
  $text_show = $text_show . $ngay_thang_nam . "\n";
  $value['g6'] = json_decode($value['g6']);
  $value['g4'] = json_decode($value['g4']);
  $value['g3'] = json_decode($value['g3']);
  
  $new_i6 = 'G6: ';
  $new_i4 = 'G4: ';
  $new_i3 = 'G3: ';

  foreach($value['g6'] as $key_g6 => $item_g6) {
    $new_i6 = $new_i6 . $item_g6 . " ";
  }

  foreach($value['g4'] as $key_g4 => $item_g4) {
    $new_i4 = $new_i4 . $item_g4 . " ";
  }

  foreach($value['g3'] as $key_g3 => $item_g3) {
    $new_i3 = $new_i3 . $item_g3 . " ";
  }

  $value['g8'] = "G8: " . $value['g8'];
  $value['g7'] = "G7: " . $value['g7'];
  $value['g5'] = "G5: " . $value['g5'];
  $value['g2'] = "G2: " . $value['g2'];
  $value['g1'] = "G1: " . $value['g1'];
  $value['gdb'] = "GDB: " .$value['gdb'];
 
  $text_show = $text_show . $value['name_dai'] . "\n" .$value['g8'] . "\n" . $value['g7'] . "\n" . $new_i6. "\n" . $value['g5'] . "\n" . $new_i4 . "\n" . $new_i3. "\n" . $value['g2'] . "\n" .$value['g1']. "\n" . $value['gdb']  ;

}
// echo $text_show;
// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);

// Đóng kết nối
$conn->close();
?>
