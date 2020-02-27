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
    <title>Noticias</title>
</head>
<body>
<BR>
    <h3 id="h3tabla">NOTICIAS</h3>
    <BR>
    <div id="divimagen">
    <a href="subir-noticia.php" class="btn btn-success" id="btndelete">Regresar</a>
    <!-- <a href="subir-imagenes-carrusel-noticias.php" class="btn btn-warning" id="btndelete">Ir al Carrusel</a> -->
    </div>
    <br>
    <table class="table table-success" id="tablaempresas">
        <thead>
            <tr>

                <th scope="col">
                    <center>IMAGEN</center>
                </th>
                <th scope="col">
                    <center>ENCABEZADO</center>
                </th>
                <th scope="col">
                    <center>DESCRIPCION</center>
                </th>
                
                <th scope="col" colspan="2"><center>FUNCIONES</center></th>
            </tr>
        </thead>
        <tbody>
            <?PHP
                require_once('../conexion.php');
                $consul="SELECT * FROM noticias";
                $res=mysqli_query($conexion,$consul);
                while($row=mysqli_fetch_array($res)){
            ?>
            <tr>

                <td>
                    <center>
                        <img src="<?PHP echo $row['urlimagen']?>" width="80">
                    </center>
                </td>
                <td>
                    <center>
                        <?PHP echo $row['encabezado']?>
                    </center>
                </td>
                <td>
                    <center>
                        <?PHP echo $row['descripcion']?>
                    </center>
                </td>
                
                <td>
                    <a href="editarnoticia.php?id_noticias=<?php echo $row['id_noticias'] ?>" class="button">
                        <center><button type="button" class="btn btn-primary" name="btn"> Editar </button></center>
                    </a>
                </td>
                <td>
                    <a href="eliminarnoticia.php?id_noticias=<?php echo $row['id_noticias'] ?>" class="button">
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