<?php

$update = json_decode(file_get_contents("php://input"), TRUE);
$message = $update['message'];
$chat_id = $message['chat']['id'];
$cid = $update['message']['from']['id'];
$from = $message['from'];
$text = $message['text'];
$username = $from['username'];

echo"hello world";
$token = "bot5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
$apiLink = "https://api.telegram.org/bot5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0/";

// {{chat_id}} = $chat_id;
// // {{message}} = $message;

// if($text == "Pelayanan Surat"){
//     $pesan_balik = "Pilih Jenis Surat";
// }

if($text == "/start"){
    $keyboard = array(
    "inline_keyboard" => [[['text' =>  'Pelayanan Surat', 'callback_data' => 'button_0']],
    [['text' =>  'Informasi Orang Meninggal', 'callback_data' => 'button_1']],
    [['text' =>  'Pengaduan Masyarakat', 'callback_data' => 'button_2']]],);

    $reply = "Selamat Datang, @$username di bot Pelayanan Desa Gumelem Wetan";
    $url = "https://api.telegram.org/$token/sendMessage";
    $postfields = array(
    'chat_id' => $chat_id,
    'text' => $reply,
    'reply_markup' => json_encode($keyboard)
    );

    $curld = curl_init();

    curl_setopt($curld, CURLOPT_POST, true);
    // curl_setopt($curld, CURLOPT_CAINFO => "C:/cacert.pem");
    curl_setopt($curld, CURLOPT_POSTFIELDS, $postfields);
    curl_setopt($curld, CURLOPT_URL,$url);
    curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($curld);

    curl_close ($curld);
}



// elseif($text == "/halo"){
//     $keyboard = [
//         ["Pelayanan Surat"],
//         ["Informasi Orang Meninggal"],
//         ["Pengaduan Masyarakat"],
//     ];

//     $key = array(
//         "resize_keyboard" => true,
//         "keyboard" => $keyboard,
//     );

//     keyboard($key, "Selamat Datang @$username, di bot Pelayanan Desa Gumelem Wetan $cid");
// }

// function keyboard($menu, $text, $cd){
//     $menu2 = $menu;
//     $menu3 = json_encode($menu2);

//     if(strpos($text, "\n")){
//         $text = urlencode($text);
//     }
//     apiRequest("sendMessage?text=$text&parse_mode=Markdown&chat_id=$cd&reply_markup=$menu3");
// }

// file_get_contents($apiLink . "sendMessage?chat_id=$chat_id&text=" . urlencode($pesan_balik) ."&parse_mode=markdown");
