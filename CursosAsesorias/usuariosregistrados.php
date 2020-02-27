
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
    <link rel="stylesheet" href="../icon/style.css">
    <link rel="stylesheet" href="../stylebarra.css">
    <title>Usuarios</title>
</head>
<body>

    <BR>
    <h3 id="h3tabla">TABLA DE USUARIOS REGISTRADOS</h3>
    <BR>
    <div id="ae">
    <a href="tablacursos.php" class="btn btn-success" id="btndelete">Regresar</a>
    <a href="nuevousuario.php" class="btn btn-warning" id="btndelete">Resgistrar Usuario</a>
   <form action="../reporte.php" method="post">
   <div class="form-group" id="divselectipo">
				<label for="exampleFormControlSelect1">Seleccione El curso a filtrar</label>
				<select class="form-control col-md-4" id="selecttipo" name="cursoselect">
                <br>
                <?php 
				require_once('../conexion.php');
                $consul="SELECT * FROM cursos"; 
                $res=mysqli_query($conexion,$consul);
                while($row=mysqli_fetch_array($res)){
				?>
					<option><?php echo $row['nombre']?></option>
					<?php } ?>
                </select>
                <br>
                <button type="submit" class="btn btn-warning">Filtar</button>
			</div> 
</form>
</div><BR>
    <table class="table table-success" id="tablacontacto">
        <thead>
            <tr>


                <th scope="col">
                    <center>NOMBRE</center>
                </th>
                <th scope="col">
                    <center>APELLIDO</center>
                </th>
                <th scope="col">
                    <center>EMPRESA</center>
                </th>
                <th scope="col">
                    <center>E-mail</center>
                </th>
                <th scope="col">
                    <center>CURSO</center>
                </th>
                <th scope="col">
                    <center>FECHA</center>
                </th>
                <th scope="col"><center>FUNCION</center></th>
            </tr>
        </thead>
        <tbody>
            <?PHP
                require_once('../conexion.php');
                $consul="SELECT * FROM personas";
                $res=mysqli_query($conexion,$consul);
                while($row=mysqli_fetch_array($res)){
            ?>
            <tr>


                <td>
                    <center>
                        <?PHP echo $row['nombre']?>
                    </center>
                </td>
                <td>
                    <center>
                        <?PHP echo $row['apellido']?>
                    </center>
                </td>
                <td>
                    <center>
                        <?PHP echo $row['empresa']?>
                    </center>
                </td>
                <td>
                    <center>
                        <?PHP echo $row['correo']?>
                    </center>
                </td>
                <td>
                    <center>
                        <?PHP echo $row['curso']?>
                    </center>
                </td>
                <td>
                    <center>
                        <?PHP echo $row['fecha']?>
                    </center>
                </td>
                
                <td>
                    <a href="eliminarcontacto.php?id_contacto=<?php echo $row['id_personas'] ?>" class="button">
                        <center><button type="button" class="btn btn-danger" name="btn"> Eliminar </button></center>
                    </a>
                </td>
            </tr>
            <?PHP } ?>
        </tbody>
    </table>

    
    
</body>
</html>