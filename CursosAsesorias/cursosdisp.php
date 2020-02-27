
<?php 

require '../conexion.php';

$sql = "SELECT * FROM cursos where cupo >= 1";
mysqli_set_charset($conexion, "utf8"); 

if(!$result = mysqli_query($conexion, $sql)) die();

$clientes = array(); 

while($row = mysqli_fetch_array($result)) 


{ 
        $dia=$row['dia'];
        $mes=$row['mes'];
        $nombre=$row['nombre'];
		$sede=$row['sede'];
		$horario=$row['horario'];
        $precio=$row['precio'];
        $descripcion=$row['descripcion'];
        $cupo=$row['cupo'];
        
    
    

    $clientes[] = array('dia'=> $dia,'mes'=> $mes,'nombre'=> $nombre, 'sede'=> $sede,'horario'=> $horario,'precio'=> $precio,'descripcion'=> $descripcion,'cupo'=> $cupo);

}
    
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_string = json_encode($clientes);
echo $json_string;


    

?>

