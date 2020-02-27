<?php 
require '../conexion.php';
//generamos la consulta
$sql = "SELECT * FROM contacto";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$clientes = array(); //creamos un array

while($row = mysqli_fetch_array($result)) 

//se colocan las variables que desees de tu tabla
{ 
   
    $nombre=$row['nombrec'];
    $direccion=$row['direccionc'];
    $telefono=$row['telefonoc'];
    $horario=$row['horarioc'];
    $pgfb=$row['pgfbc'];
    $urlimagen=$row['urlimagen'];
    
    

    $clientes[] = array('nombrec'=> $nombre, 'direccionc'=> $direccion,'telefonoc'=> $telefono,'horarioc'=> $horario,'pgfbc'=> $pgfb, 'urlimagen'=> $urlimagen);

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