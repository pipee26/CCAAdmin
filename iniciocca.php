<?php
session_start();
if ($_SESSION['nivel'] != 1){
  header('Location:index.php');
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="icon/style.css">
    <link rel="stylesheet" href="stylebarra.css">
    <link rel="stylesheet" href="stylesalir.css">
    <title>Inicio</title>
</head>

<body>
    <main>
        <div class="content-menu">
            <li><span class="lnr lnr-home icon1"></span>
                <h4 class="text1">Inicio</h4>
            </li>
            <li>
                <a href="perfil/perfil.php"><span class="lnr lnr-user icon2"></span>
                    <h4 class="text3">Perfil</h4></a>
            </li>
            <li>
                <a href="Carruselinicial/subirimg.php">
                    <span class="lnr lnr-briefcase icon3"></span>
                    <h4 class="text3">Carrusel inicial</h4></a>
            </li>
            <li>
                <a href="Directorioempresarial/subir-empresa.php">
                    <span class="lnr lnr-apartment icon4"></span>
                    <h4 class="text4">Directorio empresarial</h4></a>
            </li>
            <li>
                <a href="Red-Descuentos/subir-promocion.php">
                    <span class="lnr lnr-arrow-down icon5"></span>
                    <h4 class="text4">Red y descuentos</h4></a>
            </li>
            <li>
                <a href="CursosAsesorias/subir-curso.php">
                    <span class="lnr lnr-book icon6"></span>
                    <h4 class="text6">Cursos y asesorias</h4></a>
            </li>
            <li>
                <a href="Noticias/subir-noticia.php">
                    <span class="lnr  lnr-bookmark icon7"></span>
                    <h4 class="text7">Noticias</h4></a>
            </li>
            <li>
                <a href="Galeria/subir-meses.php">
                    <span class="lnr lnr-picture icon8"></span>
                    <h4 class="text8">Galeria</h4></a>
            </li>
            <li>
                <a href="Contacto/subir-datos-cca.php">
                    <span class="lnr  lnr-phone-handset icon9"></span>
                    <h4 class="text9">Contacto</h4></a>
            </li>
        </div>
        
        <img src="imglogin/canaco.png" id="imgfondo">        
    </main>
    <div id="logout">
        <a href="cerrarsesion.php"><img src="imglogin/logout.png" id="imglogout" ></a>
      </div>
      <div id="back">
        <a href="descargar.php"><img src="imglogin/back.png" id="backup" ></a>
      </div>
</body>

</html>