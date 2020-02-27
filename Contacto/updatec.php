<?php
session_start();
if ($_SESSION['nivel'] != 1){
  header('Location:../index.php');
}?>
<?php
	$id = $_REQUEST['id_contacto'];
	require '../conexion.php';

	$ruta="imagencca";
	$archivo=$_FILES['urlimagen']['tmp_name'];
		 
	$nombreArchivo=$_FILES['urlimagen']['name'];
		
	move_uploaded_file($archivo,$ruta."/".$nombreArchivo);
	$ruta=$ruta."/".$nombreArchivo;
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $horario = $_POST['horario'];
    $pfgb = $_POST['pgfb'];
    
	
	
	
	$sql = "UPDATE contacto SET urlimagen='$ruta', nombrec='$nombre', direccionc='$direccion',
     telefonoc='$telefono', horarioc='$horario', pgfbc='$pfgb' WHERE id_contacto = '$id'";
	$resultado = $conexion->query($sql);
	
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<script src="bootstrap/js/jquery-1.8.3.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../bootstrap/css/bootstrap-theme.css.map"></script>
	<link rel="stylesheet" href="stylecontacto.css">
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				<?php if($resultado) { ?>
				<h3 id="h3contactomod">REGISTRO MODIFICADO</h3>
				<?php } else { ?>
				<h3>ERROR AL MODIFICAR</h3>
				<?php } ?>
				
				
				
				</div>
			</div>
			<a href="subir-datos-cca.php" class="btn btn-primary" id="btncontactodelete">Regresar</a>
		</div>
		
		<img src="../imglogin/canaco (2).png" id="imgcontact">
	</body>
</html>