<?php
include_once 'connect.php';
// Tạo kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Lấy dữ liệu từ bảng users
$sql = "SELECT * FROM data_xskt_mb WHERE created_at = '$date'";
$result = $conn->query($sql);

// Tạo mảng chứa dữ liệu
$data = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    array_push($data, $row);
  }
}

$text_show = "KQ xổ số miền bắc ngày ";
foreach($data as $key_data => $value) {
  $chuoi_thoi_gian = $value['created_at'];
  $ngay_thang_nam = date("Y-m-d", strtotime($chuoi_thoi_gian));
  $text_show = $text_show . $ngay_thang_nam . "\n";
  $value['g7'] = json_decode($value['g7']);
  $value['g6'] = json_decode($value['g6']);
  $value['g5'] = json_decode($value['g5']);
  $value['g4'] = json_decode($value['g4']);
  $value['g3'] = json_decode($value['g3']);
  $value['g2'] = json_decode($value['g2']);
  
  $new_i7 = 'G7: ';
  $new_i6 = 'G6: ';
  $new_i5 = 'G5: ';
  $new_i4 = 'G4: ';
  $new_i3 = 'G3: ';
  $new_i2 = 'G2: ';

  foreach($value['g7'] as $key_g7 => $item_g7) {
    $new_i7 = $new_i7 . $item_g7 . " ";
  }
  foreach($value['g6'] as $key_g6 => $item_g6) {
    $new_i6 = $new_i6 . $item_g6 . " ";
  }
  foreach($value['g5'] as $key_g5 => $item_g5) {
    $new_i5 = $new_i5 . $item_g5 . " ";
  }
  foreach($value['g4'] as $key_g4 => $item_g4) {
    $new_i4 = $new_i4 . $item_g4 . " ";
  }
  foreach($value['g3'] as $key_g3 => $item_g3) {
    $new_i3 = $new_i3 . $item_g3 . " ";
  }
  foreach($value['g2'] as $key_g2 => $item_g2) {
    $new_i2 = $new_i2 . $item_g2 . " ";
  }
  $value['g1'] = "G1: " . $value['g1'];
  $value['gdb'] = "GDB: " .$value['gdb'];
 
  
  
}

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);

// Đóng kết nối
$conn->close();
?>
