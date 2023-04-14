<?php
include_once 'connect.php';

// Tạo kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Lấy dữ liệu từ bảng users
$sql = "SELECT * FROM data_xskt_mn WHERE created_at = '$date'";
$result = $conn->query($sql);

// Tạo mảng chứa dữ liệu
$data = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    array_push($data, $row);
  }
}
foreach($data as $key_data => $value) {
  $value['g6'] = json_decode($value['g5']);
  $value['g4'] = json_decode($value['g5']);
  $value['g3'] = json_decode($value['g5']);
  echo $value['g8'] . "<br/>";
  echo $value['g7'] . "<br/>";
  echo $value['g6'] . "<br/>";
  echo $value['g5'] . "<br/>";
  echo $value['g4'] . "<br/>";
  echo $value['g3'] . "<br/>";
  echo $value['g2'] . "<br/>";
  echo $value['g1'] . "<br/>";
  echo $value['gdb'] . "<br/>";
}
// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
// echo json_encode($data);

// Đóng kết nối
$conn->close();
?>
