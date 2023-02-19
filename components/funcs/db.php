<?php

$host = 'projectps';
$port = 3305;
$dbname = "project_ps";
$user = 'root';
$pass = '';

$dsh = "mysql:host=$host;port=$port;dbname=$dbname";

$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsh, $user, $pass, $options);
    //echo "Успешно подключение к БД";
} catch (PDOException $e) {
    echo "Ошибка подключения - " . $e->getMessage() . '<br>';
    die();
}

