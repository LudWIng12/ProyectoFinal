<?php
    
    /*$servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='tienda';*/

    $servidor='localhost';
    $cuenta='id19899694_equipo4';
    $password='BbsLMq?oUi\RB7[P';
    $bd='id19899694_tienda';
     
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
                $id = $_POST['id'];
                $nombre =$_POST['nombre'];
                $precio =$_POST['precio'];
                $descripcion =$_POST['descripcion'];
                $categoria = $_POST['categoria'];
                $existencia =$_POST['existencia'];

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

                
                //hacemos cadena con la sentencia mysql para insertar datos
                $sql = "INSERT INTO productos (idProd, nombre, categoria, descripcion, precio, existencia, nomArch) VALUES('$id','$nombre','$categoria','$descripcion', '$precio', '$existencia', '$nomArch')";
                $conexion->query($sql);  //aplicamos sentencia que inserta datos en la tabla usuarios de la base de datos
                if ($conexion->affected_rows >= 1){ //revisamos que se inserto un registro
                    echo "<script>
                        alert('Producto agregado! :D');
                        window.location.href='https://tiendadbproyecto.000webhostapp.com/tienda/admin_tienda.php';
                    </script>";
                }//fin
             
              //continaumos con la consulta de datos a la tabla usuarios
         //vemos datos en un tabla de html
       
         }
        
         }//fin 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
    <style>
        td,
        th {
            padding: 40px;

        }
        
    </style>
    <link rel="stylesheet" href="../HeadFooter.css">
</head>

<?php
    include "header.php";
?>

<body>

<div class="container">
        <div class="row">
            <div class="col-4">
                <form class="estiloformulario" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post' enctype="multipart/form-data">
                    <h2>Altas</h2>
                    <div class="form-group">
                        <label for="nombre">ID</label>
                        <input type="text" id="id" name="id" value="">
                    </div>
                    <div class="form-group">
                        <label for="nombre">NOMBRE</label>
                        <input type="text" id="nombre" name="nombre" value="">
                    </div>
                    <div class="form-group">
                        <label for="cuenta">PRECIO</label>
                        <input type="text" id="precio" name="precio" value="">
                    </div>
                    <div class="form-group">
                        <label for="contra">DESCRIPCION</label>
                        <input type="text" id="descripcion" name="descripcion" value="">
                    </div>
                    <div class="form-group">
                        <label for="contra">CATEGORIA</label>
                        <input type="text" id="categoria" name="categoria" value="">
                    </div>
                    <div class="form-group">
                        <label for="contra">EXISTENCIA</label>
                        <input type="text" id="existencia" name="existencia" value="">
                    </div>
                    <div class="form-group">
                        <input type="file" name="imagen">
                    </div>
                    <button class="btn btn-success" type="submit" name="submit">Agregar</button>
                </form>
            </div> <!-- fin col -->
        </div> <!-- fin row -->
    </div> <!-- fin container -->
    <br><br>
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
</body>

</html>
