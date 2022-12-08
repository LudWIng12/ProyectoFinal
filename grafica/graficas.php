<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graficas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="../HeadFooter.css">
</head>

<header>
    <div class="menu">
        <div class="logo" ><img class="uno" src="../Images/logo_white_large.png"></img></div>
        <div>
            <ul class="nav">           
                <li class="dos"><a class="link" href="../index.html">Inicio</a></li>
                <li class="dos"><a class="link" href="../tienda/tienda.php">Tienda</a></li>
                <li class="dos"><a class="link" href="../Contacto.html">Contacto</a></li> 
                <li class="dos"><a class="link" href="../acerca.html">Acerca de</a></li> 
                <i class="fa-light fa-cart-shopping"></i>
            </ul>
        </div>

    </div>
</header>

<body>
    <div class="col-lg-12" style="padding-top: 20px;">
        <div class="card">
            <h5 class="card-header">Graficas</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2">
                        <button class="btn btn-primary" onclick="CargarDatos()">Existencia</button>
                    </div>
                    <div>
                        <canvas style= "width: 1000px" id="myChart"></canvas>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <button class="btn btn-primary" onclick="CargarDatosDos()">Precios</button>
                    </div>
                    <div>
                        <canvas style= "width: 1000px; padding-top: 20px" id="myChart2"></canvas>
                    </div>

                </div>
            </div>
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    function CargarDatos(){
        $.ajax({
            url:"controlador_grafico.php",
            type: 'POST'
        }).done(function(resp){
            var titulo = [];
            var cantidad = [];
            var data = JSON.parse(resp);
            for(var i=0; i<data.length;i++){
                titulo.push(data[i][1]);
                cantidad.push(data[i][0]);
            } 

            var ctx = document.getElementById('myChart');

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                labels: titulo,
                datasets: [{
                    label: 'Existencia de productos',
                    data: cantidad,
                    borderWidth: 1
                }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });

    }

    function CargarDatosDos(){
        $.ajax({
            url:"controlador_grafico2.php",
            type: 'POST'
        }).done(function(resp){
            var titulo = [];
            var cantidad = [];
            var data = JSON.parse(resp);
            for(var i=0; i<data.length;i++){
                titulo.push(data[i][1]);
                cantidad.push(data[i][0]);
            } 

            var ctx = document.getElementById('myChart2');

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                labels: titulo,
                datasets: [{
                    label: 'Precio de los productos',
                    data: cantidad,
                    borderWidth: 1
                }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });

    }
    
</script>