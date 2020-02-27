<?php
session_start();
if ($_SESSION['nivel'] != 1){
  header('Location:../index.php');
}?>
<?php
	$id = $_REQUEST['id_cn'];
	require '../conexion.php';

	$ruta="imagenesCarruselNoticias";
	$archivo=$_FILES['urlimagen']['tmp_name'];
	$nombreArchivo=$_FILES['urlimagen']['name'];
	move_uploaded_file($archivo,$ruta."/".$nombreArchivo);
    $ruta=$ruta."/".$nombreArchivo;
    
	$noticia=$_POST['noticia'];
		
	$sql = "UPDATE carruselnoticias SET  urlimagen='$ruta', noticias='$noticia' WHERE id_cn = '$id'";
	$resultado = $conexion->query($sql);
	
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<script src="bootstrap/js/jquery-1.8.3.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../bootstrap/css/bootstrap-theme.css.map"></script>
	<link rel="stylesheet" href="stylenoticias.css">
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
			<a href="galeria.php" class="btn btn-primary" id="btncontactodelete">Regresar</a>
		</div>
		
		<img src="../imglogin/canaco (2).png" id="imgcontact">
	</body>
</html>