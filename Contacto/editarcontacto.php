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
    <link rel="stylesheet" href="stylecontacto.css">
    <title>EditarInformacion</title>
</head>

<body>
<h3 id="h3tabla">Actualizar Contacto</h3>
    <BR>
    <?php
        $id = $_REQUEST['id_contacto'];
               
               include("../conexion.php");
               
               
               $sql = "SELECT * FROM contacto WHERE id_contacto = '$id'";
                    $resultado = mysqli_query($conexion,$sql);
                    $row =mysqli_fetch_array($resultado);            
              
               
           ?>
    
            <form method='POST' action="updatec.php?id_contacto=<?php echo $row['id_contacto'];?>" enctype="multipart/form-data">

                    <div class="input-group col-sm-3 mb-3" id="divimagen">
            
                        <div class="form-group">
                            <label for="exampleFormControlFile1" id="labelseleccionimagen">Seleccione Imagen</label>
                            <input type="file" value="<?php echo $row['urlimagen'] ?>" class="form-control-file" id="urlimagen"
                                name="urlimagen">
                        </div>
                    </div>
                    <div class="col-sm-6" id="divnombrecarrusel">
                        <label id="labelnombrecontacto">Nombre De La Institucion</label>
                        <input type="text" value="<?php echo $row['nombrec'] ?>" class="form-control col-md-6" id="inputnombrecarrusel" name="nombre"
                            required>
                    </div>
                    <div class="col-sm-6" id="divnombrecarrusel">
                        <label id="labelnombrecontacto">Direccion</label>
                        <input type="text" value="<?php echo $row['direccionc'] ?>" class="form-control col-md-6" id="inputnombrecarrusel"
                            name="direccion" required>
                    </div>
                    <div class="col-sm-6" id="divnombrecarrusel">
                        <label id="labelnombrecontacto">Telefono</label>
                        <input type="text" value="<?php echo $row['telefonoc'] ?>" class="form-control col-md-6" id="inputnombrecarrusel"
                            name="telefono" required>
                    </div>
                    <div class="col-sm-6" id="divnombrecarrusel">
                        <label id="labelnombrecontacto">Horario De Atencion</label>
                        <input placeholder="HH:MM:HH:MM" type="text" value="<?php echo $row['horarioc'] ?>" class="form-control col-md-6"
                            id="inputnombrecarrusel" name="horario" required>
                    </div>
                    <div class="col-sm-6" id="divnombrecarrusel">
                        <label id="labelnombrecontacto">Pagina de Facebook</label>
                        <input type="text" value="<?php echo $row['pgfbc'] ?>" class="form-control col-md-6" id="inputnombrecarrusel"
                            name="pgfb" required>
                    </div>
            
                    <br>
            
                    <div id="ae">
                        <button type="submit" class="btn btn-success" name="btn" id=""> Agregar </button>
                        <a href="subir-datos-cca.php" class="btn btn-danger" id="">Cancelar</a>
                    </div>
            
            
                </form>
                
    
</body>

</html>