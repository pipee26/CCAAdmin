<?php
session_start();
if ($_SESSION['nivel'] != 1){
  header('Location:../index.php');
}?>
<?PHP
require '../conexion.php';

$json['img']=array();

	if(isset($_POST["btn"])){
		
		
		
		
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $empresa=$_POST['empresa'];
        $correo=$_POST['correo'];
        $curso=$_POST['curso'];
        
        
				
        $sql="INSERT INTO personas(nombre,apellido,empresa,correo,curso,fecha) VALUES ('$nombre','$apellido','$empresa','$correo','$curso', now())";		 
        $ejecutar=mysqli_query($conexion,$sql);
        // $sql="INSERT INTO personas(nombre,apellido,empresa,correo,curso,fecha) VALUES (?,?,?,?,?,?)";
		// $stm=$conexion->prepare($sql);
		
		// $stm->bind_param('sssssd',$nombre,$apellido,$empresa,$correo,$curso,now());
		// $stm->execute();
	
		// 	mysqli_close($conexion);
			
	
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
    <link rel="stylesheet" href="stylecurso.css">
    <title>usuarios</title>
</head>
<body>
<BR><BR>
    <h3 id="h3tabla">Agregar Usuario</h3>
    <BR>
<form method='POST' action="nuevousuario.php" enctype="multipart/form-data">
<div class="row">
            <div class="col-md-5" id="divlabelcurso">
                <label id="labelnombrecurso">Nombre</label>
                <input type="text" class="form-control" id="nombrecurso" name="nombre" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5" id="divlabelcurso">
                <label id="labelsedecurso">Apellido</label>
                <input type="text" class="form-control" id="sedecurso" name="apellido" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5" id="divlabelcurso">
                <label id="labelhorariocurso">E-mail</label>
                <input type="text" class="form-control" id="horariocurso" name="correo" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5" id="divlabelcurso">
                <label id="labelhorariocurso">Empresa Proveniente</label>
                <input type="text" class="form-control" id="horariocurso" name="empresa" required>
            </div>
        </div>
       
        <div class="form-group" id="divselectipo">
				<label for="exampleFormControlSelect1">Seleccione Curso</label>
				<select class="form-control col-md-4" id="selecttipo" name="curso">
				<?php 
				require_once('../conexion.php');
                $consul="SELECT * FROM cursos"; 
                $res=mysqli_query($conexion,$consul);
                while($row=mysqli_fetch_array($res)){
                    ?>
					<option><?php echo $row['nombre']?></option>
					<?php } ?>
				</select>
			</div>
        <br>
        <div id="ae">
            <button type="submit" class="btn btn-success" name="btn" id="btnagregardatos"> Agregar </button>
            <a href="usuariosregistrados.php" class="btn btn-warning" id="btndelete">Regresar</a>
        </div>
</form>
</body>
</html>