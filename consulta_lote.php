<?php
$id_lote_compra = $_POST['id_lote_compra'];
require 'conexion.php';
$q = "select * from lotescompra where UPPER(id_lote_compra) like '%" . strtoupper($id_lote_compra) . "%'";

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