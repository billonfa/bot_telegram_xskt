<?php
// lấy dữ liệu từ telegram khi có tin nhắn
$data = file_get_contents('php://input');
require_once "TelegramBot.php";
$bot = new Bot('5866167230:AAHDUp_ajt9FZaWjIEateF4oM8J8XB53IpY');
$json = json_decode($data,true);
if (isset($json['message']['text'])){
    if (!checkTinNhan($bot,$json)){
        return;
    }
    $message = $json['message']['text'];
    if ($message == '/start'){
         $bot->sendMessage($id=$json["message"]["chat"]["id"],$text="Xin chào dân chơi ".$json["message"]["from"]["first_name"]." ".$json["message"]["from"]["last_name"].' Em là BOT Hạ Vy đáng yêu được tạo ra bởi Tập đoàn NFT Group. Để biết thêm nhiều thông tin hơn anh/chị có thể truy cập vào website chính thức của NFT tại đây https://nftgroupvn.com/ 🥰');
    }
    if ($message == '@nftgroupvn_bot'){
         $bot->sendMessage($id=$json["message"]["chat"]["id"],$text="Gọi em là 'Hạ Vy ơi' thì em mới trả lời tiếp nè 🥰!");
    }
    if ($message == 'Hướng dẫn'){
         $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='Dạ vâng! Em có một vài hướng dẫn nếu Anh/Chị cần ạ. Anh/Chị gõ "Hướng dẫn casino" nếu cần hướng dẫn chơi game hoặc Anh/Chị gõ "Hướng dẫn telegram" để được hướng dẫn sử dụng telegram nhé ạ',
        $reply="",
        $mode="HTML");
    }
    if ($message == 'Hướng dẫn casino'){
         $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='Anh/chị đang cần hỗ trợ chơi ! Hãy <a href="https://t.me/nfthotro/15"> CLICK VÀO ĐÂY</a> để được hướng dẫn chơi chi tiết nhất nhé',
        $reply="",
        $mode="HTML");
    }
    if ($message == 'Lịch hô'){
         $bot->sendMessage($id=$json["message"]["chat"]["id"],$text=" Dạ lịch hô được ghim ở đầu Nhóm Anh/Chị click vào đó để xem ạ 🥰 ");
    }
    if ($message == 'Hướng dẫn xóc đĩa'){
         $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='Anh/chị đang cần hỗ trợ chơi ! Hãy <a href="https://t.me/nfthotro/15"> CLICK VÀO ĐÂY</a> để được hướng dẫn chơi chi tiết nhất nhé',
        $reply="",
        $mode="HTML");
    }
    if ($message == 'Hướng dẫn telegram'){
         $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='Anh/chị cần hỗ trợ Telegram ! Hãy <a href="https://t.me/nfthotro/6"> CLICK VÀO ĐÂY</a> để được hướng dẫn chơi chi tiết nhất nhé',
        $reply="",
        $mode="HTML");
    }
}
function checkTinNhan($bot,$json){
    $msg = $json["message"]["text"];
    $arr = [
        'địt',
        'chó',
        'sex',
        'lồn',
        'cặc',
        'cl',
        'đít',
        'vú',
        'cu'
        ];
    $arr1 = [
        'kkk'
        ];
    $arr2 = [
        'buồn',
        'vắng',
        'lạnh',
        'Buồn',
        'Vắng',
        'Lạnh'
        ];
    $arr3 = [
        'đỉnh',
        'Đỉnh'
        ];
    $arr4 = [
        'vip',
        'Vip'
        ];
    $arr5 = [
        'cf',
        'càphê'
        ];
    $arr6 = [
        'mừng',
        'Mừng'
        ];
    $arr7 = [
        'húp',
        'Húp'
        ];
    $arr8 = [
        'đẹp',
        'xinh',
        'Đẹp',
        'Xinh'
        ];
    $arr9 = [
        'ngại',
        'Ngại'
        ];
    $arr10 = [
        'yêu',
        'Yêu'
        ];
    $arr11 = [
        'hihi',
        'haha',
        'Hihi',
        'Haha'
        ];
    $arr12 = [
        'nhậu',
        'Nhậu'
        ];
    $arr13 = [
        'bú',
        'Bú'
        ];
    $arr14 = [
        'ok',
        'OK'
        ];
    $arr15 = [
        'mèo'
        ];
    $arr16 = [
        'gỡ',
        'Gỡ'
        ];
    $arr17 = [
        'ăn',
        'kiếm'
        ];
    $arr18 = [
        'hic',
        'huhu',
        'Hic',
        'Huhu'
        ];
    $arr19 = [
        'chiến',
        'Chiến'
        ];
    $arr20 = [
        'tuyệt',
        'Tuyệt'
        ];
    $arr21 = [
        'sr',
        'sorry',
        'Sorry',
        'SR',
        'lỗi',
        'hỏng'
        ];
    $arr22 = [
        'chờ',
        'Chờ'
        ];
    $arr23 = [
        'gãy',
        'Gãy'
        ];
    $arr24 = [
        'chán',
        'nãn',
        'Chán',
        'Nãn'
        ];
    $arr25 = [
        'hôn',
        'nựng'
        ];
    $arr26 = [
        'trói'
        ];   
    $arr27 = [
        'lời',
        'Lời',
        'lãi',
        'Lãi'
        ];
    $arr28 = [
        'Cút'
        ];
    $arr29 = [
        'phò'
        ];
    $arr30 = [
        'hò'
        ];
    $arr31 = [
        'cười'
        ];
    $arr32 = [
        'duyên'
        ];
    $arr33 = [
        'admin',
        'Admin',
        'ad',
        'AD'
        ];
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='Ôi <a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> không được nói bậy trong này nhé anh/chị gì đó ui ☺️',
        $reply="",
        $mode="HTML");
        $bot->deleteMessage($json["message"]["chat"]["id"],$json["message"]["message_id"]);
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr1)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> yêu quá 😘',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr2)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> còn có em đây này ❤️',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr3)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> em cũng thấy đỉnh ❤️ hihi',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr4)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> Vip thật chứ đùa 🥳',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr5)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> Đi cà phê mà không rủ Vy 💋. Vy biết làm thơ đấy nghe khum? Nếu muốn nghe thì gõ "Hạ Vy làm thơ đi" ',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr6)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> Yêu quá à 💋',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr7)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> Húp cho bằng hết luôn nè 🥳',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr8)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> Uầy yêu quá à 🥳',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr9)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> Ngại hại bao tử đấy nè',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr10)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> Yêu anh chị nè ❤️ Yêu tất cả mọi người luôn ạ 💋',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr11)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> 😁',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr12)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> Nhậu à cho Vy ké với 😁',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr13)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> Chúc mừng nè 😚',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr14)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> 👍 👌',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr15)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> ý là mèo méo meo mèo meo ý à 🤪',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr16)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> còn thở là còn gỡ 🤪',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr17)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> quàoo 🤩',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr18)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> 😢',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr19)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> Chiến hoy nè 🤘',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr20)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> cưng gì đâu á chời 💋',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr21)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> hông sao hết nè ❤️💋 ',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr22)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> em chờ cả đời cũng được hiuhiu ❤️',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr23)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> hông sao nè hôm sau làm lại cùng Vy nè ❤️',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr24)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> em ở đây để động viên nè ❤️',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr25)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> ôi cưng thế nhờ mãi yêu ❤️',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr26)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> trói em bằng cà vạt nhưng hôg ben house trên đà lạt đâu hihi ',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr27)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> tuyệt vời quá ạ 🥰',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr28)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> Anh quát em à nói to thế á 😒',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr29)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> Lúc nào cũng phò phò 😒',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr30)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> Muốn hẹn hò với Vy cơ á ? Không dễ đâu nha 🥰',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr31)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> Một nụ cười bằng mười than thuốc bổ hihi 🥰 Nếu có khổ thì về đây nuôi Vy nè',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr32)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> Em thấy mình có duyên với nhau đấy 🥰',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    foreach(explode(' ',$msg) as $value){
    if (in_array($value,$arr33)){
        $bot->sendMessage(
        $id=$json["message"]["chat"]["id"],
        $text='<a href="tg://user?id='.$json["message"]["from"]["id"].'">'.$json["message"]["from"]["first_name"].
        " ".$json["message"]["from"]["last_name"].'</a> Không có Admin nhưng có em đây được khum 🥳. Nếu ok thì nhắn em một câu "Được nè Vy" cho em biết đi nà',
        $reply="",
        $mode="HTML");
        return false;
    }
    }
    return true;
}

