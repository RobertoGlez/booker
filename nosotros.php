

<?php include('header.php');
$consulta= "select *from usuarios";
$res=mysqli_query($conexion, $consulta);

?>
<title>Nosotros</title>
	<main class="contprincipal">
<!-- ____________________________________________ -->
<div class="divisor"></div>
<section  class="contcatego">
	<div class="bordercatego">
				<h2>Nosotros</h2>
				<hr color="whitesmoke">
	

		<article id="nosotros">
			<p>Booker Inc. Es una empresa de venta y distribución de libros de diferentes cateorias con el fin de ofrecer el mejor servicio de ventas por internet, conseguir la confianza de nuestros clientes.
				<br> Este proyecto originalment fue planeado como medio de distribucion de libros de programacion pero al ver la demanda del mercado en varias categorias y sub-categorias se decidio ampliar 
				la base de datos que se tenia planeada desde un principio.</p>
			<h3>Misión</h3>
			<p>
				Distribuir información a quien la requiere mediante intertnet y ofrecer medios fisicos como digitales con el fin de difundir la información de mas relevancia para con el publico en general.
			</p>
			<h3>Visión</h3>
			<p>
			Colocarnos como la empresa numero uno a nivel nacional distribuidora de libros digitales atravez de internet.
			</p>
		</article>
</section>
<div class="divisor"></div>



	<?
	include('footer.php');
	?>
	</main>
</body>
</html>


