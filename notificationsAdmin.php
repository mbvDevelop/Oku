
<?php
require 'session.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, name FROM users');
    $records->execute();

    $users = array();
    $i = 0;
    while ($results = $records->fetch(PDO::FETCH_ASSOC)) {
        $users[$i] = $results;
        $i++;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oku</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/admin-nt.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel="icon" href="img/favicon(2).ico" type="image/x-icon">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
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
                <a href="home.php">
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
                <a href="notifications.php" class="color">
                    <i class="fi fi-rr-bell"></i>
                    <p>Alarms</p>
                </a>
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
            <p class="tlt">
                Envía notificaciones aquí
            </p>
        </div>
        <div class="notifications">
                <form class="send" action="createNotification.php" method='POST'>
                        <label for="users">Usuarios</label>
                        <select name="users" id='users'>
                            <?php foreach ($users as $user): 
                                    if($user['id'] != $_SESSION['user_id']):
                                ?>
                            <option value=<?=$user['id']?>><?=$user['name']?></option>
                            <?php endif;
                        endforeach;?>
                        </select>
                        <label for="title">Titulo de la notificacion</label>
                        <input required type="text" name="title" id='title' placeholder="Título de la notificación">
                        <label for="subtitle">Cuerpo de la notificacion</label>
                        <input required type="text" name="subtitle" id='subtitle' placeholder="Cuerpo de la notificación">
                        <button class="main-button send-btn" type="submit" >
                            Notificar
                        </button>

                </form>
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
</body>

</html>