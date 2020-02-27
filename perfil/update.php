<?php
	
	require '../conexion.php';

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
   
	
	
	
	$sql = "UPDATE usuarioadmin SET usuario='$usuario', password='$password' WHERE id = '0'";
	$resultado = $conexion->query($sql);
	header("Location: perfil.php");
	
?>