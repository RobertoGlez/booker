<?php
require 'conexion.php';
session_start();
if(!empty($_SESSION['username'])){
	$consulta="select * from usuarios where username='$_SESSION[username]' and id_usuario='$_SESSION[id_usuario]'";
	$resultado=mysqli_query($conexion,$consulta);
	$datos=mysqli_fetch_array($resultado);
	$nombreusuario=$_SESSION['username'];
	$id_usuario=$_SESSION['id_usuario'];

// Obtener fecha de la bd y calcular edad
	
	//definimos la zona de horarios por default del servidor

	date_default_timezone_set('America/Mexico_City');

	$dia=date(j);
	$mes=date(n);
	$ano=date(Y);


	$nacimiento=explode("-",$datos["fecha_Nac"]);

	$dianac=$nacimiento[2];
	$mesnac=$nacimiento[1];
	$anonac=$nacimiento[0];
	//si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual
	if (($mesnac == $mes) && ($dianac > $dia)){
	$ano=($ano-1);}
	//si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual
	if ($mesnac > $mes){
	$ano=($ano-1);}
	//ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad

	//case que cambia numeros por nombres

        switch ($mesnac[1]) {
        case '01':
            $valormes="Enero";
            break;

        case '02':
            $valormes="Febrero";
            break;

        case '03':
            $valormes="Marzo";
            break;

        case '04':
            $valormes="Abril";
            break;

        case '05':
            $valormes="Mayo";
            break;

        case '06':
            $valormes="Junio";
            break;

        case '07':
            $valormes="Julio";
            break;

        case '08':
            $valormes="Agosto";
            break;

        case '09':
            $valormes="Septiembre";
            break;

        case '10':
            $valormes="Octubre";
            break;

        case '11':
            $valormes="Noviembre";
            break;

        case '12':
            $valormes="Diciembre";
            break;
        
        default:
            $valormes="Null";
            break;
    }

    //extraemos los valores del nacimiento

    $user_dia=$dianac;
    $user_mes=$valormes;
    $user_ano=$anonac;


////////////////////////////////////////////////////////
/////se guardan los datos//////
////////////////////////////////////////////////////////


	$edad=($ano-$anonac);
	//Obtenemos los demas datos del array
	$nombre=$datos['nombre'];
	$apellidoP=$datos['apellidoP'];
	$apellidoM=$datos['apellidoM'];
	$email=$datos['email'];
	$imagen_usuario=$datos['imagen_usuario'];
	$admin=$datos['admin'];


	//consulta de sus marcadores 

$marcadores="DELETE FROM marcadores where id_usuario='$id_usuario' and marcado=false";
$consulta_marcadores=mysqli_query($conexion,$marcadores);




$libros="SELECT productos.*, marcadores.*
        FROM 
        	marcadores
        inner join 
        	productos 
        on 
        	productos.id=marcadores.id
        and
			marcadores.id_usuario='$id_usuario'
		and
			marcadores.marcado=true;";

$consulta_libros=mysqli_query($conexion,$libros);
$nfilas=mysqli_num_rows($consulta_libros);


//eliminar marcador 

if (isset($_REQUEST['delete'])) {

	
	$delete=$_REQUEST['delete'];
	$sql="DELETE FROM marcadores WHERE id='$delete' AND id_usuario='$id_usuario'";
	$eliminar=mysqli_query($conexion,$sql);
	//restar voto
	$consulta_producto="SELECT * FROM productos WHERE id = '$delete'";
	$query_producto=mysqli_query($conexion,$consulta_producto);
	$datos_produc=mysqli_fetch_array($query_producto);

	$votos_actuales=$datos_produc['votos'];
	$votos=$votos_actuales-1;

	$update_voto= "UPDATE productos SET votos='$votos' WHERE id='$delete' ";
	$ejecutar_update= mysqli_query($conexion, $update_voto);


	if($eliminar){
		echo '<script>alert ("Marcador borrado")</script>';
   		echo "<script>window.location='usuario.php'</script>";
	}
		echo "hubo un error ".mysql_error();
}



 //ACTUALIZACION DE DATOS

if(isset($_REQUEST['editar'])){

	if(isset($_REQUEST['editarnombre'])){

			
			$nombre=$_REQUEST['editarnombre'];
			$consulta_act="UPDATE productos set nombre='$nombre' WHERE id_usuario='$id_usuario'";
			$sql=mysqli_query($conexion,$consulta_act);
			echo "<script>alert('Registro actualizado');</script>";
		
	}else{
		echo "Error";
	}



	

}


}else{
	
	header('location:index.php');
}


?>

<html>
<? require 'header.php'; ?>
<title> Usuario <? echo $nombreusuario ; ?> </title>
<script>


</script>

<body>
	<div>

		<section class="section_usuario" id="ver">
			
			

			<article class="article_usuario"  >

				<div class="contenedor-all">

					<div class="contenedor-imagen" align="center">
						<div class="imagen_usuario">
							<a href="" title="Foto de Perfil">
							<img src="<?php echo $imagen_usuario.'"'; ?> alt="" width="200" height="200" title="Ver Foto">
							</a>
						</div>
							<a href="" class="Cambiarfoto" title="Subir Nueva Foto"><!--Cambiar Foto--></a>
							
					</div>

					<div class="contenedor-datos-usuario">

					
						<!-- Titulo usuario -->
						<h1> Administracion de Usuario</h1> 
							<br>
						<!-- Contenedor de las pestañas -->
						<div class="contenedor_links">
							<a title="Ver Datos de Usuario">
							<span class="icon-profile"></span>
							Datos
							</a>
							<a title="Ver Libros Guardados">
							<span class="icon-books"></span>
							Marcadores (<?echo $nfilas;?>)</a>
							<?php if ($admin==true){?>

							<a style="background:#84A1FF;" title="Ver Opcines de Administrador">
							<span class="icon-key"></span>
							Administrador</a>


							<?php } ?>
						</div>
						<!-- Contenedor de los Contenidos de las pestañas -->
						<div class="contenedor_tablas">

							<div class="contenedor_items" id="seccion-datos">
								<h2>Datos del Usuario:<span style="color:#5369B0;"><span class="icon-user"></span><?php echo $nombreusuario;?></span></h2>
								
									

								<form action="usuario.php" method="post">
								<table border="0" class="tabla_usuario_contenedor">
									<tr>
										<td colspan="3" align="center" style="background: #4260C0;color:white;">
											<p class="nombre_usuario">
								
											<?php echo $nombre." ".$apellidoP." ".$apellidoM; ?> 
											</p>


										 </td>
										
									</tr>
									<tr>
										<th>
											Nombre:
										</th>
											<?php if ($_REQUEST['editar'])
											{
												?>
											
											<td style="padding: 0px;">
											<input type="text" name="editarnombre" value="<?php echo $nombre;?>" class="input_datos" >

											</td>

												<?	}else {?>

													<td>
													<?echo $nombre;?>
													</td>
													<?}?>
											<?php  if ($_REQUEST['editar']){?>
											<td style="padding: 0px;">
												<button value="guardar" class="guardar_usuario">Guardar</button>
											</td>
											

												<?php } else {?>
										
									<!-- 	<td style="padding: 0px;">		
											<a href="usuario.php?editar=<? //echo $nombre; ?>" class="editar_usuario" >Editar</a>
										</td> -->

												<?php }?>
									</tr>
									<tr>
										<th>
											Apellido Paterno:
										</th>
										<td>
											<?php echo $apellidoP?>
										</td>
									</tr>
									<tr>
										<th>
											Apellido Materno:
										</th>
										<td>
											<?php echo $apellidoM?>
										</td>
									</tr>
									<tr>
										<th>
											Edad:
										</th>
										<td>
											<?php echo $edad;

												if($edad>1){
													echo " años";
												}else{
													echo " año";
												}
												?> 
										</td>

									</tr>
									<tr>
										<th>
											Fecha de nacimiento:
										</th>
										<td>
												
						
											<?php


											if ($user_ano>2000){
												$del=" del ";
											}else{
												$del=" de ";
											}


											echo $user_dia." de ".$user_mes.$del.$user_ano;?>




										</td>
									</tr>
									<tr>
										<th>
											Correo:
										</th>
										<td>
											<?php echo $email;?>
										</td>
									</tr>
								</table>
								</form>
							</div>
							
	 
							<div class="contenedor_items" id="seccion-marcadores">
								<h2>Libros Guardados: <?echo $nfilas;?> Marcadores</h2>
								<br>
								<div class="marcadores-scroll">
									<ul>
											<?php
											//Consulta de marcadores
											//
											while($datos_libro=mysqli_fetch_array($consulta_libros))
												{
											?>
				
											<li> 
											
											<a href="detalles.php?id=<? echo $datos_libro['id'];?>" class="link_name">
											<span class="icon-book"></span> 
												<?php echo $datos_libro['nombre']?>
											</a> <a href="usuario.php?delete=<?echo $datos_libro['id'];?>" class="link_delete"><span class="icon-cross"span></a>
											</li>
	

											<?php
												}
											?>
									</ul>

								</div>
							</div>



							<?php if ($admin==true)
							{						
							?>

							<div class="contenedor_items" id="seccion-administrador" style="background:#84A1FF;">
								<h2>Opciones de Administrador</h2>
								
								<hr style="color:white;border:none; background: white;height: 5px;" >
								<br>
								

								<ul>
								 	<li><a href="catalogo.php"><span class="icon-book"></span> Catalogo de Libros</a></li>
								 	<li><a href="catalogonoticias.php"> <span class="icon-newspaper"></span> Catalogo de Noticias</a></li>

								 	<?php if ($_SESSION['id_usuario']==1){

								 		
								 	?>
								 	<li><a href="catalogousuarios.php"><span class="icon-address-book"></span> Catalogo de Usuarios</a></li>
								 	<?php
								 }else{
								 	
								 }
								 	?>

								 	<li><a href="catalogocomentarios.php"><span class="icon-envelop"></span> Catalogo de Comentarios</a></li>
								</ul>
							</div>

							<?
							}

							?>





						</div>
					</div>
			</div>
			</article>
			<br>	
		</section>

	</div>
<?php require 'footer.php';?>
<script src="Js/tabs.js"></script>
</body>


</html>