<?php
$id_lote_compra= $_POST['id_lote_compra'];
$peso_total= $_POST['peso_total'];
$peso_promedio= $_POST['peso_promedio'];
$precio_total= $_POST['precio_total'];
$cantidad_animales= $_POST['cantidad_animales'];
$id_vendedor= $_POST['id_vendedor'];


require 'conexion.php';
$q="INSERT INTO lotescompra (peso_total, peso_promedio, precio_total, cantidad_animales, id_vendedor) values ('$peso_total', '$peso_promedio', '$precio_total', '$cantidad_animales', '$id_vendedor')";

$r=mysqli_query($con, $q);

if($r){
    echo "<script>alert ('cliente registrado')</script>";
}
else{
    echo "<script>alert ('cliente no pudo registrarse')</script>";
}
?>