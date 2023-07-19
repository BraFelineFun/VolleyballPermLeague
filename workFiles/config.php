<?php

if (!defined('__ROOT__')){
    define('__ROOT__', dirname(__FILE__, 2) . "/");
    define('DEV_VERSION', true);
    define('PAGES', [
        "Главная" => "index.php",
        "Команды" => "teams.php",
        "Игроки" => "players.php",
        "Встречи" => "meetings.php",
        "Контакты" => "contacts.php",
        "ЛК" => "/LK"

    ]);
}

if (DEV_VERSION) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}


return [
    'database' => [
        'hostname' => 'localhost',
        'username' => 'root',
        'pass' => '1',
        'database' => 'PermVolleyBall',
        'port' => "3306",
        'charset' => "utf8mb4",
    ]
];