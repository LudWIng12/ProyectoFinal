<?php
    require 'modelo_grafico2.php';

    $MG = new Modelo_Grafico();
    $consulta = $MG -> TraerDatos();
    echo json_encode($consulta);
?>