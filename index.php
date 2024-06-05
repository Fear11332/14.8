<?php
require_once('functional.php');
// Устанавливаем время жизни сессии
ini_set('session.gc_maxlifetime', $sessionTime);
ini_set('session.cookie_lifetime', $sessionTime);

// Запускаем сессию
session_start();

if(!isset($_SESSION['auth'])){
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
$count = $_SESSION['count']??0;
$count++;
if($count<0 || is_float($count)){
    $count=1;
}
$_SESSION['count'] = $count;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <title>Личный кабинет</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" href="images/logo.png" type="image/png">
</head>
<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a href="#"> <img src="images/logo.png" height="50" width="50"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="#">Домой</a></li>
        <li><a href="#">О нас</a></li>
        <li><a href="#">Другие центры</a></li>
        <li><a href="#">Контакты</a></li>
      </ul>
      <div class="nav navbar-nav navbar-right">
        <form action="" method="post"><button type="submit" name="logout"> Выход</button></form>
        </div>
    </div>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    <details>
   <summary><h2 style="text-align:center;">услуги</h2></summary>
    <ul style="text-align: left; font-size: 1.25em;">
    <li>Массаж</li>
    <li>Обёртывание</li>
    <li>Пилинг</li>
    <li>Косметологические процедуры</li>
    <li>Уходовые процедуры за волосами</li>
    <li>СПА-программы</li>
    <details>
   <summary><h2 style="text-align:center;">Спецпредложения</h2></summary>
    <ul style="font-size: 1.25em;">
    <li>Индивидуальные занятия с тренером</li>
    <li>Курсы оздоровления</li>
    <li>Личный стилист</li>
    <li>Отельная карта</li>
    <li>Членская карта</li>
    <li>Мы за рубежом</li>
  </ul>
 </details></p>
  </ul>
 </details></p>
    </div>
    <div class="col-sm-8 text-left">
      <h1 style="text-align:center;">Добро пожаловать <?=getCurrentUser()?></h1>
            <?php
        $current_time = new DateTime();
        $login_time = new DateTime($_SESSION['time']);
        $expiry_time = clone $login_time;
        $expiry_time->setTime(23, 59, 59);
        if ($current_time < $expiry_time):?>
        <p>
            <h2 style="text-align:center">Сертификат на бесплатный массаж закончится через: <?=($expiry_time->diff($current_time,true))->format('%H:%I:%S')?></h2>
        </p>
        <?php endif; ?>
        <?php if(($count>1 &&(new User($_SESSION['year'],$_SESSION['month'],$_SESSION['day'],$_SESSION['login'],$_SESSION['password']))->isBirthdayToday())):?>
            <p><h2 style="text-align: center;">Поздравляем вас с днем рождения и дарим скидку 10% на весь пакет услуг нашей сети!</h2></p>
        <?php endif;?>
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <img src="images/hall1.jpg" height="150" width="330">
      </div>
      <div class="well">
        <img src="images/hall2.jpg"  height="200" width="330">
      </div>
        <div class="well">
        <img src="images/hall3.jpg" height="190" width="330">
      </div>
      <div class="well">
        <img src="images/hall4.avif" height="150" width="335">
      </div>
        <div class="well">
        <img src="images/hall5.avif" height="170" width="330">
      </div>
    </div>
  </div>
</div>
<footer class="container-fluid text-center">
  <span>©&nbsp;lotus-goup <img src="images/logo.png" height="20" width="20"></span>
</footer>
</bod>
</html>
