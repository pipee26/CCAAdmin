<?PHP
require '../conexion.php';

$json=array();

		//$mes=$_GET["mes"];
				
		

        $consulta="select * from noticias";
        $resultado=mysqli_query($conexion,$consulta);

            
            while($registro=mysqli_fetch_array($resultado)){
                $result["id_noticias"]=$registro['id_noticias'];
                $result["encabezado"]=$registro['encabezado'];
                $result["descripcion"]=$registro['descripcion'];
                $result["urlimagen"]=$registro['urlimagen'];
                $json['noticias'][]=$result;
            }
		
		mysqli_close($conexion);
		echo json_encode($json);
?>