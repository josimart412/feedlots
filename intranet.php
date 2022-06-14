<?php
session_start();
require'conexion.php';


if (!isset($_SESSION['usuario'])){

    header("location: index.html");
        

}
else
{

    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
            <!-- Responsive navbar-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="#!">Ganaderia - Panel de control</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link" href="consulta_i.php">Ingreso de animales</a></li>
                            <li class="nav-item"><a class="nav-link" href="transporte.html">Transporte</a></li>
                            <li class="nav-item"><a class="nav-link" href="produccion.html">Acopio</a></li>
                            <li class="nav-item"><a class="nav-link" href="contacto.html">servicios</a></li>
                            <?php
                            print "<li class='nav-item'><a class='nav-link' href='#'>$_SESSION[usuario]</a></li>"
                            ?>
                            <li class="nav-item"><a class="nav-link" href="cerrar_s.php">Cerrar sesion</a></li>"
                        </ul>
                    </div>
                </div>
            </nav>
</body>