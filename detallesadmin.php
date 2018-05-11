<?
		include 'header.php';
		include 'conexion.php';
		$id=$_GET['id'];
		$re=mysqli_query($conexion,"select * from productos where id='$id'");
		


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
		 background: #3a7999;
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
		background-color:#D71717;
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
				<div class="contenedordetalle">
					<div class="imagendetalle">
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
							
							<td colspan="2" align="center">

								<p class="link"> Subido por: <strong><? echo $f['user_upload'] ;?> </strong></p>

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
	<?
		include 'footer.php';
	?>
</body>
</html>