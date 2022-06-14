
<?php
//refresco la sesion
session_start();
//destruyo la session
session_destroy();
//volvemos al inicio 
header("location:index.html");
?>
