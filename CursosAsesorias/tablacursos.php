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
    <link rel="stylesheet" href="stylecurso.css">
    <title>Cursos</title>
</head>
<body>
    <BR><BR>
    <h3 id="h3tabla">TABLA DE CURSOS DISPONIBLES</h3>
    <BR>
    <div id="ae">
    <a href="subir-curso.php" class="btn btn-success" id="btndelete">Regresar</a>
    <a href="usuariosregistrados.php" class="btn btn-warning" id="btndelete">Usuarios registrados</a>
    </div>
    <BR>
    <table class="table table-success" id="tablacontacto">
        <thead>
            <tr>


                <th scope="col">
                    <center>DIA</center>
                </th>
                <th scope="col">
                    <center>MES</center>
                </th>
                <th scope="col">
                    <center>NOMBRE</center>
                </th>
                <th scope="col">
                    <center>SEDE</center>
                </th>
                <th scope="col">
                    <center>HORARIO</center>
                </th>
                <th scope="col">
                    <center>PRECIO</center>
                </th>
                <th scope="col">
                    <center>DESCRIPCION</center>
                </th>
                <th scope="col">
                    <center>DISP.</center>
                </th>
                <th scope="col" colspan="2">FUNCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?PHP
                require_once('../conexion.php');
                $consul="SELECT * FROM cursos";
                $res=mysqli_query($conexion,$consul);
                while($row=mysqli_fetch_array($res)){
            ?>
            <tr>


                <td>
                    <center>
                        <?PHP echo $row['dia']?>
                    </center>
                </td>
                <td>
                    <center>
                        <?PHP echo $row['mes']?>
                    </center>
                </td>
                <td>
                    <center>
                        <?PHP echo $row['nombre']?>
                    </center>
                </td>
                <td>
                    <center>
                        <?PHP echo $row['sede']?>
                    </center>
                </td>
                <td>
                    <center>
                        <?PHP echo $row['horario']?>
                    </center>
                </td>
                <td>
                    <center>
                        <?PHP echo $row['precio']?>
                    </center>
                </td>
                <td>
                    <center>
                        <?PHP echo $row['descripcion']?>
                    </center>
                </td>
                <td>
                    <center>
                        <?PHP echo $row['cupo']?>
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