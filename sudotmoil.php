<?php

if($countban<=0){
$countban="لايوجد محظورين";
}
if($text == "/start" and in_array($from_id,$sudo)){

bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"اهلا بك عزيزي الادمن في قائمة التحكم الخاص 

- الاحصائية : 

• عدد الاعضاء : $cunte

• المحظورين: $countban

",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- تعيين رسالة /start ",'callback_data'=>"start"]],
[['text'=>"- كليشة معلومات عن البوت ",'callback_data'=>"klis_info"]]
,[['text'=>"- التوجية من الاعضاء :$fwrmember",'callback_data'=>"fwrmember"]],
[['text'=>"- تنبية دخول الاعضاء : $tnbih",'callback_data'=>"tnbih"]],
[['text'=>"- حظر عضو ",'callback_data'=>"ban"],['text'=>"- الغاء حظر عضو ",'callback_data'=>"unban"]],
[['text'=>"- مسح قائمة الحظر ",'callback_data'=>"unbanall"]],
[['text'=>"- قسم الادمنية ",'callback_data'=>"admins"],['text'=>"- قسم الاذاعة ",'callback_data'=>"sendmessage"]],
[['text'=>"مسح قناة",'callback_data'=>"delchannel"],['text'=>"إضافة قناة",'callback_data'=>"addchannel"]],[['text'=>"- عرض قنوات الاشتراك الاجباري ",'callback_data'=>"viwechannel"]],
[['text'=>"- تعيين رسالة الاشتراك الاجباري ",'callback_data'=>"klish_sil"]],
[['text'=>"- خيارات عرض الاشتراك الاجباري ",'callback_data'=>"null"]],
[['text'=>"- ازرار انلاين :$silk ",'callback_data'=>"silk"],
['text'=>"- الرسالة :$allch ",'callback_data'=>"allch"]],
[['text'=>"- إعدادات بوت التمويل",'callback_data'=>"stingbot"]],

]
])
]);
}

function sendwataw($chat_id,$message_id){

$infosudo = json_decode(file_get_contents("sudo.json"),true);
$fwrmember=$infosudo["info"]["fwrmember"];
$tnbih=$infosudo["info"]["tnbih"];
$silk=$infosudo["info"]["silk"];
$allch=$infosudo["info"]["allch"];
$member = explode("\n",file_get_contents("sudo/member.txt"));
$cunte = count($member)-1;
$ban = explode("\n",file_get_contents("sudo/ban.txt"));
$countban = count($ban)-1;
if($countban<=0){
$countban="لايوجد محظورين";
}	

bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"اهلا بك عزيزي الادمن في قائمة التحكم الخاص 

- الاحصائية : 

• عدد الاعضاء : $cunte

• المحظورين: $countban

",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- تعيين رسالة /start ",'callback_data'=>"start"]],
[['text'=>"- كليشة معلومات عن البوت ",'callback_data'=>"klis_info"]]
,
[['text'=>"- التوجية من الاعضاء :$fwrmember",'callback_data'=>"fwrmember"]],


[['text'=>"- تنبية دخول الاعضاء : $tnbih",'callback_data'=>"tnbih"]],
[['text'=>"- حظر عضو ",'callback_data'=>"ban"],['text'=>"- الغاء حظر عضو ",'callback_data'=>"unban"]],
[['text'=>"- مسح قائمة الحظر ",'callback_data'=>"unbanall"]],
[['text'=>"- قسم الادمنية ",'callback_data'=>"mshmsadmins"],['text'=>"- قسم الاذاعة ",'callback_data'=>"sendmessage"]],
[['text'=>"مسح قناة",'callback_data'=>"delchannel"],['text'=>"إضافة قناة",'callback_data'=>"addchannel"]],

[['text'=>"- عرض قنوات الاشتراك الاجباري ",'callback_data'=>"viwechannel"]],
[['text'=>"- تعيين رسالة الاشتراك الاجباري ",'callback_data'=>"klish_sil"]],
[['text'=>"- خيارات عرض الاشتراك الاجباري ",'callback_data'=>"null"]],
[['text'=>"- ازرار انلاين :$silk ",'callback_data'=>"silk"],
['text'=>"- الرسالة :$allch ",'callback_data'=>"allch"]],
[['text'=>"- إعدادات بوت التمويل",'callback_data'=>"stingbot"]],


]
])
]);
} 

#home
if($data == "home" and in_array($from_id,$sudo)){
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
sendwataw($chat_id,$message_id);
}

 ###wataw### 
#رسالة ستارت
@$infosudo = json_decode(file_get_contents("sudo.json"),true);
$sudoamr= $infosudo["info"]["amr"];
if($data == "start"){
$infosudo["info"]["amr"]="start";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال نص كليشة /start
",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $sudoamr=="start" and in_array($from_id,$sudo)){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ كليشة /start 
-الكليشة : 
$text ",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
$infosudo["info"]["amr"]="null";
$infosudo["info"]["start"]="$text";
file_put_contents("sudo.json", json_encode($infosudo));
}
#كليشة معلومات البوت 
if($data == "klis_info"){
$infosudo["info"]["amr"]="klis_info";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال نص رسالة كليشة نبذة عن البوت
",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $sudoamr=="klis_info" and in_array($from_id,$sudo)){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ كليشة نبذة عن البوت 
-الكليشة : 
$text ",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
$infosudo["info"]["amr"]="null";
$infosudo["info"]["klish_info"]="$text";
file_put_contents("sudo.json", json_encode($infosudo));
}
#التوجية من الاعضاء 
if($data == "fwrmember"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$fwrmember=$infosudo["info"]["fwrmember"];
if($fwrmember=="مفعل"){
$infosudo["info"]["fwrmember"]="معطل";
}
if($fwrmember=="معطل"){
$infosudo["info"]["fwrmember"]="مفعل";
}
file_put_contents("sudo.json", json_encode($infosudo));
sendwataw($chat_id,$message_id);
}
#تنبية الدخول
if($data == "tnbih"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$tnbih=$infosudo["info"]["tnbih"];
if($tnbih=="مفعل"){
$infosudo["info"]["tnbih"]="معطل";
}
if($tnbih=="معطل"){
$infosudo["info"]["tnbih"]="مفعل";
}
file_put_contents("sudo.json", json_encode($infosudo));
sendwataw($chat_id,$message_id);
}
#حظر عضو 

if($data == "ban"){
$infosudo["info"]["amr"]="ban";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال أيدي العضو لحظره",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $sudoamr=="ban" and in_array($from_id,$sudo) and is_numeric($text)){
if(!in_array($text,$ban)){

file_put_contents("sudo/ban.txt","$text\n",FILE_APPEND);

bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حظر العضو بنجاح 
$text",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
bot('sendmessage',[
'chat_id'=>$text, 
'text'=>"❌ لقد قام الادمن بحظرك من استخدام البوت",
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"🚫 العضو محظور مسبقاً",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
}
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
}
#الغاء الحظر
if($data == "unban"){
$infosudo["info"]["amr"]="unban";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال أيدي العضو للإلغاء الحظر عنه",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $sudoamr=="unban" and in_array($from_id,$sudo) and is_numeric($text)){
if(in_array($text,$ban)){

$str=file_get_contents("sudo/ban.txt");
$str=str_replace("$text\n",'',$str);
file_put_contents("sudo/ban.txt",$str);
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم الغاء حظر العضو بنجاح 
$text",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);

bot('sendmessage',[
'chat_id'=>$text, 
'text'=>"✅ لقد قام الادمن بالغاء الحظر عنك  .",
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"🚫 العضو ليسِ محظور مسبقاً",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
}
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
}

if($data == "unbanall"){
if($countban>0){
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم مسح قائمة المحظورين بنجاح ",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);
}else{
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"🚫 ليس لديك اعضاء محظورين ",
        'show_alert'=>true
        ]);

}
}

#قسم الادمنية

if($data == "admins" and $from_id==$admin){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["admins"];


$keyboard["inline_keyboard"]=[];

foreach($orothe as $co=>$sss ){


if($co!=null and $co!=$admin ){

$keyboard["inline_keyboard"][] =
[['text'=>' 🗑','callback_data'=>'deleteadmin '.$co.'#'.$sss],['text'=>$sss,'callback_data'=>'null']];
}}
	$keyboard["inline_keyboard"][] = [['text'=>"- اضافة ادمن  ",'callback_data'=>"addadmin"]];
	$keyboard["inline_keyboard"][] = [['text'=>"- عودة  ",'callback_data'=>"home"]];
$reply_markup=json_encode($keyboard);
	
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- تستطيع فقط رفع 5 ادمنية 
*تنوية : الادمنية يستطيعون التحكم بإعدادات البوت ماعدا قسم الادمنية .
",

'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>$reply_markup
]);

}
#اضافة ادمن
if($data == "addadmin"){
$infosudo["info"]["amr"]="addadmin";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال ايدي الادمن 
",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);
}

if($text  and $text !="/start" and $sudoamr == "addadmin" and $from_id ==$admin and is_numeric($text)){
if(!in_array($text,$admins)){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["admins"];
$count=count($orothe);
if($count<6){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ  رفع الادمن بنجاح",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"admins"]],
]
])
]);
$infosudo["info"]["admins"][]="$text";
}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"🚫 لايمكنك اضافة اكثر من 5 ادمنية ً",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"admins"]],
]
])
]);
}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ⚠ الادمن مضاف مسبقاً",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"admins"]],
]
])
]);
}
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));

}
#حذف ادمن
if(preg_match('/^(deleteadmin) (.*)/s', $data)){
$nn = str_replace('deleteadmin ',"",$data);
$ex=explode('#',$nn);
$id=$ex[1];
$n=$ex[0];

bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حذف الادمن بنجاح 
-id `$id`
",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- عودة  ",'callback_data'=>"admins"]],
 ]])
]);
unset($infosudo["info"]["admins"][$n]);
$infosudo["info"]["admins"]=array_values($infosudo["info"]["admins"]);
file_put_contents("sudo.json", json_encode($infosudo));
}
#قسم الاذاعة : 
$no3send =file_get_contents("no3send.txt");
$chatsend=file_get_contents("chatsend.txt");

if($data == "sendmessage" and  in_array($from_id,$sudo)){

bot('EditMessageText',[
'chat_id'=>$chat_id,
'text'=>"🙋🏻‍♂ ¦› أهلا بك عزيزي في قسم الاذاعة
🔘 ¦› قم بتحديد نوع الاذاعة ومكان ارسال الاذاعة
ثم قم الضغط على ارسال الرسالة 
",'message_id'=>$message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"نوع الاذاعة : $no3send",'callback_data'=>"button"]],
[['text'=>"توجية",'callback_data'=>"forward"],
['text'=>"MARKDOWN",'callback_data'=>"MARKDOWN"],['text'=>"HTML",'callback_data'=>"HTML"]],
[['text'=>"الارسال الى  : $chatsend",'callback_data'=>"button"]],
[['text'=>"الكل",'callback_data'=>"all"],
['text'=>"الاعضاء",'callback_data'=>"member"]],
[['text'=>"القروبات",'callback_data'=>"gruops"],
['text'=>"القنوات",'callback_data'=>"channel"]],
[['text'=>"ارسال الرسالة",'callback_data'=>"post"]],
[['text'=>" - العودة ",'callback_data'=>"home"]],


]
])
]);
}
function sendwataw2($chat_id,$message_id){
$no3send =file_get_contents("no3send.txt");
$chatsend=file_get_contents("chatsend.txt");

bot('EditMessageText',[
'chat_id'=>$chat_id,
'text'=>"🙋🏻‍♂ ¦› أهلا بك عزيزي في قسم الاذاعة
🔘 ¦› قم بتحديد نوع الاذاعة ومكان ارسال الاذاعة
ثم قم  الضغط على ارسال الرسالة
"
,'message_id'=>$message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"نوع الاذاعة : $no3send",'callback_data'=>"button"]],
[['text'=>"توجية",'callback_data'=>"forward"],
['text'=>"MARKDOWN",'callback_data'=>"MARKDOWN"],['text'=>"HTML",'callback_data'=>"HTML"]],
[['text'=>"الارسال الى  : $chatsend",'callback_data'=>"button"]],
[['text'=>"الكل",'callback_data'=>"all"],
['text'=>"الاعضاء",'callback_data'=>"member"]],
[['text'=>"القروبات",'callback_data'=>"gruops"],
['text'=>"القنوات",'callback_data'=>"channel"]],
[['text'=>"ارسال الرسالة",'callback_data'=>"post"]],
[['text'=>" - العودة ",'callback_data'=>"home"]],
]
])
]);
} 
 ###wataw### 


//~~~~~~~~~~~//
if($data == "forward"){
file_put_contents("no3send.txt","forward");
sendwataw2($chat_id,$message_id);

}


if($data == "MARKDOWN"){
file_put_contents("no3send.txt","MARKDOWN");
sendwataw2($chat_id,$message_id);

}
if($data == "HTML"){
file_put_contents("no3send.txt","html");
sendwataw2($chat_id,$message_id);

}

//~~~~~~~~~~~//
if($data == "all"){
file_put_contents("chatsend.txt","all");
sendwataw2($chat_id,$message_id);


}


if($data == "member"){
file_put_contents("chatsend.txt","member");
sendwataw2($chat_id,$message_id);


}
if($data == "gruops"){
file_put_contents("chatsend.txt","gruops");
sendwataw2($chat_id,$message_id);

}

if($data == "channel"){
file_put_contents("chatsend.txt","channel");
sendwataw2($chat_id,$message_id);

}


$no3send =file_get_contents("no3send.txt");
$chatsend=file_get_contents("chatsend.txt");
if($data == "post" and $no3send!=null and $chatsend!=null and  in_array($from_id,$sudo) ){
$infosudo["info"]["amr"]="sendsend";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'message_id'=>$message_id,
'chat_id'=>$chat_id,
'text'=>"قم بارسال رسالتك الان  
نوع الارسال : $no3send
مكان الارسال : $chatsend
",
'message_id'=>$message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"الغاء",'callback_data'=>"set"]],

]
])
]);
}
if($data == "set" and  in_array($from_id,$sudo) ){
$infosudo["info"]["amr"]="none";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id,
'text'=>"تم إلغاء الارسال بنجاح 
",
'message_id'=>$message_id,
]);
} 
 ###wataw### 

$forward = $update->message->forward_from;
$photo=$message->photo;
$video=$message->video;
$document=$message->document;
$sticker=$message->sticker;
$voice=$message->voice;
$audio=$message->audio;

$member =file_get_contents("sudo/member.txt");


if($photo){
$sens="sendphoto";
$file_id = $update->message->photo[1]->file_id;
}
if($document){
$sens="senddocument";
$file_id = $update->message->document->file_id;
}
if($video){
$sens="sendvideo";
$file_id = $update->message->video->file_id;
}

if($audio){
$sens="sendaudio";
$file_id = $update->message->audio->file_id;
}

if($voice){
$sens="sendvoice";
$file_id = $update->message->voice->file_id;
}

if($sticker){
$sens="sendsticker";
$file_id = $update->message->sticker->file_id;
}



 ###wataw### 


##تنفيذ الاذاعة 
if($message  and $text !="الاذاعة" and $sudoamr == "sendsend" and $no3send=="forward" and  in_array($from_id,$sudo) ){
$infosudo["info"]["amr"]="none";
file_put_contents("sudo.json", json_encode($infosudo));
if($chatsend=="all"){

$for=$member.$groups.$channels;
$txt=" تم التوجية - عام للجميع";
}
if($chatsend=="member"){
$for=$member;
$txt="  تم التوجية - خاص - للاعضاء فقط";
}
if($chatsend=="gruops"){
$for=$groups;
$txt=" تم التوجية - خاص - القروبات فقط";
}

if($chatsend=="channel"){
$txt=" تم التوجية - خاص - القنوات فقط";
$for=$channels;
}
#file_put_contents("get.txt","0");
#file_put_contents("sudo/send.txt","$for");
$foor=explode("\n",$for);
bot('ForwardMessage',[
 'chat_id'=>$chat_id,
 'from_chat_id'=>$chat_id,
 'message_id'=>$message->message_id,
]);
for($i=0;$i<count($foor); $i++){
bot('ForwardMessage',[
 'chat_id'=>$foor[$i],
 'from_chat_id'=>$chat_id,
 'message_id'=>$message->message_id,
]);

}
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅ $txt
",
'message_id'=>$message_id,
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'عودة ' ,'callback_data'=>"home"]],
]])
]);

unlink("no3send.txt");
unlink("chatsend.txt");


}


if($message and $text !="الاذاعة"  and $sudoamr == "sendsend"and $no3send !="forward" and  in_array($from_id,$sudo) ){
$infosudo["info"]["amr"]="none";
file_put_contents("sudo.json", json_encode($infosudo));
if($chatsend=="all"){

$for=$member.$groups.$channels;
$txt=" تم النشر - عام للجميع";
}
if($chatsend=="member"){
$for=$member;
$txt=" تم النشر - خاص - للاعضاء فقط";
}
if($chatsend=="gruops"){
$for=$groups;
$txt=" تم النشر - خاص - القروبات فقط";
}

if($chatsend=="channel"){
$txt=" تم النشر - خاص - القنوات فقط";
$for=$channels;
}
#file_put_contents("sudo/send.txt","$for");
#file_put_contents("get.txt","0");
$foor=explode("\n",$for);
if($text){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"$text",
'parse_mode'=>"$no3send",
'disable_web_page_preview'=>true,

]);

for($i=0;$i<count($foor); $i++){ 
bot('sendMessage', [
'chat_id'=>$foor[$i],
'text'=>"$text",
'parse_mode'=>"$no3send",
'disable_web_page_preview'=>true,
]);
}
}else{
$ss=str_replace("send","",$sens);
bot($sens,[
"chat_id"=>$chat_id,
"$ss"=>"$file_id",
'caption'=>"$caption",
]);

for($i=0;$i<count($foor); $i++){
 
$ss=str_replace("send","",$sens);
bot($sens,[
"chat_id"=>$foor[$i],
"$ss"=>"$file_id",
'caption'=>"$caption",

]);
}
}
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅ $txt
"
,'message_id'=>$message_id,
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>' عودة ' ,'callback_data'=>"home"]],
]])
]);
unlink("no3send.txt");
unlink("chatsend.txt");

} 

#مسح قناة 

if($data == "delchannel" and in_array($from_id, $sudo)){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["channel"];


$keyboard["inline_keyboard"]=[];

foreach($orothe as $co=>$s ){

$namechannel= $s["name"];
$st= $s["st"];
$userchannel= $s["user"];
if($namechannel!=null){
	$keyboard["inline_keyboard"][] = [['text'=>$namechannel,'callback_data'=>'null']];
if($st=="خاصة"){
$userchannel="null";
}
$keyboard["inline_keyboard"][] =
[['text'=>'🚫 حذف','callback_data'=>'deletchannel '.$co],['text'=>$st,'callback_data'=>'null']];
}}
	$keyboard["inline_keyboard"][] = [['text'=>"- عودة  ",'callback_data'=>"home"]];
$reply_markup=json_encode($keyboard);
	
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بالضغط على خيار الحذف بالاسفل 
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>$reply_markup
]);

}

if(preg_match('/^(deletchannel) (.*)/s', $data)){
$nn = str_replace('deletchannel ',"",$data);
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حذف القناة بنجاح 
-id $nn
",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

 [['text'=>"- عودة  ",'callback_data'=>"delchannel"]],
 ]])
]);
unset($infosudo["info"]["channel"][$nn]);
file_put_contents("sudo.json", json_encode($infosudo));
}


#اضافة قناة 

if($data == "addchannel"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["channel"];
$count=count($orothe);
if($count<4){
$infosudo["info"]["amr"]="addchannel";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- اذا كانت القناة التي تريد اضافتها عامة قم بارسال معرفها .
* اذا كانت خاصة قم بإعادة توجية منشور من القناة إلى هنا .
",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);
}else{
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- 🚫 لا يمكنك اضافة اكثر من  3 قنوات للإشتراك الاجباري 
",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
}
}
if($text  and $text !="/start" and $sudoamr=="addchannel" and in_array($from_id,$sudo) and !$message->forward_from_chat ){

$ch_id = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->id;
$idchan=$ch_id;
if($ch_id != null){

  $checkadmin = getChatstats($text,$token);
  if($checkadmin == true){
$namechannel = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->title;
$infosudo["info"]["channel"][$ch_id]["st"]="عامة";
$infosudo["info"]["channel"][$ch_id]["user"]="$text";
$infosudo["info"]["channel"][$ch_id]["name"]="$namechannel";
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
✅ تم إضافة القناة بنجاح عزيزي الادمن 
info channel 
user : $text 
name : $namechannel
id : $ch_id
 ", 'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- إضافة قناة آخرى  ",'callback_data'=>"addchannel"]],
 ]])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"❌ البوت ليس ادمن في القناة 
- قم برفع البوت اولا لكي تتمكن من إضافتها 
 ",
'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- إعادة المحاولة   ",'callback_data'=>"addchannel"]],
 ]])
]);

}
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
❌ لم تتم إضافة القناة لا توجد قناة تمتلك هذا المعرف 
$text ",
'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- عودة   ",'callback_data'=>"home"]],
 ]])
]);
}
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
}


if($message->forward_from_chat and $sudoamr=="addchannel" and in_array($from_id, $sudo)){
$id_channel= $message->forward_from_chat->id;
if($id_channel != null){

  $checkadmin = getChatstats($id_channel,$token);
  if($checkadmin == true){
$namechannel = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$id_channel"))->result->title;
$infosudo["info"]["channel_id"]="$id_channel";


bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
✅ تم إضافة القناة بنجاح عزيزي الادمن 
info channel 
user : • قناة خاصة • 
name : $namechannel
id : $id_channel

*يجب عليك ارسال رابط القناة الخاص قم بارسالة الان
 ", 'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- الغاء ",'callback_data'=>"addchannel"]],
 ]])
 ]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"❌ البوت ليس ادمن في القناة 
- قم برفع البوت اولا لكي تتمكن من إضافتها 
 ",
'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- إعادة المحاولة   ",'callback_data'=>"addchannel"]],
 ]])
]);

}
}
$infosudo["info"]["amr"]="channel_id";
file_put_contents("sudo.json", json_encode($infosudo));
}
$channel_id=$infosudo["info"]["channel_id"];

if($text  and $text !="/start" and $sudoamr=="channel_id" and in_array($from_id,$sudo) and !$message->forward_from_chat ){

  $checkadmin = getChatstats($channel_id,$token);
  if($checkadmin == true){
$namechannel = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$channel_id"))->result->title;
$infosudo["info"]["channel"][$channel_id]["st"]="خاصة";
$infosudo["info"]["channel"][$channel_id]["user"]="$text";
$infosudo["info"]["channel"][$channel_id]["name"]="$namechannel";
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
✅ تم إضافة القناة بنجاح عزيزي الادمن 
info channel 
link : $text 
name : $namechannel
id : $channel_id
 ", 'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- إضافة قناة آخرى  ",'callback_data'=>"addchannel"]],
 ]])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"❌ البوت ليس ادمن في القناة 
- قم برفع البوت اولا لكي تتمكن من إضافتها 
 ",
'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- إعادة المحاولة   ",'callback_data'=>"addchannel"]],
 ]])
]);
}
$infosudo["info"]["amr"]="null";
$infosudo["info"]["channel_id"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
}


# عرض القنوات

if($data == "viwechannel" and in_array($from_id, $sudo)){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["channel"];


$keyboard["inline_keyboard"]=[];

foreach($orothe as $co ){

$namechannel= $co["name"];
$st= $co["st"];
$userchannel= $co["user"];
if($namechannel!=null){
	$keyboard["inline_keyboard"][] = [['text'=>$namechannel,'callback_data'=>'null']];
if($st=="خاصة"){
$userchannel="null";
}
$keyboard["inline_keyboard"][] =
[['text'=>$userchannel,'callback_data'=>'null'],['text'=>$st,'callback_data'=>'null']];
}}
	$keyboard["inline_keyboard"][] = [['text'=>"- عودة  ",'callback_data'=>"home"]];
$reply_markup=json_encode($keyboard);
	
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- هذة هي قنوات الاشتراك الاجباري الخاصة بك 
",
"message_id"=>$message_id,
'reply_markup'=>$reply_markup
]);
}

#كليشة الاشتراك 

if($data == "klish_sil"){
$infosudo["info"]["amr"]="klish_sil";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال كليشة الاشتراك الاجباريي 
","message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);
}
if($text  and $text !="/start" and $sudoamr=="klish_sil" and in_array($from_id,$sudo)){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ كليشة الاشتراك الاجباري 
-الكليشة : 
$text ",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
$infosudo["info"]["amr"]="null";
$infosudo["info"]["klish_sil"]="$text";
file_put_contents("sudo.json", json_encode($infosudo));
}

#تابع الاشتراك الاجباري
if($data == "silk"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$skil=$infosudo["info"]["silk"];
if($skil=="مفعل"){
$infosudo["info"]["silk"]="معطل";
}
if($skil=="معطل"){
$infosudo["info"]["silk"]="مفعل";
}
file_put_contents("sudo.json", json_encode($infosudo));
sendwataw($chat_id,$message_id);
}

if($data == "allch"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$allch=$infosudo["info"]["allch"];
if($allch=="مفردة"){
$infosudo["info"]["allch"]="مجموعة";
}
if($allch=="مجموعة"){
$infosudo["info"]["allch"]="مفردة";
}
file_put_contents("sudo.json", json_encode($infosudo));
sendwataw($chat_id,$message_id);
}
#توجية للادمن 

if($message and $fwrmember=="مفعل"){
bot('ForwardMessage',[
 'chat_id'=>$admin,
 'from_chat_id'=>$chat_id,
 'message_id'=>$message->message_id,
]);
}































