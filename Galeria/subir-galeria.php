<?php
session_start();
if ($_SESSION['nivel'] != 1){
  header('Location:../index.php');
}?>
<?PHP
require '../conexion.php';

$json['img']=array();

	if(isset($_POST["btn"])){
		
		
		
		$ruta="image";
		$archivo=$_FILES['rutaimg']['tmp_name'];
		$nombreArchivo=$_FILES['rutaimg']['name'];
		move_uploaded_file($archivo,$ruta."/".$nombreArchivo);
		$ruta=$ruta."/".$nombreArchivo;
        $mesimg=$_POST['mesimg'];
	   
		
		$sql="INSERT INTO galeria(mes,rutaimg) VALUES ('$mesimg','$ruta')";
		$stm=$conexion->prepare($sql);
		
		//$stm->bind_param('ss',$mesimg,$ruta);
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
	<script src="../bootstrap/css/bootstrap-theme.css.map"></script>
	<link rel="stylesheet" href="stylegaleria.css">
	<title>Subir Imagenes de Galeria</title>
</head>

<body>
<BR>
    <h3 id="h3tabla">SUBIR GALERIA</h3>
    <BR>
	<form method='POST' action="subir-galeria.php" enctype="multipart/form-data">

		<div class="row" id="divimagen">
			<div class="form-group">
				<label for="exampleFormControlFile1" id="labelseleccionimagen">Seleccione Imagen Correspondiente al Mes</label>
				<input type="file" class="form-control-file" id="exampleFormControlFile1" name="rutaimg">
			</div>
		</div>
		
			<div class="form-group" id="divselectipo">
				<label for="exampleFormControlSelect1">Seleccione El Mes Correspondiente a la Galeria</label>
				<select class="form-control col-md-4" id="selecttipo" name="mesimg">
				<?php 
				require_once('../conexion.php');
                $consul="SELECT * FROM meses"; 
                $res=mysqli_query($conexion,$consul);
                while($row=mysqli_fetch_array($res)){
				?>
					<option><?php echo $row['nombre']?></option>
					<?php } ?>
				</select>
			</div>
			
		
		<div id="divbtnsubgaleria">
			<button type="submit" class="btn btn-success" name="btn" id="btnagregardatos"> Agregar </button>
			
			<a href="subir-meses.php" class="btn btn-warning" id="btnregresar">Regresar</a>
			
		</div>
	</form>
	<BR>
    <h3 id="h3tabla">Lista Galeria</h3>
    <BR>
   
    <br>
    <table class="table table-success" id="tablaempresas">
        <thead>
            <tr>

                <th scope="col">
                    <center>IMAGEN</center>
                </th>
                <th scope="col">
                    <center>MES CORRESPONDIENTE</center>
                </th>
                <th scope="col" >
                    <center>FUNCIONES</center>
                </th>
            </tr>
        </thead>
        <tbody>
            <?PHP
                require_once('../conexion.php');
                $consul="SELECT * FROM galeria";
                $res=mysqli_query($conexion,$consul);
                while($row=mysqli_fetch_array($res)){
            ?>
            <tr>

                <td>
                    <center>
                        <img src="<?PHP echo $row['rutaimg']?>" width="80px">
                    </center>
                </td>
                <td>
                    <center>
                        <?PHP echo $row['mes']?>
                    </center>
                </td>
                
                <td>
                    <a href="eliminargaleria.php?id_galeria=<?php echo $row['id_galeria'] ?>" class="button">
                        <center><button type="button" class="btn btn-danger" name="btn"> Eliminar </button></center>
                    </a>

                    </a>
                </td>
            </tr>
            <?PHP } ?>
        </tbody>
    </table>
</body>

</html>