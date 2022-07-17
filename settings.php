
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
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/ajustes.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel="icon" href="img/favicon(2).ico" type="image/x-icon">
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
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
                <a href="settings.php" class="color">
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
        <div class="content" >
            <div class="user_name">
            <?php if(!empty($user)): ?>
                <p class="tlt">
                    Welcome <?= $user['name']; ?>
                </p>
            <?php endif; ?>
                <h1>Ajustes de perfil</h1>
            </div>

            <div class="profile">
                <h4>Nombre y fotos</h4>
                <p>Cambia tu nombre o tu foto. Tu perfil se actualizara al momento!</p>
                <br>
                <?php if(!empty($_SESSION['message'])): ?>
                    <p style="color:red"> <?= $_SESSION['message'] ?></p>
                <?php endif;
                    $_SESSION['message'] = "";
                ?>
                <form action="update.php" method='POST' enctype="multipart/form-data">
                    <input name='id' type="number" value="<?php echo $id; ?>" hidden>
                    <div class="act_photo">
                        <img alt="" class="img_settings" >
                            <style> .img_settings{
                                background-image: url("images/<?= $foto ?>");
                                background-size: cover;
                                background-position: center;
                                background-repeat: no-repeat;
                            } </style>
                        <input type="file" name="imagen" id="imagen">
                    </div>
                    <div class="campos">
                        <div    class="act_name">
                            <label  for="Name">Nombre de usuario</label>
                            <input maxlength="15" type="text" name="name" id="name" placeholder="Nombre" value="<?= $name ?>" required>
                        </div>
                        <div class="actualizar">
                            <button class="btn-update" type="submit" >
                                <p>Save</p>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <p class="separador"></p>
            <div class="delete_account">
                <h4> Elimina tu cuenta</h4>
                <p>Nos da mucha pena que te vayas...¿Estas seguro de que quieres eliminar tu cuenta?</p>
                <button class="main-button delete" type="submit" >
                    <a href="delete.php?id=<?php echo $id; ?>">Eliminar</a>
                </button>
            </div>
        </div>
    </section>

    <div class=logout>
        <a href="logout.php">
            Logout
        </a>
    </div>
<!-- scripts js -->
<script src="JS/jquery3.js"></script>
<script src="JS/main.js"></script>
<script src="js/Notifications.js"></script>
</body>

</html>