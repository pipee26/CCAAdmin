<?php
session_start();
if ($_SESSION['nivel'] != 1){
  header('Location:../index.php');
}?>
<?PHP
require '../conexion.php';

$json['img']=array();

	if(isset($_POST["btn"])){
		
		
		
		
        $dia=$_POST['dia'];
        $mes=$_POST['mes'];
        $nombre=$_POST['nombre'];
		$sede=$_POST['sede'];
		$horario=$_POST['horario'];
        $precio=$_POST['precio'];
        $descripcion=$_POST['descripcion'];
        $cupo=$_POST['cupo'];		
				
		$sql="INSERT INTO cursos(dia,mes,nombre,sede,horario,precio,descripcion,cupo) VALUES (?,?,?,?,?,?,?,?)";
		$stm=$conexion->prepare($sql);
		
		$stm->bind_param('ssssssss',$dia,$mes,$nombre,$sede,$horario,$precio,$descripcion,$cupo);
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
    <link rel="stylesheet" href="../Carruselinicial/stylebarra.css">
    <link rel="stylesheet" href="../icon/style.css">
    <link rel="stylesheet" href="stylecurso.css">
    <title>cursos</title>
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
                <form method='POST' action="subir-curso.php" enctype="multipart/form-data">
                    <div class="form-row" id="divfecha">
                        <div class="form-group col-md-2" id="">
                            <label id="labeldiacurso">Ingrese Dia</label>
                            <input type="text" class="form-control " id="diacurso" name="dia" required>
                        </div>
                        <div class="form-group col-md-2" id="">
                            <label id="labelmescueso">Ingrese Mes</label>
                            <input type="text" placeholder="Ej: ENE-FEB..." class="form-control " id="mescurso" name="mes" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5" id="divlabelcurso">
                            <label id="labelnombrecurso">Nombre del Curso</label>
                            <input type="text" class="form-control" id="nombrecurso" name="nombre" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5" id="divlabelcurso">
                            <label id="labelsedecurso">Sede</label>
                            <input type="text" class="form-control" id="sedecurso" name="sede" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5" id="divlabelcurso">
                            <label id="labelhorariocurso">Horario</label>
                            <input type="text" class="form-control" id="horariocurso" name="horario" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5" id="divlabelcurso">
                            <label id="labelpreciocurso">Precio</label>
                            <input type="text" placeholder="Gratuito/$ 00.00" class="form-control" id="preciocurso" name="precio"
                                required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5" id="divlabelcurso">
                            <label id="labeldescripcioncurso">Descripcion</label>
                            <input type="text" class="form-control" id="descripcioncurso" name="descripcion" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5" id="divlabelcurso">
                            <label id="labellugarescurso">Lugares Disponibles</label>
                            <input type="text" class="form-control" id="cupocurso" name="cupo" required>
                        </div>
                    </div>
                    <br>
                    <div id="ae">
                        <button type="submit" class="btn btn-success" name="btn" id="btnagregardatos"> Agregar </button>
                        <a href="tablacursos.php" class="btn btn-warning" id="btndelete">Ver Cursos</a>
                    </div>
                </form>
        </div>
    </main>
</body>

</html>