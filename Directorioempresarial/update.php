<?php
session_start();
if ($_SESSION['nivel'] != 1){
  header('Location:../index.php');
}?>
<?php
	$id = $_REQUEST['id'];
	require '../conexion.php';

	$ruta="imagenes";
	$archivo=$_FILES['urlimagen']['tmp_name'];
		
	$nombreArchivo=$_FILES['urlimagen']['name'];
		
	move_uploaded_file($archivo,$ruta."/".$nombreArchivo);
    $ruta=$ruta."/".$nombreArchivo;
    $tipo = $_POST['tipo'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $horario = $_POST['horario'];
    $pfgb = $_POST['pgfb'];
    
	
	
	
	$sql = "UPDATE empresas SET  tipo='$tipo',nombre='$nombre', direccion='$direccion',
     telefono='$telefono', horario='$horario', pgfb='$pfgb', urlimagen='$ruta' WHERE id = '$id'";
	$resultado = $conexion->query($sql);
	
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<script src="bootstrap/js/jquery-1.8.3.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../bootstrap/css/bootstrap-theme.css.map"></script>
	<link rel="stylesheet" href="styleempresa.css">
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				<?php if($resultado) { ?>
				<h3 id="h3empresamod">REGISTRO MODIFICADO</h3>
				<?php } else { ?>
				<h3 id="h3empresamod">ERROR AL MODIFICAR</h3>
				<?php } ?>
				
				
				
				</div>
			</div>
			<a href="tablaempresas.php" class="btn btn-primary" id="btncontactodelete">Regresar</a>
		</div>
		
		<img src="../imglogin/canaco (2).png" id="imgcontact">
	</body>
</html>