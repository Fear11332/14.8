<?php
// Устанавливаем время жизни сессии
$sessionTime = 86400; // 10 секунд для тестирования
ini_set('session.gc_maxlifetime', $sessionTime);
ini_set('session.cookie_lifetime', $sessionTime);

// Запускаем сессию
session_start();

// Проверяем, прошло ли время жизни сессии
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] >= $sessionTime)) {
    // Время жизни сессии истекло, удаляем сессию
    session_unset();
    session_destroy();
    header("Location: login.php"); // Перенаправляем пользователя на страницу входа
    exit; // Завершаем выполнение скрипта
}

// Если пользователь нажал кнопку "Выход"
if (isset($_POST['logout'])) {
    // Удаляем сессию
    session_unset();
    session_destroy();
    header("Location: login.php"); // Перенаправляем пользователя на страницу входа
    exit; // Завершаем выполнение скрипта
}

// Если сессия активна, обновляем время последней активности пользователя
$_SESSION['last_activity'] = time();

// Устанавливаем флаг авторизации
$_SESSION['auth'] = true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
</head>
<body>
    <?php if (isset($_SESSION['auth'])): ?>
        <form action="" method="post">
            <button type="submit" name="logout">Выход</button>
        </form>
    <?php endif; ?>
</body>
</html>