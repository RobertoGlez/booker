<?php 
	include 'header.php';
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Slider Elemtos</title>
	
	<style>
		main{
			
		}
		.contenedor-slider{

		}
		.articulos{

		}
		.secciones{
			padding: 25px;
			margin:100px;
			background: #ddd;
			height:300px;
			
		}
		.contenedor-slider{
			overflow: hidden;
			height: 300px;

		}
	</style>
</head>
<body>
	<main>
		<section class="secciones">
			<article class="articulos">
				<h2>Elemto 1</h2>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem fugit, quaerat soluta qui minima quasi nesciunt, enim odit rerum aperiam, corporis facilis! Vitae fugiat facilis, sit, temporibus velit delectus eius.
				</p>
			</article>
		</section>
		<section class="secciones">
			<article class="articulos">

				<div class="contenedor-slider">
					<?php include 'slider2.php';?>
				</div>
			
			</article>

		</section>
		<section class="secciones">
			<article class="articulos">
				<h2>Elemto 2</h2>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem fugit, quaerat soluta qui minima quasi nesciunt, enim odit rerum aperiam, corporis facilis! Vitae fugiat facilis, sit, temporibus velit delectus eius.
				</p>
			</article>
		</section>
	</main>
</body>
</html>