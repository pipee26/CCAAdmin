<?PHP
require '../conexion.php';

$json=array();

		//$mes=$_GET["mes"];
				
		

        $consulta="select * from meses";
        $resultado=mysqli_query($conexion,$consulta);

            
            while($registro=mysqli_fetch_array($resultado)){
                $result["id_mes"]=$registro['id_mes'];
                $result["nombre"]=$registro['nombre'];
                $result["urlimagen"]=$registro['urlimagen'];
                $json['meses'][]=$result;
            }
		
		mysqli_close($conexion);
		echo json_encode($json);
?>