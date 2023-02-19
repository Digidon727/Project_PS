<?php

function debug($data)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

function registration(): bool
{
    global $pdo;

    $email = !empty($_POST['email']) ? trim($_POST['email']) : '';
    $name = !empty($_POST['name']) ? trim($_POST['name']) : '';
    $pass = !empty($_POST['pass']) ? trim($_POST['pass']) : '';

    if (empty($email) && empty($name) ) {
        $_SESSION['errors'] = 'Поля логин/пароль абязательны';
        return false;
    }
    if(empty($pass)) {
        $_SESSION['errors'] = 'Поля логин/пароль абязательны';
        return false;
    }

    $res = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $res->execute([$email]);
    if ($res->fetchColumn()) {
        $_SESSION['errors'] = 'Данный логин используется';
        return false;
    }

    $pass = password_hash($pass, PASSWORD_DEFAULT);


    $res = $pdo->prepare("INSERT INTO users(email, `name`, pass) VALUES(?, ?, ?)");
    if ($res->execute([$email, $name, $pass])) {
        $_SESSION['success'] = 'Успешная регистрация';
        return true;
    } else {
        $_SESSION['errors'] = 'Оишибка регистрации';
        return false;
    }
}


function loginaout(): bool
{
    global $pdo;

    $email = !empty($_POST['email']) ? trim($_POST['email']) : ''; /// email
    $pass = !empty($_POST['pass']) ? trim($_POST['pass']) : '';

    if (empty($email) && empty($pass)) {
        $_SESSION['errors'] = 'Поля логин/пароль абязательны';
        return false;
    }


    $res = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $res->execute([$email]);
    if (!$user = $res->fetch()) {
        $_SESSION['errors'] = 'Логин или пароль введены неверно';
        return false;
    }


    if (!password_verify($pass, $user['pass'])) { //
        $_SESSION['errors'] = 'Логин или пароль введены не!';
        return false;
    } else {
        $_SESSION['success'] = 'Вы успешно авторизовались';
        $_SESSION['user']['name'] = $user['name'];
        $_SESSION['user']['email'] = $user['email'];
        return true;
    }
}

