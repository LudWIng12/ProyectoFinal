<?php      
    session_start();
    error_reporting(E_ERROR | E_PARSE);
    //var_dump($_SESSION["block"]);
    include "header.php";
?>  
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
    <title>Document</title>
    
</head>


<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <form action="check.php" method='post'>
                    <h2 style="color:white;">Iniciar Sesión</h2>
                    
                    
                    <div class="form-group">
                        <label for="cuenta" style="color:white;">Cuenta</label>
                        <input type="text" id="cuenta" name="cuenta" class="form-control" required value="<?php if(isset($_COOKIE["cuenta"])){ echo $_COOKIE["cuenta"];}?>">
                    </div>
                    <div class="form-group">
                        <label for="contra" style="color:white;">Contraseña</label>
                        <input name="contra" type="password" class="form-control" id="contra" required value="<?php if(isset($_COOKIE["contra"])){ echo $_COOKIE["contra"];}?>">
                        <?php if($_SESSION["block"]==true){ ?>
                            <a href="recuperacontra.php">Recuperar contraseña</a>
                            <?php } ?>
                    </div>
                    <div>
                    <input type="checkbox" name="remember" checked style="color:white;">Recordar usuario y contraseña
                    </div>
                    <div>
                        <label for="captcha" style="color:white;">Escriba el captcha</label>
                        <img src="captcha.php" alt="CAPTCHA" class="captcha-image">
                        <br>
                        <input type="text" id="captcha" name="captcha_challenge" pattern="[A-Z]{6}">
                    </div>
                    <button class="btn btn-success" type="submit" name="submit" id="submit">Iniciar Sesión</button>
                    <button class="btn btn-success" type="button" onclick="registro();">Registrarse</button>
                </form>
            </div> <!-- fin col -->
        </div> <!-- fin row -->
    </div> <!-- fin container -->
    <br><br>
    <script>
        function registro() {
          document.location.href = "registro.php"; //llama al formulario de log in
        }
   

  </script> 
</body>
<div id="pie">
    <div>
        <h1> Contactanos </h1>
    </div>
    <div class="icons">
        <div><a class="link2"  href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a></div>
        <div><a class="link2" href="https://twitter.com/"><i class="fab fa-twitter"></i></a></div>
        <div><a class="link2" href="https://www.instagram.com/alfalobodinamita07/"><i class="fab fa-instagram"></i></a></div>
        <div><a class="link2" href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></div>
    </div>
    <div>
            <p>@CopyrightLoboGamer 2022</p>
        </div>
    <script src="https://kit.fontawesome.com/a2cc4a6c09.js" crossorigin="anonymous"></script>
</div>
</html>