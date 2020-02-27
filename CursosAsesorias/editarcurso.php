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
    <link rel="stylesheet" href="stylecurso.css">
    <title>Editar curso</title>
</head>

<body>

    <h3 id="h3tabla">Actualizar Curso</h3>
    <BR>
    <?php
        $id = $_REQUEST['id_cursos'];
               
               include("../conexion.php");
               
               
               $sql = "SELECT * FROM cursos WHERE id_cursos = '$id'";
                    $resultado = mysqli_query($conexion,$sql);
                    $row =mysqli_fetch_array($resultado);            
              
               
           ?>

    <form method='POST' action="update.php?id_cursos=<?php echo $row['id_cursos'];?>" enctype="multipart/form-data">
        <div class="form-row" id="divfecha">
            <div class="form-group col-md-2" id="">
                <label id="labeldiacurso">Ingrese Dia</label>
                <input type="text" value="<?php echo $row['dia'] ?>" class="form-control " id="diacurso" name="dia" required>
            </div>
            <div class="form-group col-md-2" id="">
                <label id="labelmescueso">Ingrese Mes</label>
                <input type="text" value="<?php echo $row['mes'] ?>" placeholder="Ej: ENE-FEB..." class="form-control " id="mescurso" name="mes" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5" id="divlabelcurso">
                <label id="labelnombrecurso">Nombre del Curso</label>
                <input type="text" value="<?php echo $row['nombre'] ?>" class="form-control" id="nombrecurso" name="nombre" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5" id="divlabelcurso">
                <label id="labelsedecurso">Sede</label>
                <input type="text" value="<?php echo $row['sede'] ?>" class="form-control" id="sedecurso" name="sede" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5" id="divlabelcurso">
                <label id="labelhorariocurso">Horario</label>
                <input type="text" value="<?php echo $row['horario'] ?>" class="form-control" id="horariocurso" name="horario" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5" id="divlabelcurso">
                <label id="labelpreciocurso">Precio</label>
                <input type="text" value="<?php echo $row['precio'] ?>" placeholder="Gratuito/$ 00.00" class="form-control" id="preciocurso" name="precio"
                    required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5" id="divlabelcurso">
                <label id="labeldescripcioncurso">Descripcion</label>
                <input type="text" value="<?php echo $row['descripcion'] ?>" class="form-control" id="descripcioncurso" name="descripcion" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5" id="divlabelcurso">
                <label id="labellugarescurso">Lugares Disponibles</label>
                <input type="text" value="<?php echo $row['cupo'] ?>" class="form-control" id="cupocurso" name="cupo" required>
            </div>
        </div>
        <br>
        <div id="ae">
            <button type="submit" class="btn btn-success" name="btn" id="btnagregardatos"> Aceptar </button>
            <a href="tablacursos.php" class="btn btn-danger" id="btncancel">Cancelar</a>
            
        </div>
    </form>

</body>

</html>