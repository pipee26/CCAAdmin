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
<BR>
    <h3 id="h3tabla">PROMOCIONES</h3>
    <BR>
    <div id="divbtntablaregresar">
        <a href="subir-promocion.php" class="btn btn-success" id="btndelete">Regresar</a>
    </div>
    <br>
    <table class="table table-success" id="tablaempresas">
        <thead>
            <tr>

                <th scope="col">
                    <center>IMAGEN P.</center>
                </th>
                <th scope="col">
                    <center>LOGOTIPO</center>
                </th>
                <th scope="col">
                    <center>NOMBRE</center>
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
                    <center>PAGINA DE FB</center>
                </th>
                <th scope="col" colspan="2">
                    <center>FUNCIONES</center>
                </th>
            </tr>
        </thead>
        <tbody>
            <?PHP
                require_once('../conexion.php');
                $consul="SELECT * FROM descuentos ORDER BY nombre ASC";
                $res=mysqli_query($conexion,$consul);
                while($row=mysqli_fetch_array($res)){
            ?>
            <tr>

                <td>
                    <center>
                        <img src="<?PHP echo $row['urlimagenpromo']?>" width="80px">
                    </center>
                </td>
                <td>
                    <center>
                        <img src="<?PHP echo $row['urlimagen']?>" width="80px">
                    </center>
                </td>
             
                <td>
                    <center>
                        <?PHP echo $row['nombre']?>
                    </center>
                </td>
                <td>
                    <center>
                        <?PHP echo $row['direccion']?>
                    </center>
                </td>
                <td>
                    <center>
                        <?PHP echo $row['telefono']?>
                    </center>
                </td>
                <td>
                    <center>
                        <?PHP echo $row['horario']?>
                    </center>
                </td>
                <td>
                    <center>
                        <?PHP echo $row['pgfb']?>
                    </center>
                </td>
                <td>
                    <a href="editarpromocion.php?id=<?php echo $row['id'] ?>" class="button">
                        <center><button type="button" class="btn btn-primary" name="btn"> Editar </button></center>
                    </a>
                </td>
                <td>
                    <a href="eliminarpromocion.php?id=<?php echo $row['id'] ?>" class="button">
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