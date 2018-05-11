<?
session_start();
require('conexion.php');
$tipoerror=" 02: El usuario no existe";
//Inicializamos la variable error
if ($_REQUEST['enviar']){

//Validar datos en  la base de datos

$username=mysqli_real_escape_string($conexion,$_REQUEST['username']);
$password=mysqli_real_escape_string($conexion,$_REQUEST['password']);
$consulta="select * from usuarios where username='$username' and password='$password'";
$usuarios=mysqli_query($conexion,$consulta);
$nfilas=mysqli_num_rows($usuarios);
if ($nfilas>0)
	{
		while($rusuarios=mysqli_fetch_array($usuarios))
		{
			//Guardamos los datos
			$_SESSION['username']=$rusuarios['username'];
			$_SESSION['password']=$rusuarios['password'];
			//Si es admin o no
			$_SESSION['id_usuario']=$rusuarios['id_usuario'];
			$_SESSION['admin']=$rusuarios['admin'];
			//datos personales
			// $_SESSION['nombre']=$rusuarios['nombre'];
			// $_SESSION['apellidoP']=$rusuarios['apellidoP'];
			// $_SESSION['apellidoM']=$rusuarios['apellidoM'];
			// $_SESSION['imagen']=$rusuarios['imagen'];
			// $_SESSION['fecha_Nac']=$rusuarios['fecha_Nac'];
			// $_SESSION['email']=$rusuarios['email'];
			// $_SESSION['imagen_usuario']=$rusuarios['imagen_usuario'];

		}

		mysqli_close($conexion);
	
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		$_SESSION['admin']=$administrador;
		$error=false;

		if ($username==$_SESSION['username'])
			
			{
			
					echo "<script>window.location='index.php?.session_id()'</script>";
			}

			else{
				

			} 

		}
			else
		{
			
				mysqli_close($conexion);
				//mandamos que hay un error
				$error=true;
				$tipoerror=" 05!: El usuario y/o contraseña son incorrectos";
				session_destroy();
		}

}



















//LOGOUT

//


?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>Booker - Login</title>
	<link rel="stylesheet" type="text/css" href="Icon/style.css">
	<link rel="icon" type="image/png" href="Imgs/mifavicon.png" />
	<style type="text/css">
	@font-face{
    font-family: 'Sans-Narrow-Regular';
    src:url('Font/Sans-Narrow-Regular.ttf');
	}
	@font-face{
	    font-family: 'Oswald-Light';
	    src:url('Font/Oswald-Light.ttf');
	}
	@font-face{
	    font-family: 'IndieFlower';
	    src:url('Font/IndieFlower.ttf');
	}
	@font-face{
    font-family: 'BebasNeue';
    src:url('Font/BebasNeue.otf');
	}
	@font-face{
	    font-family:'RobotoSlab-Regular';
	    src:url('Font/RobotoSlab-Regular.ttf');
	}

	*{
		padding:0;
		margin:0;
	}

	body {
		background-image:url('./Imgs/catego.jpg');
	}
		.contenedor2{

			width: 600px;
			height: 300px;
			margin-right:auto;
			margin-left:auto;
			margin-top: 100px;
			padding: 50px;
			text-align:right;
			border-radius: 10px;
			background-color: white;
		}
		form {
			width: 50%;
			margin-right: 0;
			margin-left: auto;
			margin-top:30px;
			
		}
		label{
			font-family:Sans-Narrow-Regular;
			font-size: 24px;
		}
		input{
			border:1px solid rgb(15,39,68);
			width: 100%;
			font-family:Sans-Narrow-Regular;
			font-size: 24px;
			padding: 5px;
			margin: 5px;
			background-color: rgb(30,79,138);
			color:white;
		}
		#boton{
			cursor:pointer;
			background-color:
			background: rgba(73,155,234,1);
			background: -moz-linear-gradient(top, rgba(73,155,234,1) 0%, rgba(32,124,229,1) 100%);
			background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(73,155,234,1)), color-stop(100%, rgba(32,124,229,1)));
			background: -webkit-linear-gradient(top, rgba(73,155,234,1) 0%, rgba(32,124,229,1) 100%);
			background: -o-linear-gradient(top, rgba(73,155,234,1) 0%, rgba(32,124,229,1) 100%);
			background: -ms-linear-gradient(top, rgba(73,155,234,1) 0%, rgba(32,124,229,1) 100%);
			background: linear-gradient(to bottom, rgba(73,155,234,1) 0%, rgba(32,124,229,1) 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#499bea', endColorstr='#207ce5', GradientType=0 );

			font-size: 18px;
			text-align: center;
			width: 50%
		}
		a{
		 text-align: right;
		 font-family:Sans-Narrow-Regular;
		 font-size: 15px;
		 padding-right: 0px;
		 padding-top: 0px;
		 text-decoration: ;
		}

	.logologo{
		z-index: 1000;
		background-color: white;
		width: 200px;
		height: 200px;
		position: absolute;
		border-radius: 100px;
		text-align: center;
	}
	.logologo img {
		padding: 10px;
		z-index: 1000;
		margin:auto;
		width: 230px;

	}
	</style>
</head>
<body>

		<div class="contenedor2">
			<div class="logologo">
				<img src="Imgs/login.png" alt="logo" width="150px">
			</div>
			<h1 style="color:black;font-family:Sans-Narrow-Regular;font-size:30px;">Login</h1>
			<p style="color:black;font-family:Sans-Narrow-Regular;font-size:">Ingresa tu cuenta para acceder.</p>

			<? if ($error==true) { ?>
			<div class="user_error" style="color:red;display:;">
				<p>¡ERROR<? echo $tipoerror;?> </p>
			</div>
			<? } else { ?>
			<br><? } ?>

			    <form action="login.php" method="post">
			       <input type="text" name="username" placeholder="Nombre de usuario">
			       <input type="password" name="password" placeholder="Contraseña">
			       <input style="float: left;" type="submit" value="Ingresar" name="enviar" id="boton"> <br>
    			</form>
    			
			<a href="index.php">Regresar</a>
<br>
			<p>No tienes una cuenta? <a href="singup.php">Registrate aqui.</a></p>
		</div>

</body>
</html>