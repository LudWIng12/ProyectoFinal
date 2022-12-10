<?php
    include "header.html";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metodo de pago</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <h1>Seleccione un metodo de pago</h1>

    <div id="PayPal">
        <img src="Images/paypal.png" alt=""> <br>
        <a href="PayPal.php">Pay pal</a>
    </div>

    <div id="Tarjeta">
        <a href="tarjeta.php" type="button">
            <img src="Images/tarjeta.jfif" alt=""> <br>
        </a>
    </div>
</body>
</html>