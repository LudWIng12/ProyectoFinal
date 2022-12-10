<?php      
    session_start();
    error_reporting(E_ERROR | E_PARSE);
    //var_dump($_SESSION["block"]);
   
?>  
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Document</title>
    <style>
        td,
        th {
            padding: 10px;

        }
        
    </style>
</head>
<header>
    <div class="menu">
        <div class="logo" ><img class="uno" src="Images/logo_white_large.png"></img></div>
        <div>
            <ul class="nav">           
                <li class="dos"><a class="link" href="index.html">Inicio</a></li>
                <li class="dos"><a class="link" href="tienda/tienda.php">Tienda</a></li>
                <li class="dos"><a class="link" href="Contacto.html">Contacto</a></li> 
                <li class="dos"><a class="link" href="acerca.html">Acerca de</a></li> 
                <li class="dos"><a class="link" href="ayuda.html">Ayuda</a></li> 
                
            </ul>
            
        </div>
        <div class="absolute">
            <ul class="nav2">           
                <li class="dos"><a class="link" href="loginregistro/login.php">Login</a></li>
                <li class="dos"><a class="link" href="loginregistro/registro.php">Registrate</a></li>
            
            </ul>
        </div>
    </div>
</header>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <form action="check.php" method='post'>
                    <h2>Iniciar Sesión</h2>
                    
                    
                    <div class="form-group">
                        <label for="cuenta">Cuenta</label>
                        <input type="text" id="cuenta" name="cuenta" class="form-control" required value="<?php if(isset($_COOKIE["cuenta"])){ echo $_COOKIE["cuenta"];}?>">
                    </div>
                    <div class="form-group">
                        <label for="contra">Contraseña</label>
                        <input name="contra" type="password" class="form-control" id="contra" required value="<?php if(isset($_COOKIE["contra"])){ echo $_COOKIE["contra"];}?>">
                        <?php if($_SESSION["block"]==true){ ?>
                            <a href="recuperacontra.php">Recuperar contraseña</a>
                            <?php } ?>
                    </div>
                    <div>
                    <input type="checkbox" name="remember" checked>Recordar usuario y contraseña
                    </div>
                    <div>
                        <label for="captcha">Escriba el captcha</label>
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

</html>