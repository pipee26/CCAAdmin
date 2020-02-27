<?PHP
require '../conexion.php';

		$consulta="select * from carruselInicio";
		$resultado=mysqli_query($conexion,$consulta);
		
		while($registro=mysqli_fetch_array($resultado)){
			$result["id"]=$registro['id'];
			//$result["nombre"]=$registro['nombrem'];
			//$result["descripcion"]=$registro['descripcionm'];
			$result["ruta"]=$registro['urlInicio'];
			$json['carrusel'][]=$result;
			//echo $registro['id'].' - '.$registro['nombre'].'<br/>';
		}
		mysqli_close($conexion);
		echo json_encode($json);
		$json=array();
?>
