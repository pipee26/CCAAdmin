<?php


$conexion = new mysqli("localhost", "root", "pass", "cca");
    if ($conexion -> connect_error)
    die("Error en la conexion" . $conexion -> connect_error);
    else
    echo "";
?>