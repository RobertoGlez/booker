<?
session_start();
$sesionusuario=false;
include 'conexion.php';




if(isset($_SESSION['username'])){
	$sesionusuario=true;

	$id_usuario=$_SESSION['id_usuario'];
	$consulta="SELECT * FROM  usuarios WHERE id_usuario='$id_usuario'";
	$sql=mysqli_query($conexion,$consulta);
	$usuario=mysqli_fetch_array($sql);
	$nombreusuario=$usuario['username'];
}else{
	$sesionusuario=false;
}

$consulta="select * from comentarios";
$titulo=$_REQUEST['titulo'];
$nombreanonimo = $_REQUEST['nombre'];
$contenido = $_REQUEST['contenido'];

if ($_REQUEST['enviar']) {

	if(trim(!$titulo)=="" and trim(!$contenido)==""){
	$insertar="insert into comentarios (titulo,nombreanonimo,contenido)
			values ('$titulo','$nombreanonimo','$contenido')";
	$query=mysqli_query($conexion,$insertar) or die ("<script> alert ('hubo un error') </script>");
	echo "<script> alert ('Comentario enviado') </script>";
	 echo "<script>window.location='index.php'</script>";
	} else { echo "<script> alert ('No debe dejar campos vacios') </script>";}

}
?>
<!DOCTYPE html>

<html lang="en">
<head>
<?include'header.php';?>
	<meta charset="UTF-8">
	<title>Contacto - Booker</title>
	<style>
	.menuregistro{
		width: 70%;
		margin-left: auto;
		margin-right: auto;
		margin-top: 50px;
		margin-bottom: 50px;
		font-family: Sans-Narrow-Regular;
	}
	.menuregistro input{
		border:none;
		background-color: rgb(220,220,220);
		padding: 10px;
		margin: 10px;	
		width: 250px;		
	}
	
	.menuregistro textarea{
				border:none;
		background-color: rgb(220,220,220);
		padding: 10px;
		margin: 10px;	
	}
	#registro{
		cursor: pointer;
	}
	#registro:hover{
		background-color: rgb(30,125,215);
		color:white;
	}

	</style>
</head>
<body>
<main class="contprincipal">
	<div class="divisor"></div>
	<div class="menuregistro">
	<h1>Comentarios de Cliente</h1>
	<br>
	<form action="contacto.php" method="post" >
		<input type="text" name="titulo" placeholder="Titulo"><br>


		<?
		if($sesionusuario){
		?>
			
		<input type="hidden" name="nombre" value="<? echo $nombreusuario;?>">

		<?
		}else{
		?>

		<input type="text" name="nombre" placeholder="Nombre de Usuario"><br>

		<?}?>

		<textarea row="6" cols="40" type="text" name="contenido" placeholder="Contenido"></textarea><br>
		<input id="registro" type="submit" name="enviar" value="Enviar Comentario">
	</form>
	<article id="nosotros">
		<br>
			<p>Siguenos en nuestras redes sociales</p>
			<h3>Facebook</h3>
				<p><span class="icon-facebook2"></span> /bookershop</p>
			<h3>Whatsapp</h3>
			<p><span class="icon-whatsapp"></span>  /9932234542</p>
		</article>
	</main>
	<br>
	<br>
	</div>
	<div class="divisor"></div><br>
	            <a href="index.php" style="color:white; font-size:15px; text-decoration:none; padding:10px; background-color:red; margin:10px;">
                    Regresar
                </a>
                <? include 'footer.php';?>
                <br>
</body>
</html>