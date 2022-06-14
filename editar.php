<?php
$id_animal= $_POST['id_animal'];
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
$q="UPDATE animales SET n_caravana='$n_caravana', id_raza='$id_raza', sexo='$sexo', peso_compra=$peso_compra, fecha_i='$fecha_i', id_campo='$id_campo', id_corral='$id_corral', id_lote_compra='$id_lote_compra', id_vendedor='$id_vendedor', precio_compra='$precio_compra' WHERE id_animal='$id_animal'";

$r=mysqli_query($con, $q);

if ($r){

    echo ('1');
    
    }
        else{
    
    echo ('0');
    
    }
?>