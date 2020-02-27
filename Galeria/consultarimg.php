<?PHP
require '../conexion.php';

$json=array();

	//if(isset($_GET["tipo"])){
		$mes=$_GET["mes"];
				
		

        $consulta="select * from galeria where mes='{$mes}'";
        //$consulta="select * from galeriacanaco";
        $resultado=mysqli_query($conexion,$consulta);
            
            while($registro=mysqli_fetch_array($resultado)){
                $result["id_galeria"]=$registro['id_galeria'];
                $result["mes"]=$registro['mes'];
                $result["ruta"]=$registro['rutaimg'];
                $json['galeria'][]=$result;
            }


		
		mysqli_close($conexion);
		echo json_encode($json);

?>