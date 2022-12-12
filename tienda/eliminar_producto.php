<?php
   session_start();

    $idEnviado=$_GET['id'];
    
    /*$servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='tienda';*/

    $servidor='localhost';
    $cuenta='id19899694_equipo4';
    $password='BbsLMq?oUi\RB7[P';
    $bd='id19899694_tienda';
    

    $conexion = new mysqli($servidor,$cuenta,$password,$bd);
    

    if ($conexion->connect_errno){
         die('Error en la conexion');
    }
    else{
        //$sql = "DELETE FROM productos WHERE idProd='$idEnviado'";
        $sql = "select * from productos WHERE idProd='$idEnviado'";
        $fin = $conexion -> query($sql);
        $fila = $fin -> fetch_assoc();
                    echo $fila['nombre'];
                    ?> <br> <?php
                    echo $fila['categoria'];
                    ?> <br> <?php
                    echo $fila['descripcion'];
                    ?> <br> <?php
                    echo $fila['existencia'];
                    ?> <br> <?php
                    echo $fila['precio'];
                    ?> <br> <?php
                    echo $fila['nomArch'];
        ?>
        <button onclick="eliminar()">Confirmar</button>
        <?php
    }
       
?>

<script>
        function eliminar() {
            <?php
            $sql = "DELETE FROM productos WHERE idProd='$idEnviado'";
            $fin = $conexion -> query($sql);
            ?>
            alert("Se ha eliminado el producto.\n ");
            window.location.href='admin_tienda.php';
        }
</script>
