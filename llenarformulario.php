<?php
$id_animal = $_POST['id_animal'];
require 'conexion.php';
$q = "select * from animales where id_animal=$id_animal";


$r = mysqli_query($con, $q);
//se arma un array asociativo(nombre campo , valor) que despues se
//va a trasformar en un json para devolver

if (mysqli_num_rows($r) > 0){
    while ($valores = mysqli_fetch_assoc($r)){
        $array[]= $valores;
    }
    //envio respuesta a ajax como json
    echo json_encode($array);
  }
else
  {

  }
mysqli_close($con);

?>