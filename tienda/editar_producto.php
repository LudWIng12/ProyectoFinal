<?php
   session_start();
    
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

    if(isset($_POST['editar'])){
        $modificar = $_POST['id'];
        $_SESSION['modificar2'] = $modificar;
        $sql5 = "SELECT *
                FROM productos
                WHERE idProd='$modificar'";
        $resultado = $conexion -> query($sql5);
        while($fila = $resultado -> fetch_assoc()) {
            $_SESSION['id'] = $fila['idProd'];
            $_SESSION['nom'] = $fila['nombre'];
            $_SESSION['cate'] = $fila['categoria'];
            $_SESSION['des'] = $fila['descripcion'];
            $_SESSION['ex'] = $fila['existencia'];
            $_SESSION['precio'] = $fila['precio'];
            $_SESSION['img'] = $fila['nomArch'];
        }
    }

    if(isset($_POST['mod'])){
        $nombre = $_POST['nombre2'];
        $categoria = $_POST['categoria2'];
        $descripcion = $_POST['descripcion2'];
        $precio = $_POST['precio2'];
        $existencia = $_POST['existencia2'];
        $id = $_POST['id2'];
        $modificar1 = $_SESSION['modificar2'];

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


        $ne = "UPDATE productos 
                SET idProd='$id', nombre='$nombre', categoria='$categoria', descripcion='$descripcion', precio='$precio', existencia='$existencia', nomArch='$nomArch' 
                WHERE idProd='$modificar1'";
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

<?php
    include "header.php";
?>

<body>
    
<div class="derecha">
        
        <form class="estiloformulario" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post' enctype="multipart/form-data">
        <ul class="wrapper">
            <li class="form-row">
                <label for="nombre">ID</label>
                <input type="number" id="id" name="id2"value="<?php echo $_SESSION["id"]; ?>" >
            </li>
            <li class="form-row">
                <label for="nombre">NOMBRE</label>
                <input type="text" id="nombre" name="nombre2" value="<?php echo $_SESSION["nom"]; ?>">
            </li>
            <li class="form-row">
                <label for="cuenta">PRECIO</label>
                <input type="text" id="precio" name="precio2" value="<?php echo $_SESSION["precio"]; ?>">
            </li>
            <li class="form-row">
                <label for="contra">DESCRIPCION</label>
                <input type="text" id="descripcion" name="descripcion2" value="<?php echo $_SESSION["des"]; ?>">
            </li>
            <li class="form-row">
                <label for="contra">CATEGORIA</label>
                <input type="text" id="categoria" name="categoria2" value="<?php echo $_SESSION["cate"]; ?>">
            </li>
            <li class="form-row">
                <label for="contra">EXISTENCIA</label>
                <input type="text" id="existencia" name="existencia2" value="<?php echo $_SESSION["ex"]; ?>">
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