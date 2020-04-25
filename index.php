﻿<?php 

error_reporting(0);

set_time_limit(0);

flush();
$API_KEY = '1220276708:AAEnQjiRp_9rVnIvm5NJ7RkUC4gr5kN5x1E';
##------------------------------##
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
 function sendmessage($chat_id, $text, $model){
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$mode
	]);
	}
	function sendaction($chat_id, $action){
	bot('sendchataction',[
	'chat_id'=>$chat_id,
	'action'=>$action
	]);
	}
function Forward($KojaShe, $AzKoja, $KodomMSG)
{
    bot('ForwardMessage', [
        'chat_id' => $KojaShe,
        'from_chat_id' => $AzKoja,
        'message_id' => $KodomMSG
    ]);
}
//====================special======================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$message_id = $update->message->id;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$text = $message->text;
$mybot = "Majbursizbot";
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$username = $update->message->from->username;
$bcpv = file_get_contents("bcpv.txt");
$bcgap = file_get_contents("bcgap.txt");
@mkdir("data/$chat_id");
$azidil = file_get_contents("data/$chat_id/safargul.txt");
@$list = file_get_contents("users.txt");
$channelid = file_get_contents("data/$chat_id/channelid.txt");
$name = $update->message->from->first_name;
$gpname = $update->message->chat->title;
$rt = $update->message->reply_to_message;
$replyid = $update->message->reply_to_message->message_id;
$rtid = $update->message->reply_to_message->from->id;
$data = $update->callback_query->data;
$photo = $update->message->photo;
$forward = $update->message->forward_from;
$video = $update->message->video;
$location = $update->message->location;
$sticker = $update->message->sticker;
$document = $update->message->document;
$contact = $update->message->contact;
$game = $update->message->game;
$music = $update->message->audio;
$gif = $update->message->gif;
$voice = $update->message->voice;
$message_id2 = $update->callback_query->message->message_id;
$messageid = $update->callback_query->message->message_id;
$forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=@$channelid&user_id=".$from_id)); 
$tch = $forchaneel->result->status;
$type = $update->message->chat->type;
$get = file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=$chat_id&user_id=".$from_id);
$info = json_decode($get, true);
$rank = $info['result']['status'];
$reply = $update->message->reply_to_message->message_id;
 $ADMIN = 255107380; //oddi asmin
 $ADMINS = 255107380; //gl admin idisi

//====================special=================//
if ($text == "/start") {
sendaction($chat_id, typing);
        $user = file_get_contents('users.txt');
        $members = explode("\n", $user);
        if (!in_array($from_id, $members)) {
            $add_user = file_get_contents('users.txt');
            $add_user .= $from_id . "\n";
            file_put_contents("data/$chat_id/safargul.txt");
            file_put_contents('users.txt', $add_user);
        }
            bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"👋🏻Salom $name
@$mybot ga xush kelibsiz! Bu bot 
Guruhingizdagi a'zolarni kanalingizga a'zo bo'lmagunicha  guruhga yozdirmaydi😉

 /qollanma - Qo'llanma
/loyihalar - Loyihalarimiz

<b>🔥Yangiliklar</b>
@OSIYO_HACKERLARI ",
 'parse_mode'=>'html',
            'reply_markup' =>  json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => " Guruhga qo'shish",'url'=>"https://telegram.me/$mybot?startgroup=new"]
                    ],
                    [['text' => "🔥Yangiliklar",'url'=>"https://telegram.me/OSIYO_HACKERLARI"]
                    ],
                    
                    [['text' => "👨💻 Admin",'url'=>"https://telegram.me/UzBeK_o7"]
                    ]
    ]
])
        ]);
 bot('sendmessage', [
                'chat_id' =>$ADMIN,
                'text' =>"<b>Yangi odam</b>

🆔 IDI raqami:  $from_id
 🆎Nick:   $name

 🔥/panel Admin boshqaruv paneli!✅",
 'parse_mode'=>'html' ] );
}
if($rank != "creator" && $rank != "administrator"){ 
if($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
if($type == "supergroup" or $type == "group"){
bot('sendmessage', [
            'chat_id' => $chat_id,
            'message_id' => $message_id2,
            'text' => "<a href='tg://user?id=$from_id'>$name</a> Siz @$channelid kanalimiz a'zo bo'lsangizgina bu guruhda xabar yoza olasiz!",
				'parse_mode'=>'html',
            'reply_markup' =>  json_encode([
                'inline_keyboard' => [
                    [
                    ['text' => "➕A'zo bo'lish",'url'=>"https://telegram.me/$channelid"]
                        ]
    ]
])
        ]);
    }}
if($text || $photo || $video || $location || $sticker || $document || $contact || $music || $gif || $voice){
if($tch != 'member'){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
  ]);
}
}
}
if($text == "/qollanma" && $from_id == $chat_id) {
sendaction($chat_id, typing);
            bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"<b> Botni ishlatish bo'yicha qo'llanma! </b>
1 - Botni guruhingizga qo'shasiz va Super Admin qilasiz!

2 - Bot ulamoqchi bo'lgan kanalga ham Admin qilasiz! Sababi: Bot kanalga a'zo bo'lgan yoki bo'lmaganligi tekshirish uchun!

3 - Guruhga /kanal so'zini yuborasiz! Bu buyruq faqat guruh Adminlarida ishlaydi!

4 - Keyin ulamoqchi bo'lgan kanalingizni <b>Username</b> sini yuborasiz! <b>@ Qo'ymasdan

✅Tayyor Guruh muvaffaqqiyatli Kanalga ulanadi!

🔥Yangiliklar:</b> @OSIYO_HACKERLARI",
                 'parse_mode'=>'html']);
}

if($text == "/loyihalar" && $from_id == $chat_id) {
sendaction($chat_id, typing);
            bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"*Loyihalarimiz*
            
Loyihalarimiz bo'limi hali mavjud emas


*🔥Yangiliklar:* @OSIYO_HACKERLARI",
                 'parse_mode'=>'makdown']);
}
if($text == "/kanal"){
    if($rank == "creator" or $rank== "administrator"){
sendaction($chat_id, typing);
 file_put_contents("data/$chat_id/safargul.txt","sett");
$channelid = file_get_contents("data/$chat_id/channelid.txt");
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"
<b> Shu guruhga qaysi kanalni ulamoqchisiz?
Meni o'sh kanalga Admin qiling va kanalingiz @username sini yuboring @ qo'ymasdan
Namuna </b> @OSIYO_HACKERLARI kanalini OSIYO_HACKERLARI <b> deb yuborasiz!</b>

🔥Yangiliklar @OSIYO_HACKERLARI",
 'parse_mode'=>'html']);
} }
if($azidil == "sett"){
    if($rank == "creator" or $rank== "administrator"){
 file_put_contents("data/$chat_id/safargul.txt","none");
 file_put_contents("data/$chat_id/channelid.txt",$text);
     bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"@$text <b> Kanaliga a'zo bo'lmaganlar ushbu guruhga yoza olishmaydi😉</b>

🔥Yangiliklar: @OSIYO_HACKERLARI ",
 'parse_mode'=>'html']);
    }}
//############################################################################//
if($text == "/fire" && $from_id == $ADMIN){
sendaction($chat_id, typing);
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"
+  🥀Papka yaratish🥀 +
     : @UzBeK_o7   🔰

✔️kanalga Qoshiling  ✔️
🆔: @OSIYO_HACKERLARI ",
 'parse_mode'=>'html',
            'reply_markup' =>  json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "😂Qoshichi Kanalim🥀",'url'=>"https://telegram.me/Javobsiz_Sevgim"]
                    ],
                    [['text' => "😈Kanalimiz",'url'=>"https://telegram.me/OSIYO_HACKERLARI"]
                    ]
    ]
])
        ]);
}
/////////////////////////////////////////////////
if ($text == "/panel" && $chat_id == $ADMINS) {
        file_put_contents("data/$chat_id/safargul.txt", "no");
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $ADMINS,
            'text' => "Boshqaruv paneliga xush kelibsiz!",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
[
                        ['text' => "📈Bot Azolari📉", 'callback_data' => "azi"]
                    ],
                    [
                        ['text' => "Xabar Yullash🙂", 'callback_data' => "send"], ['text' => "Reklama🤓", 'callback_data' => "fwd"]
                    ]
                ]
            ])
        ]);
    }     
    elseif ($data == "azisaf" && $from_id == $admins){
        file_put_contents("data/$chat_id/safargul.txt", "no");
        sendAction($chat_id, 'typing');
        bot('editmessagetext', [
            'chat_id' => $ADMINS,
            'message_id' => $message_id2,
            'text' => "Bosh Saxifaga xush kelipsiz",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "📈Bot Azolari📉", 'callback_data' => "azi"]
                    ],
                    [
                        ['text' => "Xabar Yullash🙂", 'callback_data' => "send"], ['text' => "Reklama🤓", 'callback_data' => "fwd"]
                    ]
                ]
            ])
        ]);
    } 
 elseif ($data == "azi") {
        $user = file_get_contents("users.txt");
        $member_id = explode("\n", $user);
        $odam_soni = count($member_id) - 1;
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "📃Bot Azolari : $odam_soni
",

            'show_alert' => true
        ]);
    }

	elseif ($data == "send") {
        file_put_contents("data/$chatid/safargul.txt", "send");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "📨Endi Xabaringizni Yozing🖊️",
        ]);
    } elseif ($azidil == "send") {
        file_put_contents("data/$chat_id/safargul.txt", "no");
        $fp = fopen("users.txt", 'r');
        while (!feof($fp)) {
            $ckar = fgets($fp);
              bot('sendMessage', [
            'chat_id' => $ckar, 
			 'text' => $text,
				'parse_mode'=>'MarkDown'   ]);
        }
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "*BOT AZOLARIGA YUBORILDI*",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "Bosh Menu", 'callback_data' => "azisaf"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "fwd") {
        file_put_contents("data/$chatid/safargul.txt", "fwd");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Noxost tegma menga😤",
        ]);
    } elseif ($azidil == 'fwd') {
        file_put_contents("data/$chat_id/safargul.txt", "no");
        $forp = fopen("users.txt", 'r');
        while (!feof($forp)) {
            $fakar = fgets($forp);
			bot('ForwardMessage', [
			  'chat_id' =>$fakar, 
				'from_chat_id' => $chat_id,
				'message_id' => $message_id2 ]);
        }
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "🤣🤣Kechirasiz Bu menyu ishlamardi \n\n Shuning uchun bosh Menyuga Qayta qoling \nBu bolinma ishga tushmagan hali😂",
            'reply_markup' => json_encode([
                'inline_keyboard' => [

                    [
                        ['text' => "Bosh Menu", 'callback_data' => "azisaf"]
                    ],
                ]
            ])
        ]);
    }
/*
Manba @OSIYO_HACKERLARI Kod muallifi @CoderWebUz Iltimos kodni ugirlamayla✅
*/
?>