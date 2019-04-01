<?php

/* https://api.telegram.org/botXXXXXXXXXXXXXXXXXXXXXXX/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */

$name = $_POST['name'];
$phone = $_POST['phone'];
$text = $_POST['text'];
$token = "763274896:AAENVNctDu3Q_Xpl-FxJ_lW-oDt9MzaqCaE";
$chat_id = "521204787";

if (isset($_POST['name'])) {
  if (!empty($_POST['name'])){
  $name = strip_tags($_POST['name']);
  $nameFieldset = "Имя: ";
  }
}
if (isset($_POST['text'])) {
  if (empty($_POST['text'])){
  $textFieldset = "Жду звонка";
  }else{
      $text = strip_tags($_POST['text']);
        $textFieldset = "Сообщение: ";
  }
}

$arr = array(
   $nameFieldset => $name,
  'Телефон: +' => $phone,
  $textFieldset => $text
);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");