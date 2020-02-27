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
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/css/bootstrap-theme.css.map"></script>
    <link rel="stylesheet" href="stylenoticias.css">
    <title>Noticias</title>
</head>

<body>
    <BR>
    <h3 id="h3tabla">ACTUALIZAR NOTICIA</h3>
    <BR>
    <?php
        $id = $_REQUEST['id_noticias'];

               
               include("../conexion.php");
               
               
               $sql = "SELECT * FROM noticias WHERE id_noticias = '$id'";
                    $resultado = mysqli_query($conexion,$sql);
                    $row =mysqli_fetch_array($resultado);            
                    
           ?>
    <form method='POST' action="update.php?id_noticias=<?php echo $row['id_noticias']?>" enctype="multipart/form-data">
        <div class="row" id="divimagen">
            <div class="form-group">
                <label for="exampleFormControlFile1" id="labelseleccionimagen">Seleccione Logotipo de la Empresa</label>
                <input type="file"  class="form-control-file" id="exampleFormControlFile1"
                    name="urlimagen">
            </div>
        </div>
        <div class="row">
            <div class="col-md-5" id="divlabelcurso">
                <label id="labelnombrecurso">Encabezado</label>
                <input type="text" value="<?php echo $row['encabezado']; ?>" class="form-control" id="nombrecurso" name="encabezado"
                    required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-5" id="divlabelcurso">
                <label for="exampleFormControlTextarea1">Descripcion de Noticia</label>
                <textarea class="form-control" value="<?php echo $row['descripcion']; ?>" id="" rows="5" name="descripcion"></textarea>
            </div>
        </div>
        <div id="ae">
            <button type="submit" class="btn btn-success" name="btn" id=""> Agregar </button>
            <a href="tablanoticias.php" class="btn btn-warning" id="">Regresar</a>
        </div>
    </form>
    <?php echo $arreglo;?>
</body>

</html>