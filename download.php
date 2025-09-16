<?php

$token = "7635377723:AAHSkcwun__eevjRw4R9619Xxq0zgAlFpZ8";   // Вставь сюда свой токен от BotFather
$chat_id = "-4882509132"; // Вставь сюда свой chat_id из getUpdates

$message = "📲 Кто-то скачал TowerRush.apk!";
file_get_contents("https://api.telegram.org/bot7635377723:AAHSkcwun__eevjRw4R9619Xxq0zgAlFpZ8/sendMessage?" . http_build_query([
    "chat_id" => $chat_id,
    "text" => $message
]));

// === Отдача apk файла ===
$file = __DIR__ . "/TowerRush.apk";

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
