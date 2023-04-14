<?php
    //Connect Bot Telegram
   $token = "5943908412:AAEXWBDlASNqVZq9WJuYMy3DvaBy2HHbzLM";
    $api_url = "https://api.telegram.org/bot" . $token;
    $update = json_decode(file_get_contents("php://input"), TRUE);
    $message = $update["message"];
    $text = $message["text"];
    $chat_id = $message["chat"]["id"];
    $servername = gethostname();
    
    //Connect Database
    $username = "pulltest_bill_onfa";
    $password = "Hatemoneys1";
    $dbname = "pulltest_bill-show-kqxs";
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $date = getdate();
    if($date['hours'] < 19) $date['mday'] -= 1;
    if($date['mon'] < 10) $date['mon'] = "0".$date['mon'];
    $date = $date['year'] . "-" . $date['mon'] . "-" .$date['mday'];

    $callback_query = $update["callback_query"];
    $data = $callback_query["data"];
    $callback_id = $callback_query["id"];
    
    // Xử lý tin nhắn của người dùng
    if ($text == "/xemkqxs") {
      $keyboard = [
        'inline_keyboard' => [
          [
            ['text' => 'Miền Bắc', 'callback_data' => 'kqmb'],
            ['text' => 'Miền Trung', 'callback_data' => 'kqmt'],
            ['text' => 'Miền Nam', 'callback_data' => 'kqmn']
          ]
        ]
      ];

      $reply_markup = json_encode($keyboard);
    
      $response = [
        'method' => 'sendMessage',
        'chat_id' => $chat_id,
        'text' => 'Xin chào! Hãy chọn miền bạn muốn xem:',
        'reply_markup' => $reply_markup
      ];
    
      // Gửi câu trả lời đến người dùng
      file_get_contents($api_url . "/sendMessage?" . http_build_query($response));
    }
    
    
    
    if ($text == "/testkqxs") {
         // Tạo kết nối đến cơ sở dữ liệu
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Kiểm tra kết nối
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        // Lấy dữ liệu từ bảng users
        $sql = "SELECT * FROM data_xskt_mb WHERE created_at = '$date'";
        $result = $conn->query($sql);
        $text_show = "KQ xổ số miền bắc ngày ";
        
        $data = array();
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            array_push($data, $row);
          }
        }
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
          $text_show = $text_show . $new_i7. "\n" . $new_i6. "\n" . $new_i5. "\n" . $new_i4. "\n" . $new_i3. "\n" . $new_i2. "\n" .$value['g1']. "\n" . $value['gdb']  ;
        }
      $response = [
        'method' => 'sendMessage',
        'chat_id' => $chat_id,
        'text' => $text_show,
      ];
    
      // Gửi câu trả lời đến người dùng
      file_get_contents($api_url . "/sendMessage?" . http_build_query($response));
    }
    
    
    $callback_query_data = $update['callback_query']['data'];
    
    if (isset($update['callback_query'])) {
        switch($callback_query_data) {
            case 'kqmb': {
                // Tạo kết nối đến cơ sở dữ liệu
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                // Kiểm tra kết nối
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                // Lấy dữ liệu từ bảng users
                $sql = "SELECT * FROM data_xskt_mb WHERE created_at = '$date'";
                $result = $conn->query($sql);
                $text_show = "KQ xổ số miền bắc ngày ";
                
                $data = array();
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    array_push($data, $row);
                  }
                }
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
                  $text_show = $text_show . $new_i7. "\n" . $new_i6. "\n" . $new_i5. "\n" . $new_i4. "\n" . $new_i3. "\n" . $new_i2. "\n" .$value['g1']. "\n" . $value['gdb']  ;
                }
                break;
            }
            
            case 'kqmt':{
                $text_show = "KQmt";
                break;
            }
            
            case 'kqmn': {
                $text_show = "KQmn";
                break;
            }
            default: $text_show = "Không hợp lệ.";
        }
        $data = http_build_query([
                'text' => $text_show,
                'chat_id' => $update['callback_query']['from']['id']
            ]);
        file_get_contents($api_url . "/sendMessage?{$data}");
     }
?>
