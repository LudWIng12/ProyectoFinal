<?php include "header.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="Enter your description here"/>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos_tienda.css">
    <link rel="stylesheet" href="../css/Header.css">
    <link rel="stylesheet" href="../css/HeadFooter.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

</head>

<?php 

if(isset($_SESSION['carrito'])){
    $carrito_mio=$_SESSION['carrito'];
}



// contamos nuestro carrito
if(isset($_SESSION['carrito'])){
    for($i=0;$i<=count($carrito_mio)-1;$i ++){
        if(isset($carrito_mio[$i])){
        if($carrito_mio[$i]!=NULL){ 
        if(!isset($carrito_mio['cantidad'])){$carrito_mio['cantidad'] = '0';}else{ $carrito_mio['cantidad'] = $carrito_mio['cantidad'];}
        $total_cantidad = $carrito_mio['cantidad'];
    $total_cantidad ++ ;
    if(!isset($totalcantidad)){$totalcantidad = '0';}else{ $totalcantidad = $totalcantidad;}
    $totalcantidad += $total_cantidad;
    }}}
}

    //declaramos variable
    if(!isset($totalcantidad)){$totalcantidad = '';}else{ $totalcantidad = $totalcantidad;}
?>



<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
    <a class="navbar-brand" href="#">Mi tienda</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal_cart" style="color: red;"><i class="fas fa-shopping-cart"></i> <?php echo $totalcantidad; ?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- END NAVBAR -->


<!-- MODAL CARRITO -->
<div class="modal fade" id="modal_cart" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Carrito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   
   
     
			<div class="modal-body">
				<div>
					<div class="p-2">
						<ul class="list-group mb-3">
                            <?php
                                if(isset($_SESSION['carrito'])){
                                $total=0;
                                for($i=0;$i<=count($carrito_mio)-1;$i ++){
                                    if(isset($carrito_mio[$i])){
                                    if($carrito_mio[$i]!=NULL){
                            ?>
							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div class="row col-12" >
									<div class="col-6 p-0" style="text-align: left; color: #000000;"><h6 class="my-0">Cantidad: <?php echo $carrito_mio[$i]['cantidad'] ?> : <?php echo $carrito_mio[$i]['nombre']; // echo substr($carrito_mio[$i]['titulo'],0,10); echo utf8_decode($titulomostrado)."..."; ?></h6>
									</div>
									<div class="col-6 p-0"  style="text-align: right; color: #000000;" >
									<span   style="text-align: right; color: #000000;"><?php echo $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'];    ?> $</span>
									</div>
								</div>
							</li>
							<?php
							$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
							}
							}
							}
                            }
							?>
							<li class="list-group-item d-flex justify-content-between">
							<span  style="text-align: left; color: #000000;">TOTAL</span>
							<strong  style="text-align: left; color: #000000;"><?php
							    if(isset($_SESSION['carrito'])){
                                $total=0;
                                for($i=0;$i<=count($carrito_mio)-1;$i ++){
                                    if(isset($carrito_mio[$i])){
                                if($carrito_mio[$i]!=NULL){ 
                                $total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                                }
                                }}}
                                if(!isset($total)){$total = '0';}else{ $total= $total;}
                                echo $total; ?> $</strong>
							</li>
						</ul>
					</div>
				</div>
			</div>
			


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <a type="button" class="btn btn-primary" href="borrarcarro.php">Vaciar carrito</a>
	 <a type="button" class="btn btn-dark" href="DirEnvio.php">Pagar</a>     
      </div>
    </div>
  </div>
</div>
<!-- END MODAL CARRITO -->
    
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
         <p >
            <a href="filtro_nintendo_switch.php" class="btn btn-primary" style="">Nintendo Switch</a>
            <a href="filtro_xbox.php" class="btn btn-primary" style="">XBox</a>
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
                    <div class="card-group" style="width: 14rem;">
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
                                    <br>

                                    <form method="post" action="cart.php">
                                        <input name="precio" type="hidden" id="precio" value="<?php echo $fila["precio"];?>" />
                                        <input name="nombre" type="hidden" id="nombre" value="<?php echo $fila["nombre"];?>" />
                                        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
                                        
                                        <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                                    </form>

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



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>

</body>
<style>
    #pie{
        position: absolute;
    }
</style>
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
        <script src="https://kit.fontawesome.com/a2cc4a6c09.js" crossorigin="anonymous"></script>
    </div>

</html>
