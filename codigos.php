<?
include 'conexion.php';

$id_libros=$_POST['id_libros'];
$nombre=$_POST['nombre'];
$autor=$_POST['autor'];
$categoria=$_POST['categoria'];
$sinopsis=$_POST['sinopsis'];
$editorial=$_POST['editorial'];
$precio=$_POST['precio'];
$ISBR=$_POST['ISBR'];
$versiones=$_POST['versiones'];
$peso=$_POST['peso'];
$image=$_POST['image'];
//datos recividos
$insertar="insert into libros (id_libros,nombre,autor,categoria,sinopsis,editorial,precio,ISBR,versiones,peso,image) values ('$id_libros','$nombre','$autor','$categoria','$sinopsis','$editorial','$precio','$ISBR','$versiones','$peso','$image')";
//se ejecuta la consulta
$resultado=mysqli_query($conexion,$insertar);

if(!$resultado){
	echo "Error al registrarse";
}else{
	echo "Producto Registrado";
}
//cerramos la conexion
mysqli_close($conexion);
?>