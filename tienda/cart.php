<?php session_start(); 
//aqui empieza el carrito

	if(isset($_SESSION['carrito']) || isset($_POST['nombre'])){
		if(isset($_SESSION['carrito'])){
            $carrito_mio=$_SESSION['carrito'];
		    if(isset($_POST['nombre'])){
			    $nombre=$_POST['nombre'];
			    $precio=$_POST['precio'];
			    $cantidad=$_POST['cantidad'];
			    $donde=-1;
                if($donde != -1){
                    $cuanto=$carrito_mio[$donde]['cantidad'] + $cantidad;
                    $carrito_mio[$donde]=array("nombre"=>$nombre,"precio"=>$precio,"cantidad"=>$cantidad);
                }else{
                    $carrito_mio[]=array("nombre"=>$nombre,"precio"=>$precio,"cantidad"=>$cantidad);
                }
            }
 		
	    }else{
            $nombre=$_POST['nombre'];
            $precio=$_POST['precio'];
            $cantidad=$_POST['cantidad'];
            $carrito_mio[]=array("nombre"=>$nombre,"precio"=>$precio,"cantidad"=>$cantidad);	
	    }
	

        $_SESSION['carrito']=$carrito_mio;
    }

//aqui termina el carrito


header("Location: ".$_SERVER['HTTP_REFERER']."");
?>