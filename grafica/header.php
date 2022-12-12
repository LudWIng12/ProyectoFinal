<?php
    session_start();
?>
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/Header.css">
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="shortcut icon" href="imagenes/logo_small_icon_only.png">
</head>

<header>
    <div class="menu">
        <div class="logo" ><img class="uno" src="Images/logo_white_large.png"></img></div>
        <div>
            <ul class="nav">           
                <li class="dos"><a class="link" href="../index.php">Inicio</a></li>
                <li class="dos"><a class="link" href="../tienda/tienda.php">Tienda</a></li>
                <li class="dos"><a class="link" href="../Contacto.php">Contacto</a></li> 
                <li class="dos"><a class="link" href="../acerca.php">Acerca de</a></li> 
                <li class="dos"><a class="link" href="../ayuda.php">Ayuda</a></li> 
                <?php
                    if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]=="admin"){
                        echo '<li class="dos"><a class="link" href="../tienda/admin_tienda.php">Modificar</a></li> ';
                        echo '<li class="dos"><a class="link" href="graficas.php">Graficas</a></li> ';
                    }
                ?>
            </ul>
            
        </div>
        <div class="absolute">
            
            
            <ul class="nav2">  
            <?php
                if(isset($_SESSION["usuario"])){
                    $usr=$_SESSION["usuario"];
                      echo '<li class="dos"><a class="link" href="../loginregistro/logout.php">Salir</a></li>';
                      echo "<a>$usr</a>";
                }else{
                    echo '<li class="dos"><a class="link" href="../loginregistro/login.php">Login</a></li>';
                    echo '<li class="dos"><a class="link" href="../loginregistro/registro.php">Registrate</a></li>';
                }
            ?>         
                
            </ul>

            
        </div>
    </div>
</header>
</body>

</html>
