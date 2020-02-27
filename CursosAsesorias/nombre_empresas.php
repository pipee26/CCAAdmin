<?php
session_start();
if ($_SESSION['nivel'] != 1){
  header('Location:../index.php');
}?>
<?php 

require '../conexion.php';

//Creamos la conexiÃƒÂ³n

//generamos la consulta
$sql = "SELECT * FROM cursos";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$clientes = array(); //creamos un array

while($row = mysqli_fetch_array($result)) 

//se colocan las variables que desees de tu tabla
{ 
        
        $nombre=$row['nombre'];
	
    
    

    $clientes[] = array('nombre'=> $nombre);

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