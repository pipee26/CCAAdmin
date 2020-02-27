<?php
  require '../conexion.php';

    

    $json=array();

        $noticias=$_GET["noticias"];
        $consulta= "SELECT * FROM carruselnoticias WHERE noticias = '$noticias'";
        //$consulta="select * from usuario";
		$resultado=mysqli_query($conexion,$consulta);
            
            while($registro=mysqli_fetch_array($resultado)){
                $result["id_cn"] = $registro['id_cn'];
                $result["urlimagen"] = $registro['urlimagen'];
                $result["noticias"] = $registro['noticias'];
             

                $json['noticias2'][]=$result;
            }
		
		mysqli_close($conexion);
		echo json_encode($json);
	
?>