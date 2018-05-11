<?php
	session_start();

	include './conexion.php';
	if(isset($_SESSION['carrito'])){
		if(isset($_GET['id'])){
					$arreglo=$_SESSION['carrito'];
					$encontro=false;
					$numero=0;
					for($i=0;$i<count($arreglo);$i++){
						if($arreglo[$i]['Id']==$_GET['id']){
							$encontro=true;
							$numero=$i;
						}
					}
					if($encontro==true){
						$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
						$_SESSION['carrito']=$arreglo;
					}else{
						$nombre="";
						$precio=0;
						$imagen="";
						$re=mysqli_query($conexion,"select * from productos where id=".$_GET['id']);
						while ($f=mysqli_fetch_array($re)) {
							$nombre=$f['nombre'];
							$precio=$f['precio'];
							$imagen=$f['imagen'];
						}
						$datosNuevos=array('Id'=>$_GET['id'],
										'Nombre'=>$nombre,
										'Precio'=>$precio,
										'Imagen'=>$imagen,
										'Cantidad'=>1);

						array_push($arreglo, $datosNuevos);
						$_SESSION['carrito']=$arreglo;

					}
		}




	}else{
		if(isset($_GET['id'])){
			$nombre="";
			$precio=0;
			$imagen="";
			$re=mysqli_query($conexion,"select * from productos where id=".$_GET['id']);
			while ($f=mysqli_fetch_array($re)) {
				$nombre=$f['nombre'];
				$precio=$f['precio'];
				$imagen=$f['imagen'];
			}
			$arreglo[]=array('Id'=>$_GET['id'],
							'Nombre'=>$nombre,
							'Precio'=>$precio,
							'Imagen'=>$imagen,
							'Cantidad'=>1);
			$_SESSION['carrito']=$arreglo;
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<? include 'header.php'; ?>
<head>
	<meta charset="utf-8"/>
	<title>Booker - Carrito de Compras</title>
	
	<script type="text/javascript" src="Js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  src="./Js/scripts.js"></script>
	<style>
		.aceptar{
			 border: none;
			 background: #D71717;
			 color: #f2f2f2;
			 padding: 10px;
			 font-size: 18px;
			 border-radius: 5px;
			 position: relative;
			 box-sizing: border-box;
			 transition: all 500ms ease;
		}


		.aceptar:hover {
		cursor: pointer;
		background: rgba(0,0,0,0);
		color: #D71717;
		box-shadow: inset 0 0 0 3px #D71717;
		}
		.imagecarrito{
			width:260px;
			height:350px;
		}
		.producto{
			overflow:hidden;
			padding:10px;
			background-color: #f2f2f2;
			width: 100%;
			margin:auto;
			float: left;
			box-sizing: flex;
			font-family: RobotoSlab-Regular; 
		}
		.contproducto{
			border-radius:10px;
			margin:10px;
			display:inline-block;
			width:20%;
			background-color:#475AFF;
			color: #fff;
			padding: 30px 20px;
			
			
		}
		.libros{
			margin: 10px;
		}
		.libros>span{
			padding: 2px 10px;
		}
		.cantidad{

			  border: 1px solid #DBE1EB;
			  font-size: 15px;
			  font-family: Arial, Verdana;
			  padding-left: 7px;
			  padding-right: 7px;
			  padding-top: 10px;
			  padding-bottom: 10px;
			  border-radius: 4px;
			  -moz-border-radius: 4px;
			  -webkit-border-radius: 4px;
			  -o-border-radius: 4px;
			  background: #FFFFFF;
			  background: linear-gradient(left, #FFFFFF, #F7F9FA);
			  background: -moz-linear-gradient(left, #FFFFFF, #F7F9FA);
			  background: -webkit-linear-gradient(left, #FFFFFF, #F7F9FA);
			  background: -o-linear-gradient(left, #FFFFFF, #F7F9FA);
			  color: #2E3133;
		}
		.eliminar{
			 	
		}
	</style>
}
</head>
<body>
	<header>
		<img src="">
		<a href="./carritodecompras.php" title="ver carrito de compras">
			<img src="">
		</a>
	</header>
	<section>
		<?php
			$total=0;
			if(isset($_SESSION['carrito'])){
			$datos=$_SESSION['carrito'];
			?>
			<div class="producto">

			<?
			$total=0;
			for($i=0;$i<count($datos);$i++){
				
	?>
				
					<div class="contproducto">
						<div class="libros">
						<img src="./<?php echo $datos[$i]['Imagen'];?>" class="imagecarrito"><br><br>
						<span ><?php echo $datos[$i]['Nombre'];?></span><br>
						<span>Precio: $ <?php echo $datos[$i]['Precio'];?></span><br>
						<span>Cantidad: 
							<input type="number" min="1" max="1000" value="<?php echo $datos[$i]['Cantidad'];?>"
							data-precio="<?php echo $datos[$i]['Precio'];?>"
							data-id="<?php echo $datos[$i]['Id'];?>"
							class="cantidad">
						</span><br>
						<span class="subtotal">Subtotal: $<?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?> </span><br><br>
						<a href="#" class="eliminar" data-id="<?php echo $datos[$i]['Id']?>">		Eliminar</a>
						</div>
					</div>
			<?php
				$total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
			}
				?></div><br><?
				
			}else{
				echo '<center><h2>No has añadido ningun producto</h2></center>';
			}
			echo '<center><h2 id="total">Total: $ '.$total.' MXN</h2></center>';
			if($total!=0){
					//echo '<center><a href="./compras/compras.php" class="aceptar">Comprar</a></center>';
			?>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="formulario">
					<input type="hidden" name="cmd" value="_cart">
					<input type="hidden" name="upload" value="1">
					<input type="hidden" name="business" value="booker_store@gmail.com">
					<input type="hidden" name="currency_code" value="MXN">
					
					<?php 
						for($i=0;$i<count($datos);$i++){
					?>
						<input type="hidden" name="item_name_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Nombre'];?>">
						<input type="hidden" name="amount_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Precio'];?>">
						<input	type="hidden" name="quantity_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Cantidad'];?>">	
					<?php 
						}
					?>
						
					<? if (!empty($_SESSION['id_usuario'])) { ?>
					<center><input type="submit" value="Comprar" class="aceptar" style="width:200px"></center>
					<?  } else { ?>
					<br>
						<center><a href="login.php" class="aceptar" style="text-decoration:none;width:200px; margin: 2px; background-color: #ddd; color: black;"> Inicie sesion para Comprar</a></center>
					<br>
					<?}?>

			</form>
			<?php
			}
			
		?>
		<center><input type="button" value="Volver Catalogo" onclick="history.back(-1)" lign="left" style="color:white; font-size:15px; text-decoration:none; padding:10px; background-color:red; margin:10px; border:none; cursor: pointer;
					"/></center>

		
	</section>
	<? include 'footer.php'; ?>
</body>
</html>