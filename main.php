<?php
error_reporting("0");
/*
به نام خداوند بخشنده مهربان
Programmer : MohamadHosseinHeidari
V 1.0
Bot Demo : @GpModeratorbot
Dev ID : @OneDeveloper
*/
//--------------------------------------------------------------
//Add Your Bot Token :
define('API_KEY','Your Token');
//--------------------------------------------------------------
//Function Curl :
function Telegram($method,$datas=[]){
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
//--------------------------------------------------------------
//Update Telegram :
$update = json_decode(file_get_contents('php://input'));
$update2=file_get_contents('php://input');
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->username;
$textmassage = $message->text;
$chat_id2= $update->callback_query->message->chat->id;
$from_id2 = $update->callback_query->from->id;
$data = $update->callback_query->data;
$first_name2 = $update->callback_query->message->chat->first_name;
$user_name2= $update->callback_query->message->chat->username;
$message_id2 = $update->callback_query->message->message_id;
$chattype= $update->message->chat->type;
$newchatmember = $update->message->new_chat_member;
$liftchatmember = $update->message->left_chat_member;
$reply= $update->message->reply_to_message;
$replymessageid = $update->message->reply_to_message->message_id;
$replyfromid = $update->message->reply_to_message->from->id;
$chat_edit_id = $update->edited_message->chat->id;
$from_edit_id = $update->edited_message->from->id;
$newchatusername = $update->message->new_chat_member->from->username;
$stat = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$chat_id&user_id=$from_id"),true);
$status = $stat['result']['status'];
$stat2 = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$chat_edit_id&user_id=$from_edit_id"),true);
$status2 = $stat['result']['status'];
$groups = json_decode(file_get_contents("groups.json"),true);
$users = json_decode(file_get_contents("users.json"),true);
$step = $users[$from_id]["step"];
$lockphoto = $groups[$chat_id]["photo"];
$lockvideo = $groups[$chat_id]["video"];
$lockaudio= $groups[$chat_id]["audio"];
$locksticker= $groups[$chat_id]["sticker"];
$lockvoice= $groups[$chat_id]["voice"];
$lockdocument= $groups[$chat_id]["document"];
$locklocation= $groups[$chat_id]["location"];
$lockcontact= $groups[$chat_id]["contact"];
$lockmention= $groups[$chat_id]["mention"];
$lockurl= $groups[$chat_id]["url"];
$locktextlink= $groups[$chat_id]["textlink"];
$lockhashtag= $groups[$chat_id]["hashtag"];
$lockbold= $groups[$chat_id]["bold"];
$lockcode= $groups[$chat_id]["code"];
$lockitalic= $groups[$chat_id]["italic"];
$sudo = 370106794;
//--------------------------------------------------------------
//Functions :
function SendMessage($chat_id, $text){
Telegram('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>'MarkDown']);
}
function save($filename, $data){
$file = fopen($filename, 'w');
fwrite($file, $data);
fclose($file);
}
function sendAction($chat_id, $action){
Telegram('sendChataction',[
'chat_id'=>$chat_id,
'action'=>$action]);
}
function Forward($berekoja,$azchejaei,$kodompayam)
{
Telegram('ForwardMessage',[
'chat_id'=>$berekoja,
'from_chat_id'=>$azchejaei,
'message_id'=>$kodompayam
]);
}
//--------------------------------------------------------------
if($textmassage=="/start" && $chattype == "private"){
if($users[$from_id] == null){
    $users[$from_id]["step"] = "none";
    file_put_contents("users.json",json_encode($users));
  }
        sendAction($chat_id, 'typing');
	Telegram('sendmessage',[
	'chat_id'=>$chat_id,
		'text'=>"سلام دوستم گلم🌹
به ربات *GPModerator* خوش اومدی ، من میتونم شب و روز محافظ گروهت باشم و درمقابل تبلیغات انبوه کاربران واکنش نشون دهم و اون تبلیغات ها رو طبق درخواست مدیر پاک کنم😊
برای استفاده از من اول راهنما رو بخون🤧
➖➖➖
✏️_GPModerator_",
        'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
  	'resize_keyboard'=>true,
  	'inline_keyboard'=>[
   [
   ['text'=>"راهنما",'callback_data'=>'help']
   ],
   [
   ['text'=>"افزودن من به گروه",'url'=> 'https://telegram.me/GPModeratorbot?startgroup=start']
   ],
  [
                        ['text' => "کانال GPModerator", 'url' => 'https://telegram.me/GroupModerator']
   ],
   [
 ['text' => "اشتراک من با دیگران", 'switch_inline_query' => 'ads']
   ],
  	]
  	])
	
	]);
	}
elseif($data=="help"){			
Telegram('editmessagetext',[
              'chat_id'=>$chat_id2,
   'message_id'=>$message_id2,
		'text'=>"🔶با اضافه کردن این ربات به گروه گروه خود میتوانید از گروه خود دربرابر تبلیغات انبوه کاربران محافظت کنید 
برای استفاده از ربات ابتدا ان را به گروه خود اضافه کنید سپس ان را مدیر گروه خود کنید و دستور زیر را در گروه خود بفرستید :
*/add*
➖➖➖
✏️GPModerator",
                 'parse_mode'=>'MarkDown',
  	'reply_markup'=>json_encode([
  	'resize_keyboard'=>true,
  	'inline_keyboard'=>[
   [
   ['text'=>"برگشت 🔙",'callback_data'=>'back']
   ],
  	]
  	])
		]);
}
elseif($data=="back"){			
Telegram('editmessagetext',[
              'chat_id'=>$chat_id2,
   'message_id'=>$message_id2,
		'text'=>"سلام دوستم گلم🌹
به ربات *GPModerator* خوش اومدی ، من میتونم شب و روز محافظ گروهت باشم و درمقابل تبلیغات انبوه کاربران واکنش نشون دهم و اون تبلیغات ها رو طبق درخواست مدیر پاک کنم😊
برای استفاده از من اول راهنما رو بخون🤧
➖➖➖
✏️_GPModerator_",
        'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
  	'resize_keyboard'=>true,
  	'inline_keyboard'=>[
   [
   ['text'=>"راهنما",'callback_data'=>'help']
   ],
   [
   ['text'=>"افزودن من به گروه",'url'=> 'https://telegram.me/GPModeratorbot?startgroup=start']
   ],
  [
                        ['text' => "کانال GPModerator", 'url' => 'https://telegram.me/GroupModerator']
   ],
   [
 ['text' => "اشتراک من با دیگران", 'switch_inline_query' => 'ads']
   ],
  	]
  	])
	]);
}
//--------------------------------------------------------------
//Add Bot To GP :
elseif($textmassage == "/add" && $status == "creator"){
if ($chattype == 'group' | $chattype == 'supergroup'){
if($groups[$chat_id] == null){
    $groups[$chat_id]["forward"] = "false";
    $groups[$chat_id]["photo"] = "false";
	$groups[$chat_id]["video"] = "false";
    $groups[$chat_id]["contact"] = "false";
    $groups[$chat_id]["audio"] = "false";
    $groups[$chat_id]["voice"] = "false";
	$groups[$chat_id]["sticker"] = "false";
    $groups[$chat_id]["location"] = "false";
	$groups[$chat_id]["document"] = "false";
	$groups[$chat_id]["textlink"] = "false";
	$groups[$chat_id]["mention"] = "false";
	$groups[$chat_id]["url"] = "false";
	$groups[$chat_id]["hashtag"] = "false";
	$groups[$chat_id]["italic"] = "false";
	$groups[$chat_id]["bold"] = "false";
	$groups[$chat_id]["code"] = "false";
	$groups[$chat_id]["bots"] = "false";
	$groups[$chat_id]["textwelcome"] = "سلام به گروه خوش امدید";
	$groups[$chat_id]["welcome"] = "false";
        file_put_contents("users.json",json_encode($users));
    file_put_contents("groups.json",json_encode($groups));
    SendMessage($chat_id,"گروه شما درلیست مدیریتی ربات ثبت شد.\nدستور /help را وارد کنید");
}
else{
SendMessage($chat_id,"این گروه قبلا ثبت شده است");
}
}
}
//--------------------------------------------------------------
//Lock message :
if(isset($update->message->video)){
	if($status != "creator" | $status != "administrator"){
if($lockvideo == "true" ){
	Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
   }
 }
}if(isset($update->message->photo)){
		if($status != "creator" | $status != "administrator"){
if($lockphoto == "true" ){
Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
   }
 }
}if(isset($update->message->voice)){
	if($status != "creator" | $status != "administrator"){
if($lockvoice == "true" ){ 
Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
   }
 }
}if(isset($update->message->audio)){
	if($status != "creator" | $status != "administrator"){
if($lockaudio == "true" ){ 
Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
   }
     }
	     }
if(isset($update->message->sticker)){
	if($status != "creator" | $status != "administrator"){
if($locksticker == "true" ){ 
Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
   }
     }
}if(isset($update->message->document)){
	if($status != "creator" | $status != "administrator"){
if($lockdocument == "true" ){ 
    Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
   }
   }
   }
if(isset($update->message->location)){
	if($status != "creator" | $status != "administrator"){
if($locklocation == "true" ){ 
    Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
   }
   }
   }
   if(isset($update->message->contact)){
	if($status != "creator" | $status != "administrator"){
if($lockcontact == "true" ){ 
    Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
   }
   }
   }
   if(isset($update->message->forward_from) or isset($update->message->forward_from_chat)){
if($status != "creator" | $status != "administrator"){
if($lockforward == "true" ){
   Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
 }
}
}
if(isset($update->message->caption_entities)){
     $array=json_decode($update2,true);
     foreach($array['message']['caption_entities'] as $key=>$value){
       $t=$array['message']['caption_entities'][$key]['type'];
       if($t=="mention"){
		   if($status != "creator" | $status != "administrator"){
if($lockmention == "true" ){
         Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
       }
	    }
		 }if($t=="url"){
			 if($status != "creator" | $status != "administrator"){
if($lockurl == "true" ){
         Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
       }
	    }
		 }if($t=="hashtag"){
			 	 if($status != "creator" | $status != "administrator"){
if($lockhashtag == "true" ){
         Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
     
	  }
	    }
		  }if($t=="text_link"){
			  	 	 if($status != "creator" | $status != "administrator"){
if($locktextlink == "true" ){
         Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
		 }
		 }
       }if($t=="bold"){
      		  	 	 if($status != "creator" | $status != "administrator"){
if($lockbold == "true" ){
         Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
		 }
		 }
       }if($t=="code"){
        		  	 	 if($status != "creator" | $status != "administrator"){
if($lockcode == "true" ){
         Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
		 }
		 }
       }		
	   if($t=="italic"){
	     	 	 if($status != "creator" | $status != "administrator"){
if($lockitalic == "true" ){
         Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
		 }
		 }
       }
     }
   }
if(isset($update->message->entities)){
     $array=json_decode($update2,true);
     foreach($array['message']['entities'] as $key=>$value){
       $t=$array['message']['entities'][$key]['type'];
             if($t=="mention"){
		   if($status != "creator" | $status != "administrator"){
if($lockmention == "true" ){
         Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
       }
	    }
		 }if($t=="url"){
			 if($status != "creator" | $status != "administrator"){
if($lockurl == "true" ){
         Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
       }
	    }
		 }if($t=="hashtag"){
			 	 if($status != "creator" | $status != "administrator"){
if($lockhashtag == "true" ){
         Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
     
	  }
	    }
		  }if($t=="text_link"){
			  	 	 if($status != "creator" | $status != "administrator"){
if($locktextlink == "true" ){
         Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
		 }
		 }
       }if($t=="bold"){
      		  	 	 if($status != "creator" | $status != "administrator"){
if($lockbold == "true" ){
         Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
		 }
		 }
       }if($t=="code"){
        		  	 	 if($status != "creator" | $status != "administrator"){
if($lockcode == "true" ){
         Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
		 }
		 }
       }		
	   if($t=="italic"){
	     	 	 if($status != "creator" | $status != "administrator"){
if($lockitalic == "true" ){
         Telegram("deleteMessage",[
           "chat_id"=>$update->message->chat->id,
           "message_id"=>$update->message->message_id
         ]);
		 }
		 }
       }
     }
   }
   if(isset($update->edited_message)){
	   $chat_id=$update->edited_message->chat->id;
$msgid=$update->edited_message->message_id;
 if(isset($update->edited_message->entities)){
   $array=json_decode($update2,true);
     foreach($array['edited_message']['entities'] as $key=>$value){
       $t=$array['edited_message']['entities'][$key]['type'];
    if($t=="mention"){
		   if($status != "creator" | $status != "administrator"){
if($lockmention == "true" ){
         Telegram("deleteMessage",[
           "chat_id"=>$chat_id,
           "message_id"=>$magid
         ]);
       }
	    }
		 }if($t=="url"){
			 if($status != "creator" | $status != "administrator"){
if($lockurl == "true" ){
         Telegram("deleteMessage",[
           "chat_id"=>$chat_id,
           "message_id"=>$msgid
         ]);
       }
	    }
		 }if($t=="hashtag"){
			 	 if($status != "creator" | $status != "administrator"){
if($lockhashtag == "true" ){
         Telegram("deleteMessage",[
           "chat_id"=>$chat_id,
           "message_id"=>$msgid
         ]);
     
	  }
	    }
		  }if($t=="text_link"){
			  	 	 if($status != "creator" | $status != "administrator"){
if($locktextlink == "true" ){
         Telegram("deleteMessage",[
           "chat_id"=>$chat_id,
           "message_id"=>$msgid
         ]);
		 }
		 }
       }if($t=="bold"){
      		  	 	 if($status != "creator" | $status != "administrator"){
if($lockbold == "true" ){
         Telegram("deleteMessage",[
           "chat_id"=>$chat_id,
           "message_id"=>$msgid
         ]);
		 }
		 }
       }if($t=="code"){
        		  	 	 if($status != "creator" | $status != "administrator"){
if($lockcode == "true" ){
         Telegram("deleteMessage",[
           "chat_id"=>$chat_id,
           "message_id"=>$msgid
         ]);
		 }
		 }
       }		
	   if($t=="italic"){
	     	 	 if($status != "creator" | $status != "administrator"){
if($lockitalic == "true" ){
         Telegram("deleteMessage",[
           "chat_id"=>$chat_id,
           "message_id"=>$msgid
         ]);
		 }
		 }	 
		 }	 
		 } 
		 } 
		 }
		 if($update->message->new_chat_member->is_bot==true){
			 if($lockbots == "true" ){
       Telegram("kickChatMember",[
         "chat_id"=>$chat_id,
         "user_id"=>$update->message->new_chat_member->id
       ]);
     }
	 }
//--------------------------------------------------------------
//Lock Command :
	 elseif($textmassage=="/lock photo" && $status == "creator"){
	 if ($chattype == 'group' | $chattype == 'supergroup'){
         $groups[$chat_id]["photo"] = "true";
         file_put_contents("groups.json",json_encode($groups));
	 SendMessage($chat_id,"قفل ارسال عکس فعال شد.");
	 	}
	}
		 elseif($textmassage=="/unlock photo" && $status == "creator"){
	 if ($chattype == 'group' | $chattype == 'supergroup'){
         $groups[$chat_id]["photo"] = "false";
         file_put_contents("groups.json",json_encode($groups));
	 SendMessage($chat_id,"قفل ارسال عکس غیر فعال شد.");
	 	}
	}
		 elseif($textmassage=="/lock sticker" && $status == "creator"){
	 if ($chattype == 'group' | $chattype == 'supergroup'){
         $groups[$chat_id]["sticker"] = "true";
         file_put_contents("groups.json",json_encode($groups));
	 SendMessage($chat_id,"قفل ارسال استیکر فعال شد.");
	 	}
	}
		 elseif($textmassage=="/unlock sticker" && $status == "creator"){
	 if ($chattype == 'group' | $chattype == 'supergroup'){
         $groups[$chat_id]["sticker"] = "false";
         file_put_contents("groups.json",json_encode($groups));
	 SendMessage($chat_id,"قفل ارسال استیکر غیرفعال شد.");
	 	}
	}
	 elseif($textmassage=="/lock forward" && $status == "creator"){
	 if ($chattype == 'group' | $chattype == 'supergroup'){
         $groups[$chat_id]["forward"] = "true";
         file_put_contents("groups.json",json_encode($groups));
	 SendMessage($chat_id,"قفل ارسال مطلب فروارد شده فعال شد.");
	 	}
	}
		 elseif($textmassage=="/unlock forward" && $status == "creator"){
	 if ($chattype == 'group' | $chattype == 'supergroup'){
         $groups[$chat_id]["forward"] = "false";
         file_put_contents("groups.json",json_encode($groups));
	 SendMessage($chat_id,"قفل ارسال مطلب فروارد شده غیر فعال شد.");
	 	}
	}
		 elseif($textmassage=="/lock contact" && $status == "creator"){
	 if ($chattype == 'group' | $chattype == 'supergroup'){
         $groups[$chat_id]["contact"] = "true";
         file_put_contents("groups.json",json_encode($groups));
	 SendMessage($chat_id,"قفل اشتراک گزاری شماره فعال شد.");
	 	}
	}
		 elseif($textmassage=="/unlock contact" && $status == "creator"){
	 if ($chattype == 'group' | $chattype == 'supergroup'){
         $groups[$chat_id]["contact"] = "false";
         file_put_contents("groups.json",json_encode($groups));
	 SendMessage($chat_id,"قفل اشتراک گزاری شماره غیرفعال شد.");
	 	}
	}
		 elseif($textmassage=="/lock hashtag" && $status == "creator"){
	 if ($chattype == 'group' | $chattype == 'supergroup'){
         $groups[$chat_id]["hashtag"] = "true";
         file_put_contents("groups.json",json_encode($groups));
	 SendMessage($chat_id,"قفل ارسال یوزرنیم فعال شد.");
	 	}
	}
		 elseif($textmassage=="/unlock hashtag" && $status == "creator"){
	 if ($chattype == 'group' | $chattype == 'supergroup'){
         $groups[$chat_id]["hashtag"] = "false";
         file_put_contents("groups.json",json_encode($groups));
	 SendMessage($chat_id,"قفل ارسال یوزرنیم غیرفعال شد.");
	 	}
	}
		 elseif($textmassage=="/lock url" && $status == "creator"){
	 if ($chattype == 'group' | $chattype == 'supergroup'){
         $groups[$chat_id]["url"] = "true";
         file_put_contents("groups.json",json_encode($groups));
	 SendMessage($chat_id,"قفل ارسال لینک فعال شد.");
	 	}
	}
		 elseif($textmassage=="/unlock url" && $status == "creator"){
	 if ($chattype == 'group' | $chattype == 'supergroup'){
         $groups[$chat_id]["url"] = "false";
         file_put_contents("groups.json",json_encode($groups));
	 SendMessage($chat_id,"قفل ارسال لینک غیر فعال شد.");
	 	}
		}
			 elseif($textmassage=="/lock bots" && $status == "creator"){
	 if ($chattype == 'group' | $chattype == 'supergroup'){
         $groups[$chat_id]["bots"] = "true";
         file_put_contents("groups.json",json_encode($groups));
	 SendMessage($chat_id,"قفل ورود ربات ها فعال شد.");
	 	}
	}
		 elseif($textmassage=="/unlock bots" && $status == "creator"){
	 if ($chattype == 'group' | $chattype == 'supergroup'){
         $groups[$chat_id]["bots"] = "false";
         file_put_contents("groups.json",json_encode($groups));
	 SendMessage($chat_id,"قفل ورود ربات ها غیرفعال شد.");
	 	}
		}
	 elseif($textmassage=="/welcome enable" && $status == "creator"){
	 if ($chattype == 'group' | $chattype == 'supergroup'){
         $groups[$chat_id]["welcome"] = "true";
         file_put_contents("groups.json",json_encode($groups));
	 SendMessage($chat_id,"حالت خوش امدگویی به عضو جدید فعال شد.");
	 	}
		}
		elseif($textmassage=="/welcome disable" && $status == "creator"){
	 if ($chattype == 'group' | $chattype == 'supergroup'){
         $groups[$chat_id]["welcome"] = "false";
         file_put_contents("groups.json",json_encode($groups));
	 SendMessage($chat_id,"حالت خوش امدگویی به عضو جدید غیرفعال شد.");
	 	}
		}
//--------------------------------------------------------------
// commands list :	 
elseif($textmassage=="/help" && $status == "creator"){
	 if ($chattype == 'group' | $chattype == 'supergroup'){
	 SendMessage($chat_id,"لیست راهنما :\n>راهنمای بخش دریافت تنظیمات و مدیریت کاربران
             *➖➖➖➖➖➖*
             >راهنمای دستورات مدیریتی
             *[/]lock|unlock url* ➖ (فعال سازی/غیرفعال سازی قفل ارسال لینک)
			 *[/]lock|unlock document* ➖ (فعال سازی/غیرفعال سازی قفل ارسال فایل)
             *[/]lock|unlock hashtag* ➖ (فعال سازی/غیرفعال سازی قفل ارسال یوزرنیم)
             *[/]lock|unlock sticker* ➖ (فعال سازی/غیرفعال سازی قفل ارسال استیکر)
             *[/]lock|unlock contact* ➖ (فعال سازی/غیرفعال سازی قفل اشتراک گزاری شماره)
             *[/]lock|unlock forward* ➖ (فعال سازی/غیرفعال سازی قفل ارسال فوروارد)
             *[/]lock|unlock photo* ➖ (فعال سازی/غیرفعال سازی قفل ارسال تصویر)</code>
             *[/]lock|unlock audio* ➖ (فعال سازی/غیرفعال سازی قفل ارسال موسیقی(Audio))
             *[/]lock|unlock voice* ➖ (فعال سازی/غیرفعال سازی قفل ارسال صدا(Voice))
             *[/]lock|unlock location* ➖ (فعال سازی/غیرفعال سازی قفل اشتراک گزاری مکان)
             *[/]lock|unlock video* ➖ (فعال سازی/غیرفعال سازی قفل ارسال ویدیو)
			 *[/]lock|unlock mention* ➖ (فعال سازی/غیرفعال سازی قفل ارسال منشن)
			 *[/]lock|unlock bold* ➖ (فعال سازی/غیرفعال سازی قفل ارسال کلمات درشت)
			 *[/]lock|unlock code* ➖ (فعال سازی/غیرفعال سازی قفل ارسال کلمات کدشده) 
			 *[/]lock|unlock italic* ➖ (فعال سازی/غیرفعال سازی قفل ارسال کلمات کج شده)
			 *[/]lock|unlock hyperlink* ➖ (فعال سازی/غیرفعال سازی قفل ارسال متن هایپرلینک)
             *[/]lock|unlock bots* ➖ (فعال سازی/غیرفعال سازی قفل ورود ربات ها)
             *➖➖➖➖➖➖*
             >راهنمای حذف پیام
             *[/]rmsg [Number]* ➖ (حذف پیام به تعداد معین (بین 0 و100))
             *➖➖➖➖➖➖*
             >راهنمای بخش خوش امدگویی
             *[/]welcome enable|disable * ➖ (فعال سازی/غیرفعال سازی عملیات خوش امدگویی)
             *[/]set welcome* ➖ (تنظیم پیغام خوش امدگویی)
             *➖➖➖➖➖➖*
             >راهنمای دستورات توضیحاتی گروه
             *➖➖➖➖➖➖*
             *[/]setname [Name]* ➖ (تنظیم نام گروه)
             *[/]setdescription [Text]* ➖ (تنظیم توضیحات گروه)
             *[/]setphoto* ➖ (تنظیم تصویر گروه)
             *[/]delphoto* ➖ (حذف تصویر گروه)
             *[/]pin [reply]* ➖ (پین کردن یک پیام با ریپلای)
             *[/]unpin [reply]* ➖ (برداشتن پین با ریپلای)
             *[/]link* ➖ (دریافت لینک گروه)");
	 	}
		}
//--------------------------------------------------------------
// Commands Edit Group	 :	
elseif ( strpos($textmassage , '/rmsg') !== false  ) {
if ($chattype == 'group' | $chattype == 'supergroup'){
if ($status == "creator"){
$num = str_replace("/rmsg","",$textmassage);
if ($num <= 100 && $num >= 1){
for($i=$message_id; $i>=$message_id-$num; $i--){
Telegram('deletemessage',[
 'chat_id' => $chat_id,
 'message_id' =>$i,
              ]);
}
Telegram('sendmessage',[
 'chat_id' => $chat_id,
 'text' =>"تعداد $num پیام پاک شد.",
              ]);
}else{
Telegram('sendmessage',[
 'chat_id' => $chat_id,
 'text'=>"اخطار\nعدد باید بین 1 و 100 باشد.",
              ]);
}
}
}
}
elseif (strpos($textmassage , "/setwelcome") !== false && $status == "creator") {
if ($chattype == 'group' | $chattype == 'supergroup'){
$we = str_replace("/setwelcome","",$textmassage);
$groups[$chat_id]["textwelcome"] = "$we";
file_put_contents("groups.json",json_encode($groups));
SendMessage($chat_id,"متن خوش امدگویی تغییر یافت.");
}
}
elseif($textmassage=="/setphoto" && $status == "creator"){
	$users[$from_id]["step"] = "setphoto";
file_put_contents("users.json",json_encode($users));
if ($chattype == 'group' | $chattype == 'supergroup'){
sendAction($chat_id, 'typing');
Telegram('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"عکس خود را بفرستید :",
  'parse_mode'=>'MarkDown',
 ]);
 }
}
elseif($step=="setphoto"){
if ($chattype == 'group' | $chattype == 'supergroup'){
	$rand = rand(1,999);
$photo = $update->message->photo;
$file = $photo[count($photo)-1]->file_id;
      $get = Telegram('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
    file_put_contents("$rand.png",file_get_contents("https://api.telegram.org/file/bot".API_KEY."/$patch"));
Telegram('setChatPhoto',[
   'chat_id'=>$chat_id,
   'photo'=>new CURLFile("$rand.png")
     ]);
Telegram('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"تصویر گروه تغییر یافت.",
  'parse_mode'=>'MarkDown',
 ]);
 unlink("$rand.png");
 }
}
elseif ( strpos($textmassage , '/setname') !== false  && $status == "creator" ) {
  $newname= str_replace("/setname","",$textmassage);
if ($chattype == 'group' | $chattype == 'supergroup'){
sendAction($chat_id, 'typing');
 Telegram('setChatTitle',[
    'chat_id'=>$chat_id,
    'title'=>$newname
      ]);
Telegam('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"نام گروه تغییر یافت.",
  'parse_mode'=>'MarkDown',
 ]);
 }
}
elseif ( strpos($textmassage , '/setdescription') !== false && $status == "creator" ) {
  $newdec= str_replace("/setdescription","",$textmassage);
if ($chattype == 'group' | $chattype == 'supergroup'){
sendAction($chat_id, 'typing');
 Telegam('setChatDescription',[
    'chat_id'=>$chat_id,
    'description'=>$newdec
      ]);
Telegam('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"توضیحات گروه تغییر یافت.",
  'parse_mode'=>'MarkDown',
 ]);
 }
}
elseif($textmassage=="/delphoto" && $status == "creator"){
if ($chattype == 'group' | $chattype == 'supergroup'){
Telegam('deleteChatPhoto',[
   'chat_id'=>$chat_id,
     ]);
Telegam('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"تصویر گروه حذف شد.",
  'parse_mode'=>'MarkDown',
 ]);
 }
}
elseif($reply && $textmassage=="/unpin"  && $status == "creator"){
if ($chattype == 'group' | $chattype == 'supergroup'){
 Telegam('unpinChatMessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$replymessageid
      ]);
Telegam('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"انجام شد.",
 'parse_mode'=>'MarkDown'
 ]);
 }
}
elseif($rt && $textmassage=="/pin" && $status == "creator"){
if ($chattype == 'group' | $chattype == 'supergroup'){
 Telegam('pinChatMessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$replyid
      ]);
Telegam('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"پیام مورد نظر سنجاق شد.",
  'parse_mode'=>'MarkDown',
 ]);
 }
}
elseif($textmassage=="/link"  && $status == "creator"){
if ($chattype == 'group' | $chattype == 'supergroup'){
$getlink = file_get_contents("https://api.telegram.org/bot".API_KEY."/exportChatInviteLink?chat_id=$chat_id");
$jsonlink = json_decode($getlink, true);
$getlinkde = $jsonlink['result'];
sendAction($chat_id, 'typing');
Telegam('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>"لینک گروه :\n$getlinkde",
    'parse_mode'=>'html',
     ]);
 }
}
//---------------------------------------------------------------
// Inline 
elseif ($update->inline_qurey->qurey == "ads") {
{
   Telegam('answerInlineQuery', [
        'inline_query_id' => $update->inline_query->id,
        'results' => json_encode([[
            'type' => 'article',
             'thumb_url'=>"http://up.upinja.com/mpjd9.jpg",
            'id' => base64_encode(rand(5, 555)),
            'title' => 'بنر تبلیغاتی',
            'input_message_content' => [
			'parse_mode' => 'MarkDown', 
			'message_text' => "ربات جديد و حرفه اي مديريت گروه
باقابليت هاي فراوان
ازجمله :
داراي تمام قفل هاي مديريتي
قفل وارد کردن ربات ها
قابليت شناسي ادمين ن عدم پاک کردن پيام هاي او
قابليت پاک کردن پيام
با سرعت بالا
بدون هيچ مشکلي
داراي عمليات پيغام خوش امدگويي
و...
➖➖➖
*GPModerator AntiSpamBot*"],
            'reply_markup' => [
                'inline_keyboard' => [
                    [
                        ['text' => "عضویت در ربات", 'url' => 'https://telegram.me/GPModeratorBot']
                    ],
                    [
                        ['text' => "اشتراک با دیگران", 'switch_inline_query' => 'ads']
                    ]
                ]
            ]
        ]])
    ]);
}
}
