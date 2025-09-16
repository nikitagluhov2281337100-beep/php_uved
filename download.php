<?php

$token = "7635377723:AAHSkcwun__eevjRw4R9619Xxq0zgAlFpZ8";   // Вставь сюда свой токен от BotFather
$chat_id = "-4882509132"; // Вставь сюда свой chat_id из getUpdates

// === ТЕКСТ СООБЩЕНИЯ ===
$message = "📲 Новый скачавший приложение TowerRush.apk!";

// === ОТПРАВКА В TELEGRAM ===
$telegram_url = "https://api.telegram.org/bot$token/sendMessage";
$params = [
    "chat_id" => $chat_id,
    "text" => $message,
    "parse_mode" => "HTML"
];

file_get_contents($telegram_url . "?" . http_build_query($params));

// === ОТДАЧА ФАЙЛА ПОЛЬЗОВАТЕЛЮ ===
$file = "TowerRush.apk"; // убедись, что файл лежит рядом с этим скриптом
if (file_exists($file)) {
    header("Content-Type: application/vnd.android.package-archive");
    header("Content-Disposition: attachment; filename=" . basename($file));
    header("Content-Length: " . filesize($file));
    readfile($file);
    exit;
} else {
    echo "Файл не найден!";
}
?>
