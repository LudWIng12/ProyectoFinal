<?php 
    session_start();
?>
<html>
<head>
<title>Contactanos</title>
<style>
        body {
            font-family: 'Secular One', sans-serif;
            background-image: radial-gradient(#006494,#003554);
            background-position:center ;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            color: white;
        }
        .link{
            padding-left:initial;
            color: white;
        }


</style>


</head>
<body>
<?php
            require 'Phpmailer/Exception.php';
            require 'Phpmailer/PHPMailer.php';
            require 'Phpmailer/SMTP.php';
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;


                $toMail = $_POST["mail"];
                $asunto = "gracias por su mensaje!";
                $mensaje = "<h2>sera atendido lo mas breve posible</h2>";

                $myMail = new PHPMailer();
                $myMail->isSMTP();
                $myMail->Host='smtp.office365.com';
                $myMail->SMTPAuth = true;
                $myMail->Port=587;
                $myMail->Username='al291590@edu.uaa.mx';
                $myMail->Password='Jg1973684250';
                $myMail->SMTPSecure='tls';
                $myMail->setFrom('al291590@edu.uaa.mx','Soporte LoboGamer');
                $myMail->addAddress($toMail);
                $myMail->Subject = $asunto;
                $myMail->isHTML();
                $myMail->Body=$mensaje;
                if($myMail->send()){
                    echo "<div class='justify-content-center'><h3 style='text-align: center;'>Gracias por contactarnos!</h3></div>";
                }else{
                    $error = $myMail->ErrorInfo;
                    echo "<div class='justify-content-center'><h4 style='text-align: center;'>No se pudo enviar el correo: $error </h4></div>";
                } 
                
        ?>
        <a class="link" href="index.php">Regresar a Inicio</a>
</body>
</html>



