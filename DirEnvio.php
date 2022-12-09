<?php
    include "header.html";
?>

<body>
    <h1>Datos de envio</h1>

    <div>
        <form action="pago.php">
            <label for="nombre">NOMBRE: </label>
            <input type="text" name="nombre" id="nombre" require> <br> <br>
            <label for="apellido">APELLIDO: </label> 
            <input type="text" name="apellido" id="appellido" require><br> <br>
            <label for="email">EMAIL: </label> 
            <input type="email" name="emal" id="email" default="Correo sacado del inicio de sesion" require> <br> <br>
            <label for="telefono">TELEFONO: </label> 
            <input type="tel" name="telefono" id="telefono" require> <br> <br>
            <label for="telefono2">TELEFONO 2 (OPCIONAL): </label> 
            <input type="tel" name="telefono2" id="telefono2"> <br> <br>
            <label for="calle">CALLE: </label>
            <input type="text" name="calle" id="calle" maxlenght="80" size="82" require> <br> <br>
            <label for="numero">NUMERO: </label>
            <input type="number" name="numero" id="numero" maxlenght="10" size="10" require> <br> <br>
            <label for="colonia">COLONIA:</label>
            <input type="text" name="colonia" id="colonia" maxlenght="80" size="80" require><br> <br>
            <label for="CP">CP: </label>
            <input type="number" name="CP" id="CP" maxlenght="5" size="10" require> <br> <br>
            <label for="ciudad">CIUDAD: </label> 
            <input type="text" name="ciudad" id="ciudad" maxlenght="80" size="80" require> <br> <br>
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
            <input type="submit" value="Continuar">
        </form>
    </div>

</body>

