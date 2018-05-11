<?php
require_once 'conexion.php';
$comentario=$_POST['coment'];
$id_usuario=$_POST['id_usuario'];
$id_producto=$_POST['id_producto'];

$sql="INSERT into comentarioslibros (id_usuario, id, comentario) VALUES ('$id_usuario','$id_producto','$comentario')";

$consulta=mysqli_query($conexion,$sql);

echo "<script>alert('Ha comentado en este articulo');</script>";
echo "<script>window.location='detalles.php?id=".$id_producto."'</script>";

?>