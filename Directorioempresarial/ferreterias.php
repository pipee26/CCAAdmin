<?php 
require '../conexion.php';

//Creamos la conexiÃƒÂ³n

//generamos la consulta
$sql = "SELECT * FROM empresas where tipo='Ferreterias'";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$clientes = array(); //creamos un array

while($row = mysqli_fetch_array($result)) 

//se colocan las variables que desees de tu tabla
{ 
    $tipo=$row['tipo'];
    $nombre=$row['nombre'];
    $direccion=$row['direccion'];
    $telefono=$row['telefono'];
    $horario=$row['horario'];
    $pgfb=$row['pgfb'];
    $urlimagen=$row['urlimagen'];
    
    

    $clientes[] = array('nombre'=> $nombre, 'direccion'=> $direccion,'telefono'=> $telefono,'horario'=> $horario,'pgfb'=> $pgfb, 'urlimagen'=> $urlimagen);

}
    
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_string = json_encode($clientes);
echo $json_string;

//Si queremos crear un archivo json, serÃƒÂ­a de esta forma:
/*
$file = 'clientes.json';
file_put_contents($file, $json_string);
*/
    

?>