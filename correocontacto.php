<?php
    require 'loginregistro/PHP/Exception.php';
    require 'loginregistro/PHP/PHPMailer.php';
    require 'loginregistro/PHP/SMTP.php';
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception; 
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                
                $correocon = $_POST["mailc"];
                $nombrecon = $_POST["nomcon"];
                $mensaje = $_POST["mensajecon"];
                $email ="webproyectof@gmail.com";
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
                    $mail->Subject = 'Contacto';
                    $mail->Body    = "<h1>Contacto de:$nombrecon</h1>
                    <h1>Direccion de correo: $correocon</h1>
                    <p>Mensaje:$mensaje</p>";                   
                    
                    #This is the body in plain text for non-HTML mail clients
                    $mail->AltBody = 'Contacto';

                    $mail->send();
                    echo '<script> alert("Gracias por ponerte en contacto!") </script>'; 
                    ?> 
                    
                    <script type='text/javascript'>
                    document.location.href = 'Contacto.php';
                    </script>
                    <?php
                    var_dump($mail);
                }
                catch(Exception $e){
                    echo "No se pudo enviar el mensaje. Mailer Error: {$mail->ERRORINFO}";
                }
            }

?>