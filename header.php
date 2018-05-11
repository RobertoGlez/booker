<?
session_start();

if (isset($_SESSION['id_usuario'])){
	$sesion=true;
	$nombreusuario=$_SESSION['username'];
} else{
	$sesion=false;
}


include 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	
	<!-- <link rel="stylesheet" type="text/css" href="Estilos/EstiloPagPrincipal.css"> -->
	<link rel="stylesheet" type="text/css" href="Estilos/EstilosGeneral.css">
	<!-- <link rel="stylesheet" href="normalize.css" /> -->
	<link rel="stylesheet" type="text/css" href="Icon/style.css">
	<link rel="icon" type="image/png" href="Imgs/mifavicon.png" />


<!--  slider-->
<link rel="stylesheet" href="Estilos/slider.css"/>
<!-- <link rel="stylesheet" href="ism/css/my-slider.css"/>
<script src="ism/js/ism-2.1.js"></script>
 -->
<script src="Js/funciones.js"></script>


	<script src="Js/jquery-latest.js"></script>
	<script src="Js/Slider.js"></script>
	<script src="Js/main.js"></script>
</head>
<body>
<!-- Access -->
		<div class="Contlogin">
			<ul class="login">
				

				<?
				if ($sesion==true){

				?>
				<li class="Salir">
					<a href="javascript:CerrarSession()" id="Crt" title="Cerrar Sesion" >
						<span class="icon-switch"></span>
					</a>
				</li>
				
				<li class="Acceder">
					<a href="usuario.php">
						<span class="icon-user"></span><? echo $nombreusuario;?>
					</a>
				</li>
				
				
				<li class="Carrito">
					<a href="carritodecompras.php" id="Crt">
						<span class="icon-cart" style="color:;"></span>
					</a>
				</li>



				<?
				} else{

				?>

				<li class="Acceder"><a href="login.php"><span class="icon-user"></span>Acceder</a></li>
				<li class="Resgistrarse"><a href="singup.php"><span class="icon-quill"></span>Registrarse</a></li>
				
				<li class="Carrito"><a href="carritodecompras.php" id="Crt"><span class="icon-cart" style="color:;"></span> </a></li>

				<?	
				}
				?>




			</ul>
		</div>
<!--  -->
		<header>
			<!-- Menu -->
			<div class="Contenedor">
				<!-- Logotipo -->
				<div class="ContTagBanner">
					<div class="ContenedorTag">
						<img src="Imgs/Tag.png" alt="Imagen Banner Booker" class="TagBanner">

					</div>
				</div>

				<div class="contlogo">
					<div class="Logo">
						<a align="center">
							<img src="Imgs/Logo.png" alt="Imagen del Logotipo" align="center" >
						</a>
					</div>
				</div>
				<nav class="menu">
					<div class="ContenedorMenu">
						<ul class="menu2">
							<li class="home"><a href="index.php">Inicio</a></li>
							<li class="Categorias"><a>Productos</a>
								<!-- //sub menu -->
								<ul class="SubmenuCategorias">
									<li><a href="categorias.php">Por Genero</a></li>
									<li><a href="productos.php?ver=todos">Todos</a></li>
								</ul>
							</li>
							<li class="LogoNombre">

								<a><span class="icon-circle-up"></span></a>
							</li>

							<li class="Nosotros"><a href="nosotros.php">Nosotros</a></li>
							<li class="Contacto"><a href="contacto.php">Contactanos</a></li>
						</ul>
					</div>
				</nav>
			</div>
						<div class="Search">
							<div class="contbuscar"> 
					<form action="Buscador.php" method="post">

						<input type="submit" value="Buscar" id="Boton-buscar">
						<input id="CampoBuscar" name="CampoBuscar" type="text" placeholder="Buscar un Libro.." >
					</form>
								
					        </div>
						</div>
		</header>