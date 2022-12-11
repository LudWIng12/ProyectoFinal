
<?php 
    $contFinal = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos_tienda.css">
    <link rel="stylesheet" href="../HeadFooter.css">

</head>

<?php
    include "header.php";
?>

<body>
<script>
    function agregar(id){
        var indice = id;
        console.log(`Elegiste ` + indice);
        <?php 
            $contFinal++;
        ?>
        console.log(<?php echo $contFinal ?>);
    }
    
</script>
    
<?php
    

    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='tienda';

   /* $servidor='localhost';
    $cuenta='id19899694_equipo4';
    $password='BbsLMq?oUi\RB7[P';
    $bd='id19899694_tienda';*/
     
    //conexion a la base de datos
    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($conexion->connect_errno){
         die('Error en la conexion');
    }
    else{
         //conexion exitos
         //vemos datos en un tabla de html
         $sql = 'select * from productos';//hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
         $resultado = $conexion -> query($sql); //aplicamos sentencia
         ?>
         <p align="right">
            <a href="agregar_producto.php" class="btn btn-primary" style="">Agregar producto</a>
                <?php
                $numPro = 0;
            ?>
            <script> var array=[];</script>
            <script>
            array.push("<?php echo $producto ?>");
            </script>
        </p>
         <?php
         if ($resultado -> num_rows){ //si la consulta genera registros
                
                while( $fila = $resultado -> fetch_assoc()){ //recorremos los registros obtenidos de la tabla
                ?>
                <div class="prod">
                    <div class="card-group" style="width: 10rem;">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo $fila['nomArch'];?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php 
                                        echo $fila['nombre'];
                                    ?>
                                </h5>
                                <p class="card-text">
                                    $<?php 
                                        echo $fila['precio']; 
                                    ?>
                                    <br>
                                    categoria: <?php 
                                        echo $fila['categoria'];
                                    ?>
                                    <button id="<?php echo $fila['nombre'] ?>" onclick="agregar(this.id)">
                                        <img class="img-fluid" src="../images/carrito_.png" alt="" width="50" height="15">
                                    </button>
                                    <br>
                                    <?php 
                                        echo $fila['descripcion'];
                                    ?>
                                </p>
                                <p class="card-text"><small class="text-muted">
                                    disponibles: 
                                    <?php  
                                        echo $fila['existencia'];
                                    ?>
                                </small></p>
                                <p class="card-text">
                                    <form method='post' action="editar_producto.php">
                                        <input type="hidden" name="id" value="<?php echo $fila['idProd']; ?>">
                                        <button class="bparaE" type="submit" name="editar">Editar</button>                                       
                                    </form>
                                    <br>
                                    <form method="get" action="eliminar_producto.php">
                                        <input type="hidden" name="id" value="<?php echo $fila['idProd']; ?>">
                                        <button  class="bparaE" type="submit" name="eliminar">Eliminar</button>

                                    </form>
                                </p>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <?php
                $numPro = $numPro+1;
                }//fin while
         }
         else{
             echo "no hay datos";
         }
        
         }//fin 
?>

<<div id="pie">
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

<script>
        function myalert() {
            alert("Estas a punto de eliminar.\n " +
                "It is the best portal for computer" +
                         "science enthusiasts!");
        }
</script>
