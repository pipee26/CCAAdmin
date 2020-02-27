
<?PHP
require '../conexion.php';

$json=array();

		//$mes=$_GET["mes"];
				
		

        $consulta="select * from cursos";
        $resultado=mysqli_query($conexion,$consulta);

            
            while($registro=mysqli_fetch_array($resultado)){
               // $result["id_curso"]=$registro['id_curso'];
               // $result["dia"]=$registro['dia'];
                $result["nombre"]=$registro['nombre'];
                $json['cursos'][]=$result;
            }
		
		mysqli_close($conexion);
		echo json_encode($json);
?>