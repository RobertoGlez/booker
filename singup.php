<?php 

include'header.php';
include 'conexion.php';
$aviso="Vacio";
$error=false;
if ($_REQUEST['enviar']) {

$nombreusuario=$_REQUEST['username'];


$consulta="SELECT username from usuarios WHERE username='$nombreusuario'";
$resultado=mysqli_query($conexion, $consulta);
$datos_validar=mysqli_num_rows($resultado);

if ($datos_validar===0 && $nombreusuario !== "") 
	{
		//Contraseña
	$clave1=$_REQUEST['clave1'];
	$clave2=$_REQUEST['clave2'];
	$validar_password=false;

		//que coincidan
		if ($clave1===$clave2) {
			$validar_password=true;
			$password=$clave1;

			if (trim($password)!=="") {

				$validar_email=$_REQUEST['email'];
				$consulta="SELECT email from usuarios WHERE email='$validar_email'";
				$resultado=mysqli_query($conexion, $consulta);
				$datos_validar=mysqli_fetch_array($resultado);


					$username=$_REQUEST['username'];
					$password=$_REQUEST['clave1'];
					$nombre=$_REQUEST['nombre'];
					$a_paterno=$_REQUEST['a_paterno'];
					$a_materno=$_REQUEST['a_materno'];
					$email=$_REQUEST['email'];
					//fecha nacimiento
					$fecha_nac=$_REQUEST['ano']."-".$_REQUEST['mes']."-".$_REQUEST['dia'];
					
					if (trim($_REQUEST['imagen_usuario'])==0) {

						$imagen_usuario="usuarios/user-default.jpg";

					} else {

					//imagen_usuario



					//_______

					}


					$insertar="INSERT into usuarios (username, password, nombre, apellidoP, apellidoM, fecha_Nac, email, imagen_usuario) VALUES ('$username','$password', '$nombre','$a_paterno','$a_materno','$fecha_nac','$email','$imagen_usuario')";
					$sql=mysqli_query($conexion,$insertar);

					echo "<script> alert('Usuario Registrado') </script>";
					//echo "<script> window.location='index.php' </script>";

	


			} else {
				$error=true;	
				$aviso="No puede dejar la contraseña en blanco";
			}

		}else{

			$validar_password=false;
		}

		if ($validar_password) 
			{
				$error=false;			
				$aviso="Se valido el password";

			} else {

				$error=true;
				$aviso="Las contraseña no coinciden";
			}

	} else 
		{
			$error=true;
			$aviso= "Este nombre de usuario ya existe!";
		}

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro - Booker</title>
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
	select{
		border:none;
		background-color: rgb(220,220,220);
		padding: 10px;
		margin: 10px;	
		width: auto;		
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
		<h1>Registro de Usuario</h1>
	<br>
		<div id="error">
				<!-- Estes es un Texto de Error!! -->
				<? 
				if($error==true){
				echo "<p style='color:red;visibility:visibility;'>";		
				echo $aviso;
				}
				echo "<p style='color:red;visibility:hidden;'>";


				?>
			</p>
		</div>
	<form action="singup.php" method="post" >
		<!-- <label for="" >Suba su foto de Perfil:</label><br>
		<input type="file" name="uploadedfile"><br> -->
		
		<input type="text" name="username" placeholder="Nombre de Usuario"><br>
		<input type="password" name="clave1" placeholder="Contraseña"><br>
		<input type="password" name="clave2" placeholder="Confirmar Contraseña"><br>
		<input type="text" name="nombre" placeholder="Nombre(s)"><br>
		<input type="text" name="a_paterno" placeholder="Apellido Paterno"><br>
		<input type="text" name="a_materno" placeholder="Apellido Materno"><br>

		<label for="dia" > Fecha de Nacimiento:</label><br>

		<select name="dia" id="fehca_dia">
			<option value="" selected="">Dia</option>
			<?php 
			for ($i=1; $i <=31; $i++) 
				{ 
				?>

				<option value="<?php echo $i;?>"><?php echo $i; ?></option>
	
				<?
				}
				?>
		</select>
		<select name="mes" id="fecha_mes">

			<option value="" selected="selected" >Mes</option>
			<option value="01">Enero</option>
			<option value="02">Febrero</option>
			<option value="03">Marzo</option>
			<option value="04">Abril</option>
			<option value="05">Mayo</option>
			<option value="06">Junio</option>
			<option value="07">Julio</option>
			<option value="08">Agosto</option>
			<option value="09">Septiembre</option>
			<option value="10">Octubre</option>
			<option value="11">Noviembre</option>
			<option value="12">Diciembre</option>

		</select>
		<select name="ano" id="fecha_ano"> 
				<option value="" selected="selectedt">Año</option>
				<?php 
				for ($j=1970; $j<=2017; $j++){
				?>

				<option value="<?php echo $j ;?>"><?php echo $j;?></option>

				<?php 
				}
				?>
		</select>
		<br>

		<input type="email" name="email" placeholder="Correo Electronico"><br>
		<input id="registro" type="submit" name="enviar" value="Registrarse">


	</form>
</div>
<div class="divisor"></div><br>
	</main>
	<br>
	<br>

	            <a href="index.php" style="color:white; font-size:15px; text-decoration:none; padding:10px; background-color:red; margin:10px;">
                    Regresar
                </a>
                <? include 'footer.php';?>
                <br>
</body>
</html>