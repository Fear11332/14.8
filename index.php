<?php
require_once('functional.php');
// Устанавливаем время жизни сессии
ini_set('session.gc_maxlifetime', $sessionTime);
ini_set('session.cookie_lifetime', $sessionTime);

// Запускаем сессию
session_start();

// Проверяем, прошло ли время жизни сессии
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] >= $sessionTime)) {
    // Время жизни сессии истекло, удаляем сессию
    session_unset();
    session_destroy();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
        );
    }
    header("Location: login.php"); // Перенаправляем пользователя на страницу входа
    exit; // Завершаем выполнение скрипта
}

// Если пользователь нажал кнопку "Выход"
if (isset($_POST['logout'])) {
    // Удаляем сессию
    session_unset();
    session_destroy();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
        );
    }
    header("Location: login.php"); // Перенаправляем пользователя на страницу входа
    exit; // Завершаем выполнение скрипта
}

// Если сессия активна, обновляем время последней активности пользователя
$_SESSION['last_activity'] = time();
$_SESSION['time']=(new DateTime())->format('H:i:s');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
        <h1><?='hello '.getCurrentUser()?></h1>
        <?php
        $current_time = new DateTime();
        $login_time = new DateTime($_SESSION['time']);

        // Устанавливаем время 23:59:59 для сравнения
        $expiry_time = clone $login_time;
        $expiry_time->setTime(23, 59, 59);

        // Проверяем, прошли ли более 24 часов с момента входа пользователя
        if ($current_time < $expiry_time):?>
            <h2><?=($expiry_time->diff($current_time,true))->format('%H:%I:%S')?></h2>
        <?php endif; ?>
        <form action="" method="post">
          <button type="submit" name="logout">Выход</button>
        </form>
</body>
</html>
