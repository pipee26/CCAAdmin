<?php
session_start();
if ($_SESSION['nivel'] != 1){
  header('Location:../index.php');
}?>
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
<h3 id="h3tabla">EDITAR GALERIA</h3>
<br/>
<?php
        $id = $_REQUEST['id_cn'];

               
               include("../conexion.php");
               
               
               $sql = "SELECT * FROM carruselnoticias WHERE id_cn = '$id'";
                    $resultado = mysqli_query($conexion,$sql);
                    $row =mysqli_fetch_array($resultado);            
                    
           ?>
    <form method='POST' action="updatenoticia.php?id_cn=<?php echo $row['id_cn']?>" enctype="multipart/form-data">
		
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
			<button type="submit" class="btn btn-success" name="btn" id="btnagregardatos"> Editar </button>
			
			<a href="galeria.php" class="btn btn-warning" id="btnregresar">Regresar</a>
		</div>
    
    </form>
</body>
</html>