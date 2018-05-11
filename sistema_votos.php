<?php
require 'conexion.php';


session_start();


$id_usuario=$_SESSION['id_usuario'];
$id_producto=$_POST['producto'];



$consulta_usuario= "SELECT * FROM usuarios WHERE id_usuario ='$id_usuario'";
$query_usuario=mysqli_query($conexion,$consulta_usuario);
$datos_user=mysqli_fetch_array($query_usuario);


$consulta_producto="SELECT * FROM productos WHERE id = '$id_producto'";
$query_producto=mysqli_query($conexion,$consulta_producto);
$datos_produc=mysqli_fetch_array($query_producto);

$comprobar_marcadores="SELECT * FROM marcadores WHERE id ='$id_producto' and id_usuario='$id_usuario'";
$comprobar_marcadores_query=mysqli_query($conexion, $comprobar_marcadores);
$array_marcadores=mysqli_fetch_array($comprobar_marcadores_query);
$marcadores_row=mysqli_num_rows($comprobar_marcadores_query);

if ($marcadores_row==0){

	$insertar_marcador="INSERT into marcadores (id, id_usuario ) VALUES ('$id_producto','$id_usuario')";
	$inser_marcador_query=mysqli_query($conexion, $insertar_marcador);

	$votos_actuales=$datos_produc['votos'];
	$votos=$votos_actuales+1;

	$update_voto= "UPDATE productos SET votos='$votos' WHERE id ='$id_producto' ";
	$ejecutar_update= mysqli_query($conexion, $update_voto);


	echo "<script> window.location='detalles.php?id=".$datos_produc['id']."' </script>";
	




	
} else {

	

	$voto_hecho=$array_marcadores['marcado'];

	if ($voto_hecho==true) {

		$new_marcado=false;
		$actualizacion="UPDATE marcadores SET marcado='$new_marcado' WHERE id='$id_producto' and id_usuario='$id_usuario'";
		$update_marcado=mysqli_query($conexion,$actualizacion);

		$votos_actuales=$datos_produc['votos'];
		$votos=$votos_actuales-1;

		$update_voto= "UPDATE productos SET votos='$votos' WHERE id='$id_producto' ";
		$ejecutar_update= mysqli_query($conexion, $update_voto);

		echo "<script> window.location='detalles.php?id=".$datos_produc['id']."' </script>";


		
	} else {

		$new_marcado=true;
		$actualizacion="UPDATE marcadores SET marcado='$new_marcado' WHERE id='$id_producto' and id_usuario='$id_usuario'";
		$update_marcado=mysqli_query($conexion,$actualizacion);

		$votos_actuales=$datos_produc['votos'];
		$votos=$votos_actuales+1;

		$update_voto= "UPDATE productos SET votos='$votos' WHERE id='$id_producto' ";
		$ejecutar_update= mysqli_query($conexion, $update_voto);


		echo "<script> window.location='detalles.php?id=".$datos_produc['id']."' </script>";

	}


}







 ?>
