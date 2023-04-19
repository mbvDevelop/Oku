
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/register1.css">
</head>
<link rel="icon" href="img/favicon(2).ico" type="image/x-icon">
<script src="https://kit.fontawesome.com/2b35ff6b15.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>
<body>
    <header class="header2">
        <a href="index.html">
            <img src="img/unnamed.png" class="logo_header2" alt="">
        </a>
    </header>
    <section class="s1">
        <div class="card-img">
            <img src="img/diapoo.PNG" alt="">
        </div>
        <div class="card-register">
            <?php if(isset($_GET['error'])) {?>
                <div>
                    <?php echo $_GET['error'] ?>
                </div>
            <?php }?>
            <form class="form" action="register.php" method="POST" enctype="multipart/form-data">
                <h2 class="title"> Registro</h2>
                <p class="subtitle">Ya tienes cuenta? <a href="login.php"> Log in</a></p>
                <p class="or"><span>o</span></p>
                <div class="email-login" >
                    <label for="Name"> <b>Nombre</b></label>
                    <input type="text" maxlength="15"  placeholder="Name" name="name" required>
                    <label for="email"> <b>Email</b></label>
                    <input type="email" placeholder=" Email" name="email" required>
                    <label for="psw"><b>Contraseña</b></label>
                    <input type="password" placeholder=" Contraseña" name="password" required>
                    <div class="choose_image"> 
                        <span> Elige una foto de perfil</span>
                        <input id="imagen"name="imagen" size="30" type="file" />
                    </div>
                    <button class="main-button cta-btn " type="submit" value="Submit">Enviar</button>
                </div>
            </form>
        </div>
    </section>
    <footer>
        <a class="logo_footer" href="#">
            <img src="img/logo2.png">
        </a>
        <div class="footer_content">
            <div class="legal">
                <a href="">
                    <p>Política de privacidad<p>
                </a>
                <a href="">   
                    <p> Servicios</p>
                </a>
                <a href="">
                    <p>Cookies</p>
                </a>
            </div>
            <div class="social_media">
                <a href="#">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#">
                    <i class="fab fa-google-plus-g"></i>
                </a>
            </div>
        </div>
    </footer>
</body>
</html>