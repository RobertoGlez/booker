<?php

require_once 'conexion.php';
require 'time.php';

$consulta = "SELECT a.comentario,a.fecha_comentario,c.username,c.imagen_usuario FROM comentarioslibros a, productos b,usuarios c 
WHERE a.id_usuario=c.id_usuario AND a.id=b.id AND a.id='$id' ORDER BY fecha_comentario DESC";
$sql = mysqli_query($conexion, $consulta);
$row=mysqli_num_rows($sql);

?>
<link rel="stylesheet" href="./Estilos/EstilosGeneral.css">

<section class="comentarios_libro" >

	<article class="contenedor_comentario">	
			<h2>
				Comentarios:
			</h2>
			<hr>
				

			<?php 

			if($row==0){?>

			<div class="cont_coment">


				<div class="contenedor_consulta_resultado">
					
					<p>
						<strong>NO HAY COMENTARIOS EN ESTE ARTICULO	</strong>
					</p>
				</div>

			</div>


			<?php 
			}else{	

				

				while($productos = mysqli_fetch_array($sql)) {
				
			?>

		<div class="cont_coment">
			
				
			
			<div class="contenedor_consulta_resultado">
				<div class="nickname"> 
					<div class="contendor_imagen">
					
						<div class="contenedor_archivo_imagen">
							<img src="<?php echo $productos['imagen_usuario'];?>" alt="" >
						</div>
					</div>
					<div class="info_usuario">
					
					<br>
						<p><strong><?php echo $productos['username'];?></strong> Dijo:</p>
							

						<?php

						$date = $productos['fecha_comentario']; // aca va la fecha de cuando se inserto los registros
						$fecha = preg_replace('/:[0-9][0-9][0-9]/','',$date);
						$time = strtotime($fecha);

						?>

						<p style="Color: #474747;font-size:13px;" ><?php echo "Hace ".TimeSince($time, time());;?></p> 

					</div>
				</div>
				<div class="contenedor_contenido_comentario">
					<?php echo $productos['comentario'];?>
				</div>

			</div>
			</div>

				<?php }
				
				}
				?>


			<div clas="formulario_comentario">

				<?php if (empty($_SESSION)){?>

				<div class="contedor_comentario_form">
					<div class="sincomentarios">
						
					<p>Registrese <a href="singup.php">aqui</a> para comentar, o <a href="login.php">inicie sesión</a> para continuar</p>

					</div>

				</div>

				<?php } else { ?>
				<div class="contedor_comentario_form">
					<form action="insertar_comentario.php" method="post">

						<input type="hidden" value='<?php echo $id; ?>' name="id_producto">
						<input type="hidden" value='<?php echo $id_usuario; ?>' name="id_usuario">

						<textarea name="coment" id="" cols="50" rows="10"></textarea><br> 	
						
						<input id="comentar_boton" type="submit" value="Comentar">
							
					</form>
				</div>
				<?php }?>

			</div>

		
	</article>
		
</section>