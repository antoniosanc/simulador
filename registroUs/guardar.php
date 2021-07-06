<?php  

	include("../conexion.php");
	
	if (isset($_POST['us']) && isset($_POST['contra']) && isset($_POST['nom']) && isset($_POST['tipo']) && isset($_POST['correo']) && isset($_POST['escuela']) && isset($_POST['tel']) ) {

		$nom_us=trim($_POST['us']);
		$contra=trim($_POST['contra']);
		$nombre=trim($_POST['nom']);
		$tipo=trim($_POST['tipo']);
		$correo=trim($_POST['correo']);
		$escuela=trim($_POST['escuela']);
		$telefono=trim($_POST['tel']);

		$sql = "INSERT INTO usuario (`username`, `password`, `nombre`, `tipo`, `correo`, `escuela`, `telefono`) VALUES ('$nombre','$contra','$nom_us','$tipo','$correo','$escuela','$telefono')";
		    $resultado = $conexion->query($sql);
			
		//Ejecutar la consulta
		if (!$resultado) {
			//echo $sql_1;?>
				<script type="text/javascript">
					alert("Error en el registro" +<?php printf("Errormessage: %s\n", $conexion->error);?>);
					window.location.href='../admin.php';
				</script>

			<?php
			} else {?>
				<script type="text/javascript">
					alert("Registro insertado correctamente");
				window.location.href='../admin.php';
				</script>
			

			<?php
			}


	}else{

	}



	
?>