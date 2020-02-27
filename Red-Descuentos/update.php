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
        
        $ruta2="imagenespromo";
        $archivo2=$_FILES['urlimagenpromo']['tmp_name'];
		$nombreArchivo2=$_FILES['urlimagenpromo']['name'];
        move_uploaded_file($archivo2,$ruta2."/".$nombreArchivo2);

        $ruta=$ruta."/".$nombreArchivo;
        $ruta2=$ruta2."/".$nombreArchivo2;
		
        $nombre=$_POST['nombre'];
		$direccion=$_POST['direccion'];
		$telefono=$_POST['telefono'];
		$horario=$_POST['horario'];
		$pgfb=$_POST['pgfb'];
    
	
	
	
	$sql = "UPDATE descuentos SET nombre='$nombre', direccion='$direccion',
     telefono='$telefono', horario='$horario', pgfb='$pgfb', urlimagen='$ruta', urlimagenpromo='$ruta2' WHERE id = '$id'";
	$resultado = $conexion->query($sql);
	
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<script src="bootstrap/js/jquery-1.8.3.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../bootstrap/css/bootstrap-theme.css.map"></script>
	<link rel="stylesheet" href="style.css">
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
			<a href="tablapromociones.php" class="btn btn-primary" id="btncontactodelete">Regresar</a>
		</div>
		
		<img src="../imglogin/canaco (2).png" id="imgcontact">
	</body>
</html>