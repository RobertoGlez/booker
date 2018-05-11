

<? include('header.php');
include ('conexion.php');


?>
<head>
<title>Booker - Productos</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript" src="./Js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./Js/scripts.js"></script>
	<main class="contprincipal">

</head>
<!-- ____________________________________________ -->
<body>
<div class="divisor"></div>




<section  class="contcatego">
	<div class="bordercatego">


				<h2>Todos los Productos</h2>




				<hr color="whitesmoke">
	</div>
<br>

		<article class="">

<!-- ____________________________________________ -->




	
	<section style="height: 100%;">
	<?

		
		$consulta="select * from productos";



		$re = mysqli_query($conexion,$consulta) or die (mysql_error());
		$nfilas=mysqli_num_rows($re);
		if ($nfilas>0){
		while ($f=mysqli_fetch_array($re)) {
		?> 
			
			<div class="producto">
			<!--<center>
				<img src="./productos/<?// echo $f['imagen'];?>"><br>
				<span><?// echo $f['nombre'];?></span><br>
				<a href="./detalles.php?id=<?// echo $f['id'];?>">ver</a>
			</center>-->
<!--___________________________________________________________________-->

			
			<div class="librosgenero">
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


					/* Clase de boton ver
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
							}*/

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
/
		}
		.link>button:hover:before {
		 left: 7px;
		}
				</style>

				
				<a href="./detalles.php?id=<? echo $f['id'];?>">
				<div class="contenedorimagen"> 
					<img class="imgcatego" src="./<? echo $f['imagen'];?>" >
				</div>
				</a>

					

					<h3><? echo $f['nombre'];?></h3>
					<hr color="black">
				<p class="xgdescripcion" align="center" style="font-size:25px;color:#767676;"> $ <? echo $f['precio']?> MXN
				</p>


				<!-- boton ver
				
				<a href="./detalles.php?id=<? //echo $f['id'];?>" class="link" style=""> <button> Ver </button></a> -->

				<a href="./carritodecompras.php?id=<?php  echo $f['id'];?>" class="link"><button>Añadir al carrito</button> </a>



			</div>

		<? }
		}else {?> <p align="center"> <? echo " <span class='icon-cross'></span> <span class='icon-database'> </span>No se encontraron libros registrados"?> </p>  <? }  ?>
		



<!--___________________________________________________________________-->


	








<!-- ____________________________________________ -->




		</article>



</section>








	<?
	include('footer.php');
	?>
	</main>
</body>
</html>


