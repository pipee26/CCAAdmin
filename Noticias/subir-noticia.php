<?php
session_start();
if ($_SESSION['nivel'] != 1){
  header('Location:../index.php');
}?>
<?PHP
require '../conexion.php';

$json['img']=array();

	if(isset($_POST["btn"])){
		
		
		
		$ruta="imagenesNoticias";
		$archivo=$_FILES['urlimagen']['tmp_name'];
		$nombreArchivo=$_FILES['urlimagen']['name'];
		move_uploaded_file($archivo,$ruta."/".$nombreArchivo);
		$ruta=$ruta."/".$nombreArchivo;
		
		$encabezado=$_POST['encabezado'];
		$descripcion=$_POST['descripcion'];

		$sql="INSERT INTO noticias(encabezado,urlimagen,descripcion) VALUES (?,?,?)";
		$stm=$conexion->prepare($sql);
		
		$stm->bind_param('sss',$encabezado,$ruta,$descripcion);
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
    <link rel="stylesheet" href="../icon/style.css">
    <link rel="stylesheet" href="../Carruselinicial/stylebarra.css">
    <title>Document</title>
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
                <BR>
                    <h3 id="h3tabla">NUEVA NOTICIA</h3>
                    <BR>
                        <form method='POST' action="subir-noticia.php" enctype="multipart/form-data">
                        <div class="row" id="divimagen">
                            <div class="form-group">
                                <label for="exampleFormControlFile1" id="labelseleccionimagen">Seleccione Logotipo de la Empresa</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="urlimagen">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5" id="divlabelcurso">
                                <label id="labelnombrecurso">Encabezado</label>
                                <input type="text" class="form-control" id="nombrecurso" name="encabezado" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-5" id="divlabelcurso">
                                <label for="exampleFormControlTextarea1">Descripcion de Noticia</label>
                                <textarea class="form-control" id="desc" rows="5" name="descripcion"></textarea>
                            </div>
                        </div>
                        <div id="ae">
                            <button type="submit" class="btn btn-success" name="btn" id=""> Agregar </button>
                            <a href="tablanoticias.php" class="btn btn-warning" id="">Ver Noticia</a>
                            <a href="subir-imagenes-carrusel-noticias.php" class="btn btn-secondary" id="">Agregar Galeria</a>
                        </div>
                 </form>   
        </div>
    </main> 
    </body>
</html>