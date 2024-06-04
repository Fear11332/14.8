<?php
    require_once('functional.php');
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
    <div class="login-register">
    <form action="verification.php" method="post">
        <input  name="age" min="1900-01-01" max="2050-12-31" type="date" placeholder="день месяц год" required> 
        <input name="login" type="text" placeholder="Логин" required>
        <input name="password" type="password" placeholder="Пароль" required>
        <input name="reg" type="submit" value="Регистрация">
    </form>
    <form action="verification.php" method="post">
        <input name="login" type="text" placeholder="Логин" required>
        <input name="password" type="password" placeholder="Пароль" required>
       <input name="enter" type="submit" value="Вход">
    </form> 
    </div>
</body>
</html>