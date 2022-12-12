<?php
    include "header.php";
    error_reporting(E_ERROR | E_PARSE);
    $servidor = "localhost";  
    $cuenta = "root";  
    $password = '';  
    $bd = "tienda";  
    // $servidor = "localhost";  
    // $cuenta = "id19918439_usuario1";  
    // $password = ']r2OafKP*S^{mdc^';  
    // $bd = "id19918439_bdprueba";   
    //$cont = $_SESSION['num'];
    require 'PHP/Exception.php';
    require 'PHP/PHPMailer.php';
    require 'PHP/SMTP.php';
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception; 
   function randomText( $length = 8 ) 
    { 
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?"; 
    $length = rand(10, 16); 
    $password = substr( str_shuffle(sha1(rand() . time()) . $chars ), 0, $length );
    return $password;
    }
            
    $contranew=randomText();
    $contrahash=password_hash($contranew,PASSWORD_DEFAULT);
    //var_dump($contranew);
    //var_dump($contrahash);
    $conexion = new mysqli($servidor,$cuenta,$password,$bd);
    if ($conexion->connect_errno){
        die('Error en la conexion');
   }

   else{
    $user = $_POST['cuenta'];  
    //$passwd = $_POST['contra'];  
      
        //to prevent from mysqli injection  
        $user = stripcslashes($user);  
        //$passwd = stripcslashes($passwd);  
        $user = mysqli_real_escape_string($conexion, $user);  
        //$passwd = mysqli_real_escape_string($conexion, $passwd);  
        
        $sql = "SELECT correo from usuarios where cuenta = '$user'";  
        $result = mysqli_query($conexion, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        //var_dump($row["correo"]);
        //$verifica = password_verify($passwd,$row["contrasena"]);
        //var_dump($verifica);
        //var_dump($row);
        if($count == 1){  
            $sql = "UPDATE usuarios SET contrasena='$contrahash',nuevacontra='1' WHERE cuenta='$user'";
            $conexion->query($sql);
            
            $_SESSION["block"]=false;
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $email = $row["correo"];
                
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
                    $mail->Subject = 'Nueva Contraseña';
                    $mail->Body    = "<h1>Tu nueva contraseña es:$contranew</h1>";
                    #This is the body in plain text for non-HTML mail clients
                    $mail->AltBody = 'Nueva contraseña';

                    $mail->send();
                    ?> <script type='text/javascript'>
                    document.location.href = 'login.php';
                    </script>
                    <?php
                }
                catch(Exception $e){
                    echo "No se pudo enviar el mensaje. Mailer Error: {$mail->ERRORINFO}";
                }
            }
        }else{  
        
        echo '<script> alert("Usuario o contraseña inexistentes!") </script>'; 
        
        
    } 
           
    

                
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

<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post'>
                    <h2 style="color:white;">Recuperacion de contraseña</h2>
                    
                    
                    <div class="form-group">
                        <label for="cuenta" style="color:white;">Cuenta</label>
                        <input type="text" id="cuenta" name="cuenta" class="form-control" required>
                    </div>
                    
                     
                    <button class="btn btn-success" type="submit" name="submit" id="submit">Submit</button>
                </form>
            </div> <!-- fin col -->
        </div> <!-- fin row -->
    </div> <!-- fin container -->
    <br><br>
 
</body>

</html>
