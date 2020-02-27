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
    <link rel="stylesheet" href="styleempresa.css">
    <title>Editar Empresa</title>
</head>
<body>
<h3 id="h3tabla">Actualizar Empresa</h3>
    <BR>
<?php
        $id = $_REQUEST['id'];
               
               include("../conexion.php");
               
               
               $sql = "SELECT * FROM empresas WHERE id = '$id'";
                    $resultado = mysqli_query($conexion,$sql);
                    $row =mysqli_fetch_array($resultado);            
              
               
           ?>
<form method='POST' action="update.php?id=<?php echo $row['id'];?>" enctype="multipart/form-data">
        <div class="row" id="divimagen">
            <div class="form-group">
                <label for="exampleFormControlFile1" id="labelseleccionimagen">Seleccione Logotipo de la Empresa</label>
                <input type="file" class="form-control-file"   id="exampleFormControlFile1" name="urlimagen">
            </div>
        </div>
        <div class="form-group " id="divselectipo">
                <label for="exampleFormControlSelect1">Seleccione Tipo</label>
                <select class="form-control col-md-5" value="<?php echo $row['tipo'] ?>" id="selecttipo" name="tipo">
                  <option>Boutiques</option>
                  <option>Electronica</option>
                  <option>Farmacias</option>
                  <option>Ferreterias</option>
                  <option>Hoteles</option>
                  <option>Panaderias</option>
                  <option>Papelerias</option>
                  <option>Restaurantes</option>
                  <option>Tortillerias</option>
                  <option>Zapaterias</option>
                  <option>Otros</option>
                </select>
              </div>
        <div class="row">
            <div class="col-md-5" id="divlabelcurso">
                <label id="labelnombrecurso">Nombre de la Empresa</label>
                <input type="text" value="<?php echo $row['nombre'] ?>" class="form-control" id="nombrecurso" name="nombre" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5" id="divlabelcurso">
                <label id="labelsedecurso">Direccion</label>
                <input type="text" class="form-control" value="<?php echo $row['direccion'] ?>" id="sedecurso" name="direccion" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5" id="divlabelcurso">
                <label id="labelhorariocurso">Telefono</label>
                <input type="text" value="<?php echo $row['telefono'] ?>" class="form-control" id="horariocurso" name="telefono" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5" id="divlabelcurso">
                <label id="labelpreciocurso">Horario</label>
                <input type="text" placeholder="HH:MM-HH:MM" value="<?php echo $row['horario'] ?>" class="form-control" id="preciocurso" name="horario"
                    required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5" id="divlabelcurso">
                <label id="labeldescripcioncurso">Pagina de Facebook</label>
                <input type="text" class="form-control" value="<?php echo $row['pgfb'] ?>" id="descripcioncurso" name="pgfb" required>
            </div>
        </div>
        
        <br>
        <div id="ae">
            <button type="submit" class="btn btn-success" name="btn" id="btnagregardatos"> Aceptar </button>
            <a href="tablaempresas.php" class="btn btn-warning" id="">Regresar</a>
        </div>



    </form>
</body>
</html>