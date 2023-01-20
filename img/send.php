<?php

$to = 'leonid@gerasyanov.com';
$subject = 'Подписаться на рассылку';
$messages = array();

if(isset($_REQUEST['name'])) {
    $messages[] = "Имя: " . $_REQUEST['name'];
}

if(isset($_REQUEST['email'])) {
    $messages[] = "E-mail: " . $_REQUEST['email'];
}
if(isset($_REQUEST['text'])) {
    $messages[] = "Вопрос: " . $_REQUEST['text'];
}

// Для отправки HTML-письма должен быть установлен заголовок Content-type
$headers = array();
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=utf-8';

// Дополнительные заголовки
$headers[] = "To: {$to}";
$headers[] = 'From: varfolomeevviktor782@gmail.com';

// Отправляем
$result = mail($to, $subject, implode('<br />', $messages), implode("\r\n", $headers));

echo json_encode(array("status" => $result));
exit;
