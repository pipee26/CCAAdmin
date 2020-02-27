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
    <link rel="stylesheet" href="../icon/style.css">
    <link rel="stylesheet" href="../Carruselinicial/stylebarra.css">
    <title>Perfil</title>
</head>
<body>
<main>
        <div class="content-menu">
                <li>
                    <a href="../iniciocca.php" id="a1">
                        <span class="lnr lnr-home icon1"></span>
                        <h6 class="text1">Inicio</h6>
                    </a>
                </li>
                <li>
                    <a href="../perfil/perfil.php" id="a2"><span class="lnr lnr-user icon2"></span>
                        <h6 class="text3">Perfil</h6>
                    </a>
                </li>
                <li>
                    <a href="../Carruselinicial/subirimg.php" id="a3">
                        <span class="lnr lnr-briefcase icon3"></span>
                        <h6 class="text3">Carrusel inicial</h6>
                    </a>
                </li>
                <li>
                    <a href="../Directorioempresarial/subir-empresa.php" id="a4">
                        <span class="lnr lnr-apartment icon4"></span>
                        <h6 class="text4">Directorio empresarial</h6>
                    </a>
                </li>
                <li>
                    <a href="../Red-Descuentos/subir-promocion.php" id="a5">
                        <span class="lnr lnr-arrow-down icon5"></span>
                        <h6 class="text4">Red y descuentos</h6>
                    </a>
                </li>
                <li>
                    <a href="../CursosAsesorias/subir-curso.php" id="a6">
                        <span class="lnr lnr-book icon6"></span>
                        <h6 class="text6">Cursos y asesorias</h6>
                    </a>
                </li>
                <li>
                    <a href="../Noticias/subir-noticia.php" id="a7">
                        <span class="lnr  lnr-bookmark icon7"></span>
                        <h6 class="text7">Noticias</h6>
                    </a>
                </li>
                <li>
                    <a href="../Galeria/subir-meses.php" id="a8">
                        <span class="lnr lnr-picture icon8"></span>
                        <h6 class="text8">Galeria</h6>
                    </a>
                </li>
                <li>
                    <a href="../Contacto/subir-datos-cca.php" id="a9">
                        <span class="lnr  lnr-phone-handset icon9"></span>
                        <h6 class="text9">Contacto</h6>
                    </a>
                </li>
            </div>
            <div class="container">
                    <BR>
                        <h3 id="h3perfil">PERFIL</h3>
                        <BR>
                    <table class="table table-success col-md-3" id="tablaperfil">
                            <thead>
                                <tr>
                    
                                    <th scope="col">
                                        <center>USUARIO</center>
                                    </th>
                                    <th scope="col">
                                        <center>CONTRASEÑA</center>
                                    </th>
                                    <!-- <th scope="col" ><center>FUNCION</center></th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?PHP
                                    require_once('../conexion.php');
                                    $consul="SELECT * FROM usuarioadmin";
                                    $res=mysqli_query($conexion,$consul);
                                    while($row=mysqli_fetch_array($res)){
                                ?>
                                <tr>
                    
                                    <td>
                                        <center>
                                            <?PHP echo $row['usuario']?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?PHP echo $row['password']?>
                                        </center>
                                    </td>
                                </tr>
                                <?PHP } ?>
                            </tbody>
                        </table>
                        <form method='POST' action="update.php" enctype="multipart/form-data">
                        <div class="row">
                                <div class="col-md-3" id="divlabelperfil">
                                    <label id="labelnombrecurso">Nuevo nombre de suario</label>
                                    <input type="text" class="form-control" id="nombrecurso" name="usuario" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3" id="divlabelperfil">
                                    <label id="labelsedecurso">Nueva contraseña</label>
                                    <input type="text" class="form-control" id="sedecurso" name="password" required>
                                </div>
                            </div>
                            <br>
                            <div id="btnactualizar">
                                <button type="submit" class="btn btn-success" name="btn" id=""> Actualizar </button>
                            </div>
                        </form>
                        
            </div>
            
    </main>

</body>
</html>