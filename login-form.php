
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<link rel="icon" href="img/favicon(2).ico" type="image/x-icon">
<script src="https://kit.fontawesome.com/2b35ff6b15.js" crossorigin="anonymous"></script>

<body>
    <header class="header2">
        <a href="index.html">
            <img src="img/unnamed.png" class="logo_header2" alt="">
        </a>
        <button class="main-button btn">
            <a href="register.html">
                <p>Registrate gratis</p>
            </a>
        </button>
    </header>
    <section class="s1">
        <div class="card">
            <form  action="login.php" method="POST">
            <?php if(isset($_GET['error'])) {?>
                    <div>
                        <?php echo $_GET['error'] ?>
                    </div>
                <?php }?>
                <h2 class="title"> Log in</h2>
                <p class="subtitle">¿No tienes cuenta? <a href="register.php"> Registrate</a></p>
                <p class="or"><span>o</span></p>
                <div class="email-login">
                    <label for="email"> <b>Email</b></label>
                    <input type="text" placeholder=" Email" name="email" required>
                    <label  for="psw"><b>Contraseña</b></label>
                    <input type="password" placeholder="Contraseña" name="password" required>
                </div>
                <button class="main-button logueo">Log In</button>
                <a class="forget-pass " href="#">¿Contraseña olvidada?</a>
            </form>
        </div>
    </section>
    <footer>
        <a class="logo_footer" href="index.html">
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