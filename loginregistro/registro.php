<?php
    
    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='tienda';
    require 'PHP/Exception.php';
    require 'PHP/PHPMailer.php';
    require 'PHP/SMTP.php';
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;  
            
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
                $correo =$_POST['correo'];
                $cuenta =$_POST['cuenta'];
                $nombre =$_POST['nombre'];
                $pass =$_POST['contra'];
                $pass2 =$_POST['contra2'];
                $passhash = password_hash($pass,PASSWORD_DEFAULT);
                if($pass != $pass2){
                    echo '<script> alert("Contraseñas no coinciden") </script>';
                    ?> <script type='text/javascript'>
                    document.location.href = 'registro.php';
                    </script>
                    <?php
                }else{
                //hacemos cadena con la sentencia mysql para insertar datos
                $sql = "INSERT INTO usuarios ( cuenta,nombre, contrasena,correo) VALUES('$cuenta','$nombre','$passhash','$correo')";
                $conexion->query($sql);  //aplicamos sentencia que inserta datos en la tabla usuarios de la base de datos
                $email = $_POST["correo"];
                
                $mail = new PHPMailer(true);

                try{
                    //Server settings
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.office365.com';                   
                    $mail->SMTPAuth   = true;                                   
                    $mail->Username   = 'al291590@edu.uaa.mx';                  
                    $mail->Password   = 'Jg1973684250';                               
                    $mail->SMTPSecure = 'tls';
                    $mail->Port       = 587;
                    
                    $mail->setFrom('al291590@edu.uaa.mx', 'Equipo 4');
                    $mail->addAddress($email);
                    
                    $mail->isHTML(true);
                    $mail->Subject = 'Cupon de descuento';
                    $mail->AddEmbeddedImage('../images/cupon1.png', 'cupon');
                    $mail->Body    = "<h1>Tu cupon de descuento!:<img src='cid:cupon'/></h1>";
                    
                    #This is the body in plain text for non-HTML mail clients
                    $mail->AltBody = 'Disfruta!';

                    $mail->send();
                     ?> 
                     <!-- <script type='text/javascript'> -->
                     <!-- document.location.href = 'login.php'; -->
                    <!-- </script> -->
                    <?php
                }
                catch(Exception $e){
                    echo "No se pudo enviar el mensaje. Mailer Error: {$mail->ERRORINFO}";
                }
                if ($conexion->affected_rows >= 1){ //revisamos que se inserto un registro
                
                    echo '<script> alert("registro insertado") </script>';
                    ?> <script type='text/javascript'>
                    document.location.href = 'login.php';
                    </script>
                    <?php
                }else{
                    echo '<script> alert("Contraseñas no coinciden") </script>';
                }//fin
            }
         }//fin    
    }


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

<?php
    include "header.php";
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post'>
                    <h2 style="color:white;">Registro de Usuarios</h2>
                    
                    <div class="form-group">
                        <label for="correo" style="color:white;">Correo</label>
                        <input type="email" class="form-control" name="correo" id="correo" required>
                    </div>
                    <div class="form-group">
                        <label for="correo" style="color:white;">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="cuenta" style="color:white;">Cuenta</label>
                        <input type="text" id="cuenta" name="cuenta" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="contra" style="color:white;">Contraseña</label>
                        <input name="contra" type="password" class="form-control" id="contra" required>
                    </div>
                    <div class="form-group">
                        <label for="contra2" style="color:white;">Confirmar Contraseña</label>
                        <input name="contra2" type="password" class="form-control" id="contra2" required>
                        <span id='message'></span>
                    </div>
                    <button class="btn btn-success" type="submit" name="submit" id="submit">Registrar</button>
                    
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