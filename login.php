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
<meta charset="utf-8">
  <title>Lotus</title></title>
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
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" id="login"><span class="glyphicon glyphicon-log-in"></span> Вход</a></li>
        <div id="register-container" class="login-register"></div>
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
   <summary><h2 style="text-align:center;">Акции</h2></summary>
    <ul style="font-size: 1.25em;">
    <li>Бизнес-пакет</li>
    <li>Премиум-пакет</li>
    <li>Стартовый-пакет</li>
    <li>Первый месяц скидка 5% на услуги косметологов</li>
  </ul>
 </details>
  </ul>
 </details>
    </div>
    <div class="col-sm-8 text-left">
  <h1 style="text-align: center;">Сеть СПА-салонов Lotus</h1>

<h2>История</h2>

<p>Сеть СПА-салонов Lotus была основана в 2010 году группой профессионалов индустрии красоты, которые разделяли страсть к созданию оазисов релаксации и оздоровления. Первый салон Lotus открылся в самом центре Москвы и быстро завоевал популярность благодаря своему первоклассному обслуживанию и роскошной атмосфере.</p>

<p>С момента своего основания сеть Lotus расширилась до нескольких салонов, расположенных в престижных районах города. Каждый салон Lotus отличается уникальным дизайном, вдохновленным восточными традициями, и оснащен новейшим оборудованием и технологиями.</p>

<h2>Что есть в центрах</h2>

<ul>
  <li>Массаж: Традиционные и современные техники массажа, включая массаж горячими камнями, тайский массаж и массаж глубоких тканей.</li>
  <li>Уход за лицом: Персонализированные процедуры по уходу за лицом, разработанные для решения различных проблем кожи, включая омоложение, увлажнение и очищение.</li>
  <li>Уход за телом: Обертывания, скрабы и другие процедуры по уходу за телом, которые питают, увлажняют и омолаживают кожу.</li>
  <li>Парикмахерские услуги: Стрижки, укладки, окрашивания и другие парикмахерские услуги, выполняемые высококвалифицированными стилистами.</li>
  <li>Ногтевой сервис: Маникюр, педикюр и другие процедуры по уходу за ногтями, включая наращивание ногтей и дизайн ногтей.</li>
</ul>

<p>Во всех салонах Lotus используются только высококачественные продукты по уходу за кожей и волосами, а опытные специалисты обеспечивают исключительное обслуживание, чтобы каждый клиент чувствовал себя особенным.</p>

<p>Помимо основных услуг, СПА-салоны Lotus также предлагают ряд дополнительных удобств, таких как:</p>

<ul>
  <li>Зоны релаксации, где клиенты могут отдохнуть до или после процедур.</li>
  <li>Сауны и парные для глубокого очищения и детоксикации.</li>
  <li>Фитнес-центры, где клиенты могут поддерживать свою физическую форму и дополнять свой спа-опыт.</li>
</ul>

<h2>Миссия</h2>

<p>Миссия сети СПА-салонов Lotus - предоставить своим клиентам незабываемые впечатления, которые сочетают в себе первоклассное обслуживание, роскошную обстановку и эффективные процедуры. Lotus стремится быть оазисом спокойствия и оздоровления, где каждый может найти убежище от стресса повседневной жизни и побаловать себя истинным спа-опытом.</p>
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
  <span>©&nbsp;lotus-group <img src="images/logo.png" height="20" width="20"></span>
</footer>
    <script src="effects.js"></script>
</body>
</html>