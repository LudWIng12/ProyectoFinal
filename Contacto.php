<?php
    include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="imagenes/logo_small_icon_only.png">
    <link rel="stylesheet" href="./css/Contacto.css">

    <link rel="icon" type="images/x-icon" href="imagenes/favicon.png">
</head>



<body>

<h3>Tienes alguna duda o sugerencia? Contactanos!</h3>
<form name="frmContacto" method="post" action="correoElectronico.php">      
    <input name="nom" type="text" class="feedback-input" placeholder="Nombre" />   
    <input name="mail"  type="text" class="feedback-input" placeholder="Email" />
    <textarea name="mensaje" id="men" class="feedback-input" placeholder="Comentario"></textarea>
    <input type="submit" name="enviar" value="Enviar"/>
</form>

<<div id="pie">
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

</body>


</html>



