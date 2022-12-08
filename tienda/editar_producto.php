<?php
   session_start();

    $idEnviado=$_GET['id'];
    
    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='tienda';

   /* $servidor='localhost';
    $cuenta='id19899694_equipo4';
    $password='BbsLMq?oUi\RB7[P';
    $bd='id19899694_tienda';*/
    
    $_SESSION["id"] = '';
    $_SESSION["nombre"] = '';
    $_SESSION["categoria"] = '';
    $_SESSION["descripcion"] = '';
    $_SESSION["precio"] = '';
    $_SESSION["existencia"] = '';
    $_SESSION["nomArch"] = '';

    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($conexion->connect_errno){
         die('Error en la conexion');
    }

    if(isset($_POST['mod'])){
        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $existencia = $_POST['existencia'];
        $id = $_POST['id'];

        $nomImg=$_FILES['imagen']['name'];
        $guardado=$_FILES['imagen']['tmp_name'];

        //subir archivo
        if(!file_exists('imagenes')){
            mkdir('imagenes',0777,true);
            if(file_exists('imagenes')){
                if(move_uploaded_file($guardado, 'imagenes/'.$nomImg)){}
            }
        }else{
            if(move_uploaded_file($guardado, 'imagenes/'.$nomImg)){}
        }

        $nomArch = 'imagenes/'.$_FILES['imagen']['name'];


        $ne = "UPDATE productos SET nombre='$nombre', categoria='$categoria', descripcion='$descripcion', precio='$precio', existencia='$existencia', nomArch='$nomArch' WHERE idProd='$id'";
        $fin = $conexion -> query($ne);

        echo "<script>
            alert('Producto actualizado! :P');
            window.location.href='index.php';
        </script>";
    }
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="../HeadFooter.css">
</head>

<header>
    <div class="menu">
        <div class="logo" ><img class="uno" src="../Images/logo_white_large.png"></img></div>
        <div>
            <ul class="nav">           
                <li class="dos"><a class="link" href="../index.html">Inicio</a></li>
                <li class="dos"><a class="link" href="tienda.php">Tienda</a></li>
                <li class="dos"><a class="link" href="../graficas/graficas.php">Graficas</a></li>
                <li class="dos"><a class="link" href="../Contacto.html">Contacto</a></li> 
                <li class="dos"><a class="link" href="../acerca.html">Acerca de</a></li> 
                <i class="fa-light fa-cart-shopping"></i>
            </ul>
        </div>

    </div>
</header>

<body>
    
<div class="derecha">
        
        <form class="estiloformulario" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post' enctype="multipart/form-data">
        <ul class="wrapper">
            <li class="form-row">
                <label for="nombre">ID</label>
                <input type="text" id="id" name="id"value="<?php echo $idEnviado ?>">
            </li>
            <li class="form-row">
                <label for="nombre">NOMBRE</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $_SESSION["nombre"]; ?>">
            </li>
            <li class="form-row">
                <label for="cuenta">PRECIO</label>
                <input type="text" id="precio" name="precio" value="<?php echo $_SESSION["precio"]; ?>">
            </li>
            <li class="form-row">
                <label for="contra">DESCRIPCION</label>
                <input type="text" id="descripcion" name="descripcion" value="<?php echo $_SESSION["descripcion"]; ?>">
            </li>
            <li class="form-row">
                <label for="contra">CATEGORIA</label>
                <input type="text" id="categoria" name="categoria" value="<?php echo $_SESSION["categoria"]; ?>">
            </li>
            <li class="form-row">
                <label for="contra">EXISTENCIA</label>
                <input type="text" id="existencia" name="existencia" value="<?php echo $_SESSION["existencia"]; ?>">
            </li>
            <li class="form-row">
                    <input type="file" name="imagen">
            </li>
            <li class="form-row">
                <button type="submit" name="mod">Modificar</button>
            </li>
        </ul>
        </form>       
    </div>
</div>
<div id="pie">
        <div>
            <h1> Contactanos </h1>
        </div>
        <div class="icons">
            <div><a class="link2"  href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a></div>
            <div><a class="link2" href="https://twitter.com/"><i class="fab fa-twitter"></i></a></div>
            <div><a class="link2" href="https://instagram.com/"><i class="fab fa-instagram"></i></a></div>
            <div><a class="link2" href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></div>
        </div>
        <script src="https://kit.fontawesome.com/a2cc4a6c09.js" crossorigin="anonymous"></script>
    </div>
</body>
</html>