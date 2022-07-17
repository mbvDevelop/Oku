
<?php
  require 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oku</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="css/home1.css" rel="stylesheet" type="text/css">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    
    <link rel="icon" href="img/favicon(2).ico" type="image/x-icon">
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <script src="https://kit.fontawesome.com/2b35ff6b15.js" crossorigin="anonymous"></script>
</head>

<body>
    
    <header class="aside-header">
        <img src="img/unnamed2.png" alt="" 
        class="logo-aside">
        <img src="img/logo2.png" alt="" 
        class="logo-aside2">
        <div class="workspace">
            <?php if(!empty($user)): ?>
                <p class="tlt">
                <?= $user['name']; ?> Workspace
                </p>
            <?php endif; ?>
            <i class="fa-solid fa-angle-down"></i>
        </div>
        <nav class="aside-nav">
            <div class="nav hover">
                <a href="home.php" class="color">
                    <i class="fi fi-rs-home"></i>
                    <p>Home</p>
                </a>
            </div>
            <div class="nav hover">
                <a href="library.php">
                    <i class="fi fi-rr-apps"></i>
                    <p>Library</p>
                </a>
            </div>
            <div class="nav hover">
                <a href="history.php">
                    <i class="fi fi-rr-time-past"></i>
                    <p>History</p>
                </a>
            </div>
            <div class="nav hover">
                    <?php if(strcmp($_SESSION['user_rol'], "admin") == 0): ?>
                        <a href="notificationsAdmin.php">
                            <i class="fi fi-rr-bell"></i>
                            <p>Alarms</p>
                        </a>
                    <?php else: ?>
                    <a href="notifications.php" class="count">
                        <i class="fi fi-rr-bell"></i>
                        <h5 class="red"id='notification'></h5>
                        <p>Alarms</p>
                    </a>
                <?php endif;?>
            </div>
            <div class="nav hover">
                <a href="settings.php">
                    <i class="fi fi-rs-settings-sliders"></i>
                    <p>Settings</p>
                </a>
            </div>
        </nav>
        <button class="upload">
            <a href="">
                <p>Sube un archivo</p>
                <i class="fa-solid fa-cloud"></i>
            </a>
        </button>
    </header>
    <section class="search-bar">
        <div class="buscador">
            <form action="">
                <input id="buscador" type="search" value="" placeholder="Busca tu archivo...">
                <i class="fa-solid fa-magnifying-glass"></i>
            </form>
        </div>
        <div class="profile-picture">
            <img alt="" class="img_profile click">
                <style> .img_profile{
                    background-image: url("images/<?= $foto ?>");
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                } </style>
        </div>
    </section>
    <section class="container">
        <div class="info">
            <?php if(!empty($user)): ?>
                <p class="tlt">
                    Bienvenido a tu perfil <?= $user['name']; ?>
                </p>
                
            <?php endif; ?>
        </div>
        <div class="redirection">
            <button class="main-button size"> 
                <a href="library.php">
                Let´s go
                </a>
            </button>
        </div>
        <div class="video">
            <iframe width="500" height="255" src="https://www.youtube.com/embed/n1nbEuSFC9E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <iframe width="500" height="255" src="https://www.youtube.com/embed/Ud1rdaeXENM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </section>

    <div class=logout>
        <a href="logout.php">
            Logout
        </a>
    </div>
<!-- scripts js -->
<script src="js/jquery3.js"></script>
<script src="js/main.js"></script>
<script src="js/Notifications.js"></script>
</body>
</html>