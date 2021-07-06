<?php

	include("../conexion.php");
	sleep(1);
if (isset($_POST)) {
    $username1 =$_POST['username'];
    $username=trim($username1);
 	 $sql2 = "SELECT * FROM usuario WHERE nombre='$username' ";
    $result = $conexion->query($sql2);
 
    if ($result->num_rows > 0) {
        
        echo ' <div align="center">';
        //echo '<div class="alert alert-success"><strong>Enhorabuena!</strong> Usuario disponible.</div>';
        echo ' ';
       	echo '<div class="alert alert-danger"><strong>Oh no!</strong>Ya existe este usuario intenta con otro</div>';
        echo '</div> ';
    } else {
        echo ' <div align="center">';
        //echo '<div class="alert alert-success"><strong>Enhorabuena!</strong> Usuario disponible.</div>';
        echo ' ';
        echo '<button type="submit" value="Registrar" class="btn btn-primary">Registrar</button>';

        echo '</div> ';
    }
}

?>