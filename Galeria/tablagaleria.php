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
    <link rel="stylesheet" href="stylegaleria.css">
    <title>Galeria</title>
</head>
<body>
<BR><BR>
    <h3 id="h3tabla">TABLA DE CURSOS DISPONIBLES</h3>
    <BR>
    <div id="ae">
    <a href="subir-galeria.php" class="btn btn-success" id="btndelete">Regresar</a>
    
    </div>
    <BR>
    <table class="table table-success" id="tablagaleria">
        <thead>
            <tr>


                <th scope="col">
                    <center>MES</center>
                </th>
                <th scope="col">
                    <center>IMAGEN</center>
                </th>
                
                <th scope="col" colspan="2">FUNCIONES</th>
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
                        <?PHP echo $row['mes']?>
                    </center>
                </td>
                <td>
                    <center>
                        <img src="<?PHP echo $row['rutaimg']?>" width="60px">
                    </center>
                </td>
               
                <td>
                    <a href="editarcurso.php?id_cursos=<?php echo $row['id_cursos'] ?>" class="button">
                        <center><button type="button" class="btn btn-primary" name="btn"> Editar </button></center>
                    </a>
                </td>
                <td>
                    <a href="eliminarcurso.php?id_cursos=<?php echo $row['id_cursos'] ?>" class="button">
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