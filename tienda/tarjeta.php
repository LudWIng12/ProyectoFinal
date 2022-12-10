<?php
    include "header.html";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago con tarjeta</title>
</head>
<body>
    <form action="">
        <label for="NoTarjeta">Numero de tarjeta: </label>
        <input type="number" name="NoTarjeta" id="NoTarjeta" size="16" require> <br>
        <label for="CCV">CCV: </label>
        <input type="number" name="CCV" id="CCV" size="3" require>
        <label for="Vencimiento">Vence: </label>
        <input type="text" name="Vencimiento" id="Vencimiento" placeholder="XX/XX" require> <br>
        <p>Una vez termines el pago, te llegara un email de nuestra parte</p>

        <a type="button" class="btn btn-dark" href="index.html">Terminar Pago</a>
    </form>
</body>
</html>
