<?php
include_once '../conexion.php';
// Recepción de los datos enviados mediante POST desde el JS   
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';

switch($opcion){
    case 1: //alta
        
        break;
    case 2: //modificación
        $consulta = "UPDATE empresa SET nombre='$nombre', rfc='$rfc', direccion='$direccion', telefono='$edad', tipo='$tipo', giro='$giro', fecha_alta='$fecha', periodo='$periodo' WHERE nombre='$id' ";		

        $resultado = $mysqli->query($sql);
        $resultado->execute();        
        mysqli_close($mysqli);
        location.reload();
        break;        
    case 3://baja	
        $sql = "DELETE FROM empresa WHERE nombre='$id' ";
        $resultado = $mysqli->query($sql);
        mysqli_close($mysqli);
        location.reload();                        
        break;        
}


