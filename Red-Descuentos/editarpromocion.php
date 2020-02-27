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
    <link rel="stylesheet" href="style.css">
    <title>Promociones</title>
</head>
<body>
<h3 id="h3tabla">Actualizar Promocion</h3>
    <BR>
    <?php
        $id = $_REQUEST['id'];
               
               include("../conexion.php");
               
               
               $sql = "SELECT * FROM descuentos WHERE id = '$id'";
                    $resultado = mysqli_query($conexion,$sql);
                    $row =mysqli_fetch_array($resultado);            
              
               
           ?>
    <form method='POST' action="update.php?id=<?php echo $row['id'];?>" enctype="multipart/form-data">

        <div class="form-row" id="divfecha">
            <div class="row" id="divimagen">
                <div class="form-group">
                    <label for="exampleFormControlFile1" id="labelseleccionimagen">Seleccione Logotipo de la Empresa</label>
                    <input type="file"  value="<?php echo $row['urlimagen'] ?>" class="form-control-file" id="exampleFormControlFile1" name="urlimagen">
                </div>
            </div>
           
            <div class="row" id="divimagen">
                <div class="form-group">
                    <label for="exampleFormControlFile1" id="selectp">Seleccione Imagen de La Promocion</label>
                    <input type="file"  value="<?php echo $row['urlimagenpromo'] ?>" class="form-control-file" id="selectp" name="urlimagenpromo">
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-md-5" id="divlabelcurso">
                    <label id="labelnombrecurso">Nombre de la Empresa</label>
                    <input type="text" class="form-control"  value="<?php echo $row['nombre'] ?>" id="nombrecurso" name="nombre" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5" id="divlabelcurso">
                    <label id="labelsedecurso">Direccion</label>
                    <input type="text" class="form-control"  value="<?php echo $row['direccion'] ?>" id="sedecurso" name="direccion" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5" id="divlabelcurso">
                    <label id="labelhorariocurso">Telefono</label>
                    <input type="text" class="form-control"  value="<?php echo $row['telefono'] ?>" id="horariocurso" name="telefono" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5" id="divlabelcurso">
                    <label id="labelpreciocurso">Horario</label>
                    <input type="text" placeholder="HH:MM-HH:MM"  value="<?php echo $row['horario'] ?>" class="form-control" id="preciocurso" name="horario"
                        required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5" id="divlabelcurso">
                    <label id="labeldescripcioncurso">Pagina de Facebook</label>
                    <input type="text" class="form-control"  value="<?php echo $row['pgfb'] ?>" id="descripcioncurso" name="pgfb" required>
                </div>
            </div>
            
            <br>
            <div id="ae">
                <button type="submit" class="btn btn-success" name="btn" id=""> Actualizar </button>
                <a href="tablapromociones.php" class="btn btn-warning" id="">Regresar</a>
            </div>
        </form>
</body>
</html>