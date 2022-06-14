<?php
$n_caravana=$_POST['id_animal'];
require 'conexion.php';
$q="delete from animales where id_animal='$id_animal'";
$r=mysqli_query($con,$q);

if ($r){

echo ('1');

}
    else{

echo ('0');

}
?>