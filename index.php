


<?

include('header.php');
$consulta_noticias="SELECT * FROM noticias ORDER BY fecha desc LIMIT 3";
$lonuevo="SELECT * FROM productos ORDER BY id desc LIMIT 1";
$nuevos = mysqli_query($conexion,$lonuevo);
$noticias = mysqli_query($conexion,$consulta_noticias);
$not = mysqli_fetch_array($noticias);
$librosnuevos=mysqli_fetch_array($nuevos);

?>
<title>Booker - Venta de Libros</title>
	<main class="contprincipal">

		<section class="uno">

			<article class="FraseBienvenida">
				<h2 class="Frasedeldia" align="center">Bienvenidos!</h2>
				<p>&lt;&lt;Amor y deseo son dos cosas diferentes; que no todo lo que se ama se desea, ni todo lo que se desea se ama.&gt;&gt;</p>
				<br>
				<p class="Autor" align="right">-Don Quijote de la Mancha (Miguel de Cervantes) </p>
			</article>
		</section>

		<!-- segunda seccion -->


<article class="MarcadoresDestacados" style="">
	<div align="center">
		<p style="margin:0px;padding:5px;padding-bottom:10px;width: 50%;font-size: 20px;color:black;font-family: RobotoSlab-Regular">
			 <span class="icon-bookmark" style="font-size:20px;color:rgb(30,125,215);"></span> Marcadores Destacados
		</p>
		<hr>
	</div>
</article>


<?
include ('slider2.php');
?>





			<article class="noticias1">
				<div class="noticias1cont">
					<div class="contartuno">
						<div class="nocitiaunocontdos">

							<div class="informacion_nuevo">
								<h1>Lo Nuevo de la Semana</h1>
							</div>

							<h2><span class="icon-star-full"></span>
								<?php echo $librosnuevos['nombre'];?></h2>

								<p><?php echo substr($librosnuevos['descripcion'],0,164);?>..</p><br>
								<a href="detalles.php?id=<?php echo $librosnuevos['id'];?>" class="LeerMas">Leer Más..</a>

						</div>

					</div>
					<div class="contartunoimagen">
						<img src="Imgs/03.jpg" alt="" class="imagen_art_uno">

					</div>
				</div>
			</article>
			<aside class="noticias2">
				<div class="asidecont">
					<h2> <span class="icon-newspaper"></span> Noticias</h2>
					<? do { ?>
					<div>
						<h3><? echo $not['titulo']; ?> <br></h3>
						<p style="font-size:12px;"><? //echo $not['fecha']; ?> <br></p>
						<p><? echo $not['contenido']; ?> <br></p>
						<br>  
					</div>
					<? } while ($not=mysqli_fetch_assoc($noticias)); ?>


					<br>
		
					</div>
				</div>
			</aside>
		</section>

		<!--tercera seccion -->
		<section class="tres">
			<div class="historiaimage">
				<figure>

				</figure>

	 		<article class="historia">
				<div class="conthis">
				<h2 class="titulohis">Un poco acerca de nosotros..</h2>
				<p class="historiatex">Booker es una página destinada a ofrecer libros de manera física y electrónica, para que el usuario que lo requiera pueda encontrar el material que mejor le sea de ayuda, desde un archivo digital que contenga información importante que le ayude en tu tesis que esta por acabar, hasta que tenga la oportunidad de comprar aquel libro en físico que nunca pudo encontrar y poder tenerlo en sus manos para disfrutar de horas de lectura, sumergirse en las letras y perderse entre los párrafos de aquella fantástica aventura, de aquella triste historia, de aquel trágico romance. </p>
				</div>

			</article>
		</section>
		<section class="cuatro">
			
			<article class="artseccuatro">
			
				<div class="test">
					<style>
						.test{
							font-family: RobotoSlab-Regular;
							font-size: 20px;
						}
						.irtest{
							padding: 10px;
							margin:10px;
							text-decoration: none;
							background: rgb(30,125,215);
							color: white;
							font-family: RobotoSlab-Regular;
						}
						.irtest:hover{
							background: rgb(20,85,158)
						}
					</style>
					¿Quiéres saber que clase de lector eres? <br><br>
					<a href="dinamica/BookerTest.swf" class="irtest">Hacer Test</a>
				</div>

			</article>

		</section>

	<? include('footer.php');
	?>
	</main>
</body>
</html>


