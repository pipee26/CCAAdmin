<?php
    	require '../conexion.php';
    	
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
    $empresa = $_POST["empresa"];
	
	date_default_timezone_set('America/Mexico_city');
        $fecha=date("Y-m-d H:i:s");

	$curso = $_POST["curso"];
	$statement = mysqli_prepare($conexion, "INSERT INTO personas (nombre, apellido, empresa, curso, fecha) VALUES (?, ?, ?, ?,?)");
	mysqli_stmt_bind_param($statement, "sssss",$nombre, $apellido, $empresa, $curso, $fecha);
    	mysqli_stmt_execute($statement);
		
    	$response = array();
    	$response["succes"] = true;  

    	echo json_encode($response);
?>