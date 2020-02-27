<?php
session_start();
if ($_SESSION['nivel'] != 1){
  header('Location:../index.php');
}?>
<?php
	
	require '../conexion.php';

	
	$id = $_REQUEST['id'];
	
	
	$sql = "DELETE FROM carruselinicio WHERE id = '$id'";
	$resultado = $conexion->query($sql);
	
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<script src="bootstrap/js/jquery-1.8.3.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../bootstrap/css/bootstrap-theme.css.map"></script>
	<link rel="stylesheet" href="../style.css">
	</head>
	
	<body>
		<div class="container" >
			<div class="row">
				<div class="row" style="text-align:center">
				<?php if($resultado) { ?>
				<h3 id="diveliminar">REGISTRO ELIMINADO</h3>
				<?php } else { ?>
				<h3>ERROR AL ELIMINAR</h3>
				<?php } ?>
				
				
				
				</div>
			</div>
		</div>
		<a href="subirimg.php" class="btn btn-primary" id="btnbackeliminar">Regresar</a>
	</body>
</html>