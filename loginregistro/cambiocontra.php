<?php
    session_start();
    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='tienda';
     
    //conexion a la base de datos
    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($conexion->connect_errno){
         die('Error en la conexion');
    }

    else{
         //conexion exitosa

         /*revisar si traemos datos a insertar en la bd  dependiendo
         de que el boton de enviar del formulario se le dio clic*/

         if(isset($_POST['submit'])){
                //obtenemos datos del formulario
                $cuenta =$_SESSION['usuario'];
                $pass =$_POST['contra'];
                $passhash = password_hash($pass,PASSWORD_DEFAULT);
                
                //hacemos cadena con la sentencia mysql para insertar datos
                $sql = "UPDATE usuarios SET contrasena='$passhash',bloqueo='0',nuevacontra='0' WHERE cuenta='$cuenta'";
                $conexion->query($sql);  //aplicamos sentencia que inserta datos en la tabla usuarios de la base de datos
                if ($conexion->affected_rows >= 1){ //revisamos que se inserto un registro
                    echo '<script> alert("Contraseña Cambiada") </script>';
                    ?><script type='text/javascript'>
                    document.location.href = 'login.php';
                    </script>
                    <?php
                }//fin
         }//fin    
    }


?>
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

<?php
    include "header.php";
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post'>
                    <h2>Cambio de contraseña</h2>
                    
                    <div class="form-group">
                        <label for="contra">Contraseña</label>
                        <input name="contra" type="password" class="form-control" id="contra" required>
                    </div>
                    <div class="form-group">
                        <label for="contra2">Confirmar Contraseña</label>
                        <input name="contra2" type="password" class="form-control" id="contra2" required>
                        <span id='message'></span>
                    </div>
                     
                    <button class="btn btn-success" type="submit" name="submit" id="submit">Submit</button>
                </form>
            </div> <!-- fin col -->
        </div> <!-- fin row -->
    </div> <!-- fin container -->
    <br><br>
    <script>
    $('#contra, #contra2').on('keyup', function () {
  if ($('#contra').val() == $('#contra2').val()) {
    $('#message').html('Coinciden').css('color', 'green');
    //$('#submit').removeAttr("disabled");
  } else 
    $('#message').html('No Coinciden').css('color', 'red');
    //$('#submit').attr("disabled","disabled");
});
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