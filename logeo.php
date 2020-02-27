<?php
session_start();
require('conexion.php');
$usuario=$_POST['usuario'];
$pass=$_POST['password'];
$sql ="SELECT * FROM usuarioadmin WHERE usuario='$usuario' AND password='$pass'";

				
$query = mysqli_query($conexion,$sql);
$fila = mysqli_fetch_assoc($query);

 $encontrados = mysqli_num_rows($query);

 if ($encontrados >=1){
 	 $_SESSION['usuario'] = $fila['usuario'];
 	 $_SESSION['password'] = $fila['password'];
 	 $_SESSION['nivel'] = $fila['nivel'];
 	    if ($fila['nivel'] == 1){
		    header('Location:iniciocca.php');
 	    }
     }else{
	
 	header('Location:index.php');
 }
?>