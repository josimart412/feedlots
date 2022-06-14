
    <?php
    require'conexion.php'; 
    $u= $_POST['usuario']; 
    $p= $_POST['password'];

    //echo $p;
    $q="SELECT * FROM usuarios WHERE usuario = '$u' AND password = '$p'";
    
    $r = mysqli_query ($con,$q ); 

    if (mysqli_num_rows($r)>0) {
        session_start();
        $_SESSION['usuario']=$u;

        echo ("1");
        

    }
    else
    {
        echo ("0");
        
    }

    ?>
