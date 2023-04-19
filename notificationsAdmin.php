<?php
require 'session.php';
require 'search.php';
if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, name FROM users');
    $records->execute();

    $users = array();
    $i = 0;
    while ($results1 = $records->fetch(PDO::FETCH_ASSOC)) {
        $users[$i] = $results1;
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
    <link rel="stylesheet" href="css/main3.css">
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
        <img src="img/unnamed2.png" alt="" class="logo-aside">
        <img src="img/logo2.png" alt="" class="logo-aside2">
        <div class="workspace">
            <?php if (!empty($user)) : ?>
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
            <a href="library.php">
                <p>Sube un archivo</p>
                <i class="fa-solid fa-cloud"></i>
            </a>
        </button>
    </header>
    <section class="search-bar">
        <div class="buscador">

            <?php
            if (isset($_GET['error'])) {
                $error = $_GET['error'];
                if ($error == 'emptysearch') {
                    echo '<p style = "margin-left:38%; margin-top:0%;">Por favor, ingrese un término de búsqueda.</p>';
                }
            }
            if ($show_message) : ?>
                <p style="color: red; margin-left:50%;">Archivo no encontrado.</p>
            <?php endif;
            ?>
            <form action="" method="get">
                <label for="search">Search:</label>
                <input type="text" name="search" id="search" value="<?= htmlentities($_GET['search'] ?? '') ?>">
                <button type="submit">Search</button>
            </form>
        </div>
        <div class="profile-picture">
            <img alt="" class="img_profile click">
            <style>
                .img_profile {
                    background-image: url("images/<?= $foto ?>");
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                }
            </style>
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
                    <?php foreach ($users as $user) :
                        if ($user['id'] != $_SESSION['user_id']) :
                    ?>
                            <option value=<?= $user['id'] ?>><?= $user['name'] ?></option>
                    <?php endif;
                    endforeach; ?>
                </select>
                <label for="title">Titulo de la notificacion</label>
                <input required type="text" name="title" id='title' placeholder="Título de la notificación">
                <label for="subtitle">Cuerpo de la notificacion</label>
                <input required type="text" name="subtitle" id='subtitle' placeholder="Cuerpo de la notificación">
                <button class="main-button send-btn" type="submit">
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
    <div class="resultados" style="<?= $style ?>">
        <?php foreach ($results as $file) : ?>
            <li style="margin-left: 50%;">
                <a href="<?= $file['path'] ?>" target="_blank"><?= $file['name'] ?></a>
                <img src="<?php echo $file['thumbnail']; ?>" alt="">
                <button class="cerrar" onclick="document.querySelector('.resultados').style.display = 'none';"><i class="fa-solid fa-xmark"></i></button>
            </li>
        <?php endforeach; ?>
    </div>
    <!-- scripts js -->
    <script src="js/jquery3.js"></script>
    <script src="js/main.js"></script>
</body>

</html>