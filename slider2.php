		<?php
		include 'conexion.php';
		$consulta="SELECT * FROM productos ORDER BY votos DESC limit 8";
		$sql=mysqli_query($conexion,$consulta);
		$datos=mysqli_fetch_array($sql);
		$total=count($datos);

		 ?>
		<link rel="stylesheet" href="Estilos/slider.css">
		<section class="ContenedorPrincipal">
			<article class="articulo_slider">
					<div class="sliderContainer">
				

				<?php 

					while ( $top=mysqli_fetch_assoc($sql)) {

					if($top['imagen']==null){
						$imagen_cover = "catalogo/cover-default.jpg";
					} else { 
						$imagen_cover = $top['imagen'];
					}
		
				?>
					

					<div class="book-element"> 
					<!-- contenedor de libro -->
						<div class="image-element">
						<!-- Contenedor imagen -->
							<a href="detalles.php?id=<?php echo $top['id'];?>">
								<div class="image-container">
									<img 
									src="<?php 
									echo $imagen_cover;
									?>" 
									alt="<?php 
									echo $top['imagen'];
									?>" 
									width="200" height="280" 
									title="<?php 
									echo $top['nombre'];
									?>">
								</div>
							</a>
						
						</div>
								
						<div class="info-element" align="center">
						<!-- Informacion del libro -->
							<!--Titulo--><h3><a href="detalles.php?id=<?php echo $top['id'];?>"><?php echo $top['nombre'];?></a></h3> 
							<!--Precio--><p><strong>$ <?php echo $top['precio'];?>.00 MXN</strong></p>
							<!-- Votos --><p ><?php echo $top['votos'];?>  Marcados</p>
						</div>
						<div class="button" align="center">
						<!-- Botones de accion -->
							<div class="botones-container" align="center">
								<ul align="center">
									<li><a href="detalles.php?id=<?php echo $top['id'];?>" class="ver">Ver</a></li>
									<li><a href="carritodecompras.php?id=<?php echo $top['id'];?>" class="añadir">Añadir</a></li>
								</ul>
							</div>
						</div>
					<!-- aqui termina el contenedor de libro -->
					</div>

					<?php
					} 					
					?>

					</div>
				
			</article>
		</section>