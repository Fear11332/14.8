<?php
    $sessionTime=86400;
    ini_set('session.gc_maxlifetime', $sessionTime);
    ini_set('session.cookie_lifetime', $sessionTime);
    session_start();    
    $sessionExist =  $_SESSION['auth'] ?? null;
    // Проверка наличия сессии с регистрацией
    if($sessionExist) {
        // Сессия существует, перенаправляем на страницу личного кабинета
        header("Location: index.php");
        exit; // Обязательно завершаем выполнение скрипта после перенаправления
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>салон красоты</title>
</head>
<body>
    <div class="login-register"></div>
    <form action="index.php" method="post">
        <input  name="age" type="text" placeholder="Дата рождения"> 
        <input name="login" type="text" placeholder="Логин">
        <input name="password" type="password" placeholder="Пароль">
        <input name="submit" type="submit" value="Регистрация">
    </form>
</body>
</html>