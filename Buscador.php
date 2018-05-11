<?php
include 'conexion.php';

$text = $_POST['CampoBuscar'];

if ($_POST['CampoBuscar'] == "") {


	$text = "No hay resultado";


}

$consulta = "SELECT * FROM productos WHERE nombre LIKE '%$text%' "; 

$resultado = mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Resultado</title>
</head>
<body>

	<?include 'header.php'; ?>

	
	<main>

	<article class="contenedor_resultados_de_busqueda">
		<section class="f">
		<style>
		.f{
			width: 100%;
			background: #3a7999;
			color:white;
			font-family: RobotoSlab-Regular;
			padding: 20px;
			border-radius: 20px;
		}
		</style>
		<article>
				<?php echo "Resultados de busqueda para:";
			echo " '" . $text . " '";
			echo " : ";
		  echo   $filas  ; 
			?>
		</article>
		
	</section>  	
	<?php	
	if ($filas > 0) {
		while ($res = mysqli_fetch_assoc($resultado)) {
			?>
			
				<style>
					.contenedorimagen{
						display: flex;
						overflow: hidden;
						padding: 2px;
						margin: auto;
						text-align: center;
					}
					.imgcatego{
						display: block;
						padding: 5px;
						margin: auto;
						background-position: center;
						height:320px;
						width:214px;
					}
					.link>button{
					 border: none;
					 background: #3a7999;
					 color: #f2f2f2;
					 padding-top:10px;
					 padding-bottom:10px;
					 padding-left:35px;
					 padding-right:35px; 
					 font-size: 18px;
					 border-radius: 5px;
					 position: relative;
					 box-sizing: border-box;
					 transition: all 500ms ease;

					}
					.link>button:hover{
						cursor: pointer;
						}

						.link>button:before {
						 content:'';
						 position: absolute;
						 top: 0px;
						 left: 0px;
						 width: 100%;
						 height: 0px;
						 background: rgba(255,255,255,0.3);
						 border-radius: 5px;
						 transition: all 0.7s ease;
						}
						.link>button:hover:before {
							 height: 42px;
							}
				</style>
				<div class="contenedor_resultado">

				<div class="contenedorimagen">
					<img class="imgcatego" src="<? echo $res['imagen'];?>">
				</div>
				<hr>
				<div class="infocontenedor_bus">
					<h3><? echo $res['nombre'];?></h3>
					<p class="xgdescripcion" align="center" style="font-size:25px;color:#767676;"> $ <? echo $res['precio']?> MXN
					</p>
					<a href="./detalles.php?id=<? echo $res['id'];?>" class="link" style=""> <button> Ver </button></a>
				</div>
				</div>
				
		<?}
	}
	?>
	</article>
	</main>
	


	<?include 'footer.php'; ?>

</body>
</html>