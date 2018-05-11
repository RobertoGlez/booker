<?
		session_start();
		include 'header.php';
		include 'conexion.php';
		$id=$_GET['id'];
		$id_usuario=$_SESSION['id_usuario'];
		$re=mysqli_query($conexion,"select * from productos where id='$id'");
		$sql="SELECT * FROM marcadores WHERE id='$id' and id_usuario='$id_usuario'";
		$sql2="SELECT * FROM comentarioslibros WHERE id='$id'";
		
		$consulta=mysqli_query($conexion,$sql);
		$marcadores=mysqli_fetch_array($consulta);
		$marcado=$marcadores['marcado'];
		$poder_votar=false;
		$sesion_activa=$_SESSION['id_usuario'];
		if(empty($sesion_activa)){
			$poder_votar=false;
		}else{
			$poder_votar=true;
		}



?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Booker Detalle <??></title>

	<script type="text/javascript"  href="./Js/scripts.js"></script>
	<style>
		.link>button{
		 /*width:100%;*/ 
		 padding: 10px 35px;
		 overflow:hidden;
		 border: none;
		 background: #268c70;
		 color: #f2f2f2;
		 font-size: 18px;
		 border-radius: 5px;
		 position: relative;
		 box-sizing: border-box;
		 transition: all 500ms ease;
		}
		.link>button:before {
		 font-family: booker;
		 content:"\e93a";
		 position: absolute;
		 top: 11px;
		 left: -30px;
		 transition: all 200ms ease;
		}
		.link>button:hover {
		cursor: pointer;
		background-color: #11ae24;
		/*background-color:#D71717;*/
		/*background: rgba(0,0,0,0);
		color: #3a7999;
		box-shadow: inset 0 0 0 3px #3a7999;*/
		}
		.link>button:hover:before {
		 left: 7px;
		}
	</style>
</head>
<body>
	<header>

	</header>
	<section>
		
	<?
		while ($f=mysqli_fetch_array($re)) {
		?>
			<center>
				<div class="contenedordetalle" align="center">
					<div class="imagendetalle" align="center">
						<img src="./<?php echo $f['imagen'];?>" width="472" height="682">
					</div>
					
					<table border="0">
						<tr>
							<th colspan="2" align="center">Detalles del Producto</th>
						</tr>
						<tr>
							<th> 
								Nombre: 
							</th>
							<td> 
								<? echo $f['nombre'];?>
								
							</td>
						</tr>
						<tr>
							<th>
								Autor:
							</th>
							<td>
								<? echo $f['autor'];?>
							</td>
						</tr>
						<tr>
							<th>
								Editorial:
							</th>
							<td>
								<? echo $f['editorial'];?>
							</td>
						</tr>
						<tr>
							<th>
								Genero:
							</th>
							<td>
								<? echo $f['categoria'];?>
							</td>
						</tr>
						<tr>
							<th>
								Descripción:
							</th>
							<td>
								<? echo $f['descripcion'];?>
							</td>
						</tr>
						<tr>
							<th> 
								ISBR: 
							</th>
							<td>
								<? echo $f['ISBR'];?>
									
							</td>
						</tr>
						<tr>
							<th>
								Precio:
							</th>
							<td>
								<span class="icon-coin-dollar"></span>  <?php echo $f['precio'];?> MXN.
							</td>
						</tr>
						<tr>
							<th>
								Subido por:
							</th>
							<td>
								<span class="icon-user" style="padding: 1px;"></span> <? echo $f['user_upload'];?>
							</td>
						</tr>
						<tr>

							<th >
								Marcador <br>
								<p align="center"><span class="icon-stats-bars"></span> <? echo $f['votos'];?></p> 
							</th>
							<td align="center">
								<? if ($poder_votar==true) { ?>
								<!--  -->
								<form action="sistema_votos.php" method="post">

									

									<input type="hidden" name="producto" value="<? echo $f['id'];?>">
									
									
									

										<? if ($marcado)
										{
										

										echo "
										<span id='marcador_libro_like' class='icon-bookmark'></span>
										<input id='input_voto' type='submit' value='Desmarcar''>
										";

											
											} else {
											
											echo "
										<span id='marcador_libro_like' class='icon-bookmark'></span>
										<input id='input_voto' type='submit' value='Marcar'>
										";
								
											
												}


											}else{
												echo "
												<div style='color:red;font-size:15px;text-decoration:none;' align='center'>
													<p> No disponible </p>
													<a href='login.php'>Iniciar Sesion Aqui</a>
												</div>	
												";
											}

												?> 
												

								</form>
								<!--  -->
							</td>

						</tr>
				
						<tr>
							
							<td colspan="2" align="center">

								<a href="./carritodecompras.php?id=<?php  echo $f['id'];?>" class="link"><button>Añadir al carrito</button> </a>

							</td>
						</tr>
					</table>
					<br>



					

					
				</div>

				
			</center>
				<hr>
				<br>
						
						
						<input type="button" value="Regresar" onclick="history.back(-1)" lign="left" style="color:white; font-size:15px; text-decoration:none; padding:10px; background-color:red; margin:10px; border:none; cursor: pointer;
					"/>
		
	<?
		}
	?>
		
		

		
	</section>
	<section>
		<?php require_once 'comentarios.php'?>
	</section>
	<?
		include 'footer.php';
	?>
</body>	
</html>