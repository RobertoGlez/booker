		<?
		include 'conexion.php';
		$consulta="SELECT * FROM productos ORDER BY votos DESC LIMIT 6";
		$sql=mysqli_query($conexion,$consulta);
		$datos=mysqli_fetch_array($sql);

		 ?>

		<section class="ContenedorPrincipal">
			<article class="articulo_slider">

				<div class="form_container">
					<div class="sliderContainer">

					<ul>

					<? while($datos=mysqli_fetch_assoc($sql)) { ?>
						
						<li>
							<a href="detalles.php?id=<? echo $datos['id'];?>">
								<img src="<? echo $datos ['imagen'];?>" alt="" width="250" height="380">
							</a>
						</li>

					<?}?>


				
					</ul>

					
					</div>
					<!-- <button class="left">&#60;</button>
					<button class="right">&#62;</button> -->
				</div>




					



			</article>
		</section>