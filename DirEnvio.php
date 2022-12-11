<?php
    include "header.php";
?>
<head>
    <link rel="stylesheet" href="Footer.css">
</head>
<body>
    <style>
    form h1{
        margin-left:90px;
    }
    form {
    background-color: darkcyan;
    margin: 0 auto;
    width: 600px;
    margin-top:50px;
    padding: 1em;
    border: 1px solid #CCC;
    border-radius: 1em;
    }

    form ul {
    margin-left:50px;
    list-style: none;
    padding: 0;
    
    }

    form li + li {
    margin-top: 1em;
    }

    label {

    display: inline-block;
    width: 90px;
    text-align: right;
    }

    input,
    textarea {

    font: 1em sans-serif;


    width: 300px;
    box-sizing: border-box;


    border: 1px solid #999;
    }

    input:focus,
    textarea:focus {

    border-color: #000;
    }

    textarea {

    vertical-align: top;

    
    height: 5em;
    }
    .button {
    
    margin-left: 92px;
    }

    </style>

    <div class="envio">
        
        <form action="pago.php">
            <ul>
                <li>
                    <h1>Datos de envio</h1>
                </li>
                <li>
                    <label for="nombre">NOMBRE: </label>
                    <input type="text" name="nombre" id="nombre" require> <br> <br>
                </li>
                <li>
                    <label for="apellido">APELLIDO: </label> 
                    <input type="text" name="apellido" id="appellido" require><br> <br>
                </li>
                
                <li>
                    <label for="email">EMAIL: </label> 
                    <input type="email" name="emal" id="email" default="Correo sacado del inicio de sesion" require> <br> <br>
                </li>
                
                <li>
                    <label for="telefono">TELEFONO: </label> 
                    <input type="tel" name="telefono" id="telefono" require> <br> <br>
                </li>
                
                <li>
                    <label for="telefono2">TELEFONO 2 (OPCIONAL): </label> 
                    <input type="tel" name="telefono2" id="telefono2"> <br> <br>
                </li>
                
                <li>
                    <label for="calle">CALLE: </label>
                    <input type="text" name="calle" id="calle" maxlenght="80" size="82" require> <br> <br>
                </li>
                
                <li>
                    <label for="numero">NUMERO: </label>
                    <input type="number" name="numero" id="numero" maxlenght="10" size="10" require> <br> <br>
                </li>
                
                <li>
                    <label for="colonia">COLONIA:</label>
                    <input type="text" name="colonia" id="colonia" maxlenght="80" size="80" require><br> <br>
                </li>
                
                <li>
                    <label for="CP">CP: </label>
                    <input type="number" name="CP" id="CP" maxlenght="5" size="10" require> <br> <br>
                </li>
                
                <li>
                    <label for="ciudad">CIUDAD: </label> 
                    <input type="text" name="ciudad" id="ciudad" maxlenght="80" size="80" require> 
                
                <li>
                    <label for="estado">ESTADO: </label>
                    <input list="estados">
                    <datalist id="estados">
                        <option value="Aguascalientes"></option>
                        <option value="Baja California Norte"></option>
                        <option value="Baja California Sur"></option>
                        <option value="Campeche"></option>
                        <option value="Chiapas"></option>
                        <option value="Chihuahua"></option>
                        <option value="Ciudad Mexico"></option>
                        <option value="Coahuila"></option>
                        <option value="Colima"></option>
                        <option value="Durango"></option>
                        <option value="Estado de Mexico"></option>
                        <option value="Guanajuato"></option>
                        <option value="Guerrero"></option>
                        <option value="Hidalgo"></option>
                        <option value="Jalisco"></option>
                        <option value="Michoacan"></option>
                        <option value="Morelos"></option>
                        <option value="Nayarit"></option>
                        <option value="Nuevo Leon"></option>
                        <option value="Oaxaca"></option>
                        <option value="Puebla"></option>
                        <option value="Queretaro"></option>
                        <option value="Quintana Roo"></option>
                        <option value="San Luis Potosi"></option>
                        <option value="Sinaloa"></option>
                        <option value="Sonora"></option>
                        <option value="Tabasco"></option>
                        <option value="Tamaulipas"></option>
                        <option value="Tlaxcala"></option>
                        <option value="Veracruz"></option>
                        <option value="Yucatan"></option>
                        <option value="Zacatecas"></option>
                    </datalist> 
                    <br>
                    <br>
                    
                </li>
                <li>
                    <input type="submit" class="input submit button" value="Continuar">
                </li>
            </ul>
        </form>
    </div>

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
    <script src="https://kit.fontawesome.com/a2cc4a6c09.js" crossorigin="anonymous"></script>
</div>
