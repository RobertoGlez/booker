
<?
	include('header.php');
	include ('conexion.php');
	$categoria=$_GET['categoria'];
	$consulta="select * from productos where categoria='$categoria'";
	$resultado=mysqli_query ($conexion,$consulta);
	$nfilas=mysqli_num_rows($resultado);


?>
<title>Booker - Genero <? echo $categoria ;?></title>
	<main class="contprincipal">
<!-- ____________________________________________ -->
<div class="divisor"></div>
<section  class="contcatego">
	<div class="bordercatego">
				<h2>Genero <? echo $categoria ;?></h2>
				<hr color="whitesmoke">
	</div>
	<article class="genero">

				<style>
					.contenedorimagen{
						display: flex;
						overflow: hidden;
						padding: 2px;
						margin: auto;
						text-align: center;

						-webkit-transition: all .2s ease;
				        -moz-transition: all .2s ease;
				        -ms-transition: all .2s ease;
				        -o-transition: all .2s ease;
				        transition: all .2s ease;
					}
					.contenedorimagen:hover img {
						transform: scale(1.05);

						-webkit-transition: all .2s ease;
				        -moz-transition: all .2s ease;
				        -ms-transition: all .2s ease;
				        -o-transition: all .2s ease;
				        transition: all .2s ease;
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
	
		}
		.link>button:hover:before {
		 left: 7px;
		}	
				</style>

	
			<? if ($nfilas>0) {?>
		<? while($f=mysqli_fetch_array($resultado)){?>



			<div class="librosgenero">

				<a href="./detalles.php?id=<? echo $f['id'];?>">
				<div class="contenedorimagen"> 
					<img class="imgcatego" src="./<? echo $f['imagen'];?>" >
				</div>
				</a>

					

					<h3><? echo $f['nombre'];?></h3>
					<hr color="black">

				<p class="xgdescripcion" align="center" style="font-size:25px;color:#767676;"> $ <? echo $f['precio']?> MXN
				</p>


				<a href="./carritodecompras.php?id=<?php  echo $f['id'];?>" class="link"><button>Añadir al carrito</button> </a>



			</div>

		<? }
		}else {?> 

		<p align="center"> <? echo "<span class='icon-cross'></span> <span class='icon-database'></span> No se encontraron libros en genero ".$categoria;?> </p>


		  <? }  ?>




</section>
<div class="divisor"></div>

				<br>
	 			<a href="categorias.php" style="color:white; font-size:15px; text-decoration:none; padding:10px; background-color:red; margin:10px;">
                    Regresar
                </a>
	<?
	include('footer.php');
	?>
	</main>
</body>
</html>






