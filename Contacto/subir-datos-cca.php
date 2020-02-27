<?php
session_start();
if ($_SESSION['nivel'] != 1){
  header('Location:../index.php');
}?>
<?PHP
require '../conexion.php';

$json['img']=array();

	if(isset($_POST["btn"])){
		
		
		
		$ruta="imagencca";
		$archivo=$_FILES['urlimagen']['tmp_name'];
		
		$nombreArchivo=$_FILES['urlimagen']['name'];
		
		move_uploaded_file($archivo,$ruta."/".$nombreArchivo);
		$ruta=$ruta."/".$nombreArchivo;
		
        $nombre=$_POST['nombre'];
		$direccion=$_POST['direccion'];
		$telefono=$_POST['telefono'];
		$horario=$_POST['horario'];
        $pgfb=$_POST['pgfb'];	
       
				
		$sql="INSERT INTO contacto(urlimagen,nombrec,direccionc,telefonoc,horarioc,pgfbc) VALUES ('$ruta','$nombre','$direccion','$telefono','$horario','$pgfb')";
		$stm=$conexion->prepare($sql);
		
		//$stm->bind_param('sssssss',$ruta,$nombre,$direccion,$telefono,$horario,$pgfb,$name);
		$stm->execute();
		
        //mysqli_close($conexion);
			
		
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
    <link rel="stylesheet" href="stylecontacto.css">
    <link rel="stylesheet" href="../icon/style.css">
    <link rel="stylesheet" href="../Carruselinicial/stylebarra.css">
    <title>cca</title>
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
        <table class="table table-bordered col-md-6" id="tablacontacto">
                <thead>
                    <tr>


                        <th scope="col">
                            <center>IMAGEN</center>
                        </th>
                        <th scope="col">
                            <center>INSTITUCION</center>
                        </th>
                        <th scope="col">
                            <center>DIRECCION</center>
                        </th>
                        <th scope="col">
                            <center>TELEFONO</center>
                        </th>
                        <th scope="col">
                            <center>HORARIO</center>
                        </th>
                        <th scope="col">
                            <center>PAGINA FB</center>
                        </th>
                        <th scope="col" colspan="2">FUNCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP
        require_once('../conexion.php');
        $consul="SELECT * FROM contacto";
        $res=mysqli_query($conexion,$consul);
        while($row=mysqli_fetch_array($res)){
    ?>
                    <tr>


                        <td>
                            <center>
                                <img src="<?PHP echo $row['urlimagen']?>" width="60px">
                            </center>
                        </td>
                        <td>
                            <center>
                                <?PHP echo $row['nombrec']?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?PHP echo $row['direccionc']?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?PHP echo $row['telefonoc']?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?PHP echo $row['horarioc']?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?PHP echo $row['pgfbc']?>
                            </center>
                        </td>
                        <td>
                            <a href="editarcontacto.php?id_contacto=<?php echo $row['id_contacto'] ?>" class="button">
                                <center><button type="button" class="btn btn-primary" name="btn"> Editar </button></center>
                            </a>
                        </td>
                        <td>
                            <a href="eliminarcontacto.php?id_contacto=<?php echo $row['id_contacto'] ?>" class="button">
                                <center><button type="button" class="btn btn-danger" name="btn"> Eliminar </button></center>
                            </a>

                            </a>
                        </td>
                    </tr>
                    <?PHP } ?>
                </tbody>
            </table>

            <form method='POST' action="subir-datos-cca.php" enctype="multipart/form-data">

                <div class="input-group col-sm-6 mb-3" id="inputimg">

                    <div class="form-group">
                        <label for="exampleFormControlFile1" id="labelseleccionimagen">Seleccione Imagen</label>
                        <input type="file" class="form-control-file" id="urlimagen" name="urlimagen">
                    </div>
                </div>
                <div class="form-row" id="aabb">
                    <div class="col-sm-6" id="divlabelnombrecarrusel">
                        <label id="labelnombrecontacto">Nombre de Imagen</label>
                        <input type="text" class="form-control col-md-6" id="urlimagen" name="nombreimagen" required>
                    </div>
                    <div class="col-sm-6" id="divlabelnombrecarrusel">
                        <label id="labelnombrecontacto">Nombre De La Institucion</label>
                        <input type="text" class="form-control col-md-6" id="urlimagen" name="nombre" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6" id="divlabelnombrecarrusel">
                        <label id="labelnombrecontacto">Direccion</label>
                        <input type="text" class="form-control col-md-6" id="urlimagen" name="direccion" required>
                    </div>
                    <div class="col-sm-6" id="divlabelnombrecarrusel">
                        <label id="labelnombrecontacto">Telefono</label>
                        <input type="text" class="form-control col-md-6" id="urlimagen" name="telefono" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6" id="divlabelnombrecarrusel">
                        <label id="labelnombrecontacto">Horario De Atencion</label>
                        <input placeholder="HH:MM:HH:MM" type="text" class="form-control col-md-6" id="urlimagen" name="horario"
                            required>
                    </div>
                    <div class="col-sm-6" id="divlabelnombrecarrusel">
                        <label id="labelnombrecontacto">Pagina de Facebook</label>
                        <input type="text" class="form-control col-md-6" id="urlimagen" name="pgfb" required>
                    </div>    
                </div>
                <br /><br />

                <div id="btnagregardatos">
                    <button type="submit" class="btn btn-success" name="btn" id=""> Agregar </button>
                </div>


            </form>
        </div>
    </main>
</body>

</html>