<?php
$n_caravana= $_POST['n_caravana'];
$id_raza= $_POST['id_raza'];
$sexo= $_POST['sexo'];
$peso_compra= $_POST['peso_compra'];
$fecha_i= $_POST['fecha_i'];
$id_campo= $_POST['id_campo'];
$id_corral= $_POST['id_corral'];
$id_lote_compra= $_POST['id_lote_compra'];
$id_vendedor= $_POST['id_vendedor'];
$precio_compra= $_POST['precio_compra'];

require 'conexion.php';
$q="INSERT INTO animales (n_caravana, id_raza, sexo, peso_compra, fecha_i, id_campo, id_corral, id_lote_compra, id_vendedor, precio_compra ) values ('$n_caravana', '$id_raza', '$sexo', '$peso_compra', '$fecha_i', '$id_campo', '$id_corral', '$id_lote_compra', '$id_vendedor', '$precio_compra')";

$r=mysqli_query($con, $q);

if($r){
    echo "<script>alert ('cliente registrado')</script>";
}
else{
    echo "<script>alert ('cliente no pudo registrarse')</script>";
}
?>