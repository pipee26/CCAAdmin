<?php
session_start();
if ($_SESSION['nivel'] != 1){
  header('Location:../index.php');
}?>
<?PHP
require '../conexion.php';

$json['img']=array();

	if(isset($_POST["btn"])){
		
		
		
		$ruta="imagenes";
		$archivo=$_FILES['urlimagen']['tmp_name'];
		$nombreArchivo=$_FILES['urlimagen']['name'];
		move_uploaded_file($archivo,$ruta."/".$nombreArchivo);
		$ruta=$ruta."/".$nombreArchivo;
		
				
		$sql="INSERT INTO carruselInicio(urlInicio) VALUES ('$ruta')";
		

		 $stm=$conexion->prepare($sql);
		
		//  $stm->bind_param('s',$ruta);
		 $stm->execute();
		
		// mysqli_close($conexion);
			
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
	 crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
	 crossorigin="anonymous"></script>
	<link rel="stylesheet" href="stylebarra.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	 crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
	 crossorigin="anonymous"></script>
	 <link rel="stylesheet" href="../style.css">
	<link rel="stylesheet" href="../icon/style.css">
	<title>Carrusel</title>
</head>

<body>
	<main>
		<div class="content-menu">
			<li>
				<a href="../iniciocca.php" id="a1">
					<span class="lnr lnr-home icon1"></span>
					<h6 class="text1">Inicio</h6>
				</a>
			</li>
			<li>
				<a href="../perfil/perfil.php" id="a2"><span class="lnr lnr-user icon2"></span>
					<h6 class="text3">Perfil</h6>
				</a>
			</li>
			<li>
				<a href="../Carruselinicial/subirimg.php" id="a3">
					<span class="lnr lnr-briefcase icon3"></span>
					<h6 class="text3">Carrusel inicial</h6>
				</a>
			</li>
			<li>
				<a href="../Directorioempresarial/subir-empresa.php" id="a4">
					<span class="lnr lnr-apartment icon4"></span>
					<h6 class="text4">Directorio empresarial</h6>
				</a>
			</li>
			<li>
				<a href="../Red-Descuentos/subir-promocion.php" id="a5">
					<span class="lnr lnr-arrow-down icon5"></span>
					<h6 class="text4">Red y descuentos</h6>
				</a>
			</li>
			<li>
				<a href="../CursosAsesorias/subir-curso.php" id="a6">
					<span class="lnr lnr-book icon6"></span>
					<h6 class="text6">Cursos y asesorias</h6>
				</a>
			</li>
			<li>
				<a href="../Noticias/subir-noticia.php" id="a7">
					<span class="lnr  lnr-bookmark icon7"></span>
					<h6 class="text7">Noticias</h6>
				</a>
			</li>
			<li>
				<a href="../Galeria/subir-meses.php" id="a8">
					<span class="lnr lnr-picture icon8"></span>
					<h6 class="text8">Galeria</h6>
				</a>
			</li>
			<li>
				<a href="../Contacto/subir-datos-cca.php" id="a9">
					<span class="lnr  lnr-phone-handset icon9"></span>
					<h6 class="text9">Contacto</h6>
				</a>
			</li>
		</div>

		<div class="container">
			<form method='POST' action="subirimg.php" enctype="multipart/form-data">

				<div class="input-group col-sm-3 mb-3" id="inputimg">

					<div class="form-group">
						<label for="exampleFormControlFile1" id="labelseleccionimagen">Seleccione Imagen de Carrusel</label>
						<input type="file" class="form-control-file" id="exampleFormControlFile1" name="urlimagen">
					</div>
				</div>



				<br /><br />

				<div id="btnsubirimgcarrusel">
					<button type="submit" class="btn btn-success" name="btn"> Agregar </button>
				</div>
			</form>
			<br /><br />
			<div>
				<table class="table table-bordered col-sm-6" id="tablacarrusel">
					<thead>
						<tr>

							<th scope="col">
								<center>IMAGEN</center>
							</th>
							<th scope="col">
								<center>FUNCION</center>
							</th>

						</tr>
					</thead>
					<tbody>
						<?PHP
		require_once('../conexion.php');
		$consul="SELECT * FROM carruselInicio";
		$res=mysqli_query($conexion,$consul);
		while($row=mysqli_fetch_array($res)){
	?>
						<tr>

							<td>
								<center>
									<img src="<?PHP echo $row['urlInicio']?>" width="80PX">
								</center>
							</td>

							<td>
								<a href="eliminar_carrusel.php?id=<?php echo $row['id'] ?>" class="button">
									<center><button type="button" class="btn btn-danger" name="btn"> Eliminar </button></center>
								</a>

								</a>
							</td>
						</tr>
						<?PHP } ?>
					</tbody>
				</table>
			</div>
		</div>
	</main>
</body>

</html>