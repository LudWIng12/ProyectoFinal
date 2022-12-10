<?php
    session_start();
    if(!empty($_POST["remember"])){
        setcookie ("cuenta",$_POST["cuenta"],time()+3600);
        setcookie ("contra",$_POST["contra"],time()+3600);
        echo "<br> cookies set successfuly";
    }else{
        setcookie("cuenta","");
        setcookie("contra","");
        echo "<br> Cookies Not Set";
    }
    //header('Location: login.php');
    $servidor = "localhost";  
    $cuenta = "root";  
    $password = '';  
    $bd = "tienda"; 
    // $servidor = "localhost";  
    // $cuenta = "id19918439_usuario1";  
    // $password = ']r2OafKP*S^{mdc^';  
    // $bd = "id19918439_bdprueba";   
    $cont = $_SESSION['num'];
     
    
    $conexion = new mysqli($servidor,$cuenta,$password,$bd);
    if ($conexion->connect_errno){
        die('Error en la conexion');
   }

   else{
    $user = $_POST['cuenta'];  
    $passwd = $_POST['contra'];  
      
        //to prevent from mysqli injection  
        $user = stripcslashes($user);  
        $passwd = stripcslashes($passwd);  
        $user = mysqli_real_escape_string($conexion, $user);  
        $passwd = mysqli_real_escape_string($conexion, $passwd);  
        
        $sql = "SELECT contrasena,bloqueo,nuevacontra from usuarios where cuenta = '$user'";  
        $result = mysqli_query($conexion, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        $verifica = password_verify($passwd,$row["contrasena"]);
        //var_dump($verifica);
        //var_dump($row);
        
        if(isset($_POST['captcha_challenge']) && $_POST['captcha_challenge'] == $_SESSION['captcha_text']) {  
        
            if($count == 1){  
                if($row["nuevacontra"]==1 && $verifica==true){
                    $_SESSION["usuario"] = $user;
                    ?> <script type='text/javascript'>
                    document.location.href = 'cambiocontra.php';
                    </script>
                    <?php
                }
                if($row["bloqueo"]==1){
                    $_SESSION["block"]=true;
                    $_SESSION["usuario"] = $user;
                    //var_dump($_SESSION["block"]);
                    echo '<script> alert("Cuenta bloqueada") </script>';
                }else{
                    if($verifica==true){
                    $_SESSION["block"]=false;
                    $_SESSION["usuario"] = $user;
                    //var_dump($_SESSION["block"]);
                    echo '<script> alert(" Bienvenido!") </script>';
                    $cont=0;
                    $_SESSION['num']=$cont; 
                    ?> <script type='text/javascript'>
                    document.location.href = '../index.php';
                    </script>
                    <?php
                    }
                    else{
                        $cont++;
                        $_SESSION['num']=$cont;
                        var_dump($_SESSION['num']);
                        echo '<script> alert("Usuario o contraseña incorrectos") </script>'; 
                        if($_SESSION['num']>=3){
                            $sql = "UPDATE usuarios SET bloqueo='1' WHERE cuenta='$user'";
                            $conexion->query($sql);
                            
                        }
                    }
                }
        }  
        else{  
            
            echo '<script> alert("Usuario o contraseña inexistentes!") </script>'; 
            
            
        }     
   } else{
    echo '<script> alert("Captcha incorrecto") </script>'; 
   }
}
?>
<script type='text/javascript'>
    document.location.href = 'login.php';
    </script>
<!-- <p><a href="index.php">Go to login page</a></p> -->