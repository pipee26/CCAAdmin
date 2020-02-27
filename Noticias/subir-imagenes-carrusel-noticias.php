<?php
session_start();
if ($_SESSION['nivel'] != 1){
  header('Location:../index.php');
}?>
<?PHP
require '../conexion.php';

$json['img']=array();

	if(isset($_POST["btn"])){
		
		
		
		$ruta="imagenesCarruselNoticias";
		$archivo=$_FILES['urlimagen']['tmp_name'];
		$nombreArchivo=$_FILES['urlimagen']['name'];
		move_uploaded_file($archivo,$ruta."/".$nombreArchivo);
		$ruta=$ruta."/".$nombreArchivo;
        $noticia=$_POST['noticia'];
	   
		
		$sql="INSERT INTO carruselnoticias(urlimagen,noticias) VALUES (?,?)";
		$stm=$conexion->prepare($sql);
		
		$stm->bind_param('ss',$ruta,$noticia);
		$stm->execute();
		mysqli_close($conexion);
		
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/css/bootstrap-theme.css.map"></script>
    <link rel="stylesheet" href="stylenoticias.css">
    <title>Document</title>
</head>
<body>
<br/>
<h3 id="h3tabla">SUBIR GALERIA</h3>
<br/>
    <form method='POST' action="subir-imagenes-carrusel-noticias.php" enctype="multipart/form-data">
		
    <div class="row" id="divimagen">
			<div class="form-group">
				<label for="exampleFormControlFile1" id="labelseleccionimagen">Seleccione Imagenes</label>
				<input type="file" class="form-control-file" id="exampleFormControlFile1" name="urlimagen">
			</div>
		</div>
        <br/>
        <div class="form-group" id="divselectipo">
				<label for="exampleFormControlSelect1">Seleccione El Encabezado De La Noticia</label>
				<select class="form-control col-md-4" id="selecttipo" name="noticia">
				<?php 
				require_once('../conexion.php');
                $consul="SELECT * FROM noticias"; 
                $res=mysqli_query($conexion,$consul);
                while($row=mysqli_fetch_array($res)){?>
					<option><?php echo $row['encabezado']?></option>
					<?php } ?>
				</select>
			</div>
            <div id="ae">
			<button type="submit" class="btn btn-success" name="btn" id="btnagregardatos"> Agregar </button>
			
			<a href="subir-noticia.php" class="btn btn-warning" id="btnregresar">Regresar</a>
			<a href="galeria.php" class="btn btn-secondary" id="btnregresar">ver galeria</a>
		</div>
    
    </form>
</body>
</html>