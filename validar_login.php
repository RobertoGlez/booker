<?
include 'conexion.php';
session_start();
$_SESSION['username']=$_POST['username'];
$_SESSION['password']=$_POST['password'];
$consulta="select * from usuarios where username='$_SESSION[username]' and password='$_SESSION[password]'";
$usuarios=mysqli_query($conexion,$consulta);
$nfilas=mysqli_num_rows($usuarios);
if ($nfilas>0){
	while($rusuarios=mysqli_fetch_array($usuarios))
	{
		$_SESSION['username']=$rusuarios['username'];
		$_SESSION['password']=$rusuarios['password'];
	}
	mysqli_close($conexion);
	
$_SESSION['username']=$username;
$_SESSION['password']=$password;
$_SESSION['admin']=$administrador;

if ($username==$_SESSION['username'])
	{
	echo "<script>window.location='menu_admin.php?.session_id()'</script>";

	}
}
else
{
	
	mysqli_close($conexion);
	echo "<script>window.location='login.php?variable_error=true?'</script>";
	session_destroy();
}

?>