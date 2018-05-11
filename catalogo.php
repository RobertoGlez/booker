<?
include('header.php');
include 'conexion.php';
session_start();


if (!empty($_SESSION))

{
    $id_usuario=$_SESSION['id_usuario'];
    $consulta="SELECT * FROM usuarios where id_usuario='$id_usuario'";
    $sql=mysqli_query($conexion,$consulta);
    $datos=mysqli_fetch_array($sql);




    if ($datos['admin']==true)
    {

$nombreusuario=$datos['username'];






//INSERTAR REGISTROS


include 'conexion.php';
if(isset($_REQUEST['nombre']) && !isset($_REQUEST['ideditar'])){
$id=$_REQUEST['id'];
$nombre=$_REQUEST['nombre'];
$descripcion=$_REQUEST['descripcion'];
$autor=$_REQUEST['autor'];
$editorial=$_REQUEST['editorial'];
$categoria=$_REQUEST['categoria'];
$ISBR=$_REQUEST['ISBR'];
$precio=$_REQUEST['precio'];
$user_upload=$_REQUEST['user_upload'];
$imagen=$_REQUEST['imagen'];






$dir = 'catalogo';
$imagen = $dir."/".$_FILES['imagen']['name'];
if (is_uploaded_file($_FILES['imagen']['tmp_name']))
{
    copy($_FILES['imagen']['tmp_name'],$imagen);
}


if (($_REQUEST['name'] !== "") && ($_REQUEST['categoria'] !== ""))
{

    if ( ($_REQUEST['precio']
  !== "") )   {


        //insertamos el registro
        $insertar="insert into productos (id, nombre, imagen, descripcion, autor, editorial, categoria, ISBR, precio, user_upload)
        values ('$id', '$nombre', '$imagen', '$descripcion', '$autor', '$editorial', '$categoria', '$ISBR', '$precio', '$user_upload')";

        mysqli_query($conexion,$insertar); ?>

        <script>
            alert('Libro Registrado')
        </script>
        <? echo "<script>window.location='catalogo.php'</script>";
    } else { ?>
        <script>
            alert("Hubo un error")
        </script>
        <? }
    }
}

    //CONSULTA DE REGISTROS
    include 'conexion.php';
    $consulta="select * from productos";
    $resulta=mysqli_query($conexion,$consulta);
    $nfilas=mysqli_num_rows($resulta);
    //ELIMINAR REGISTROS
    if(isset($_REQUEST['eliminar'])){
     $eliminar=$_REQUEST['eliminar'];
     mysqli_query($conexion, "delete from productos where id='$eliminar'");
     echo '<script>alert ("Registro borrado")</script>';
     echo "<script>window.location='catalogo.php'</script>";
     }

    //CONSULTAR EL REGISTRO A EDITAR
    if(isset($_REQUEST['editar'])){
         $editar=$_REQUEST['editar'];
         $registro=mysqli_query($conexion, "select * from productos where id='$editar'");
         $reg=mysqli_fetch_array($registro);
    }
        //actualiza el registro
        if (isset($_REQUEST['ideditar'])){
            $id=$_REQUEST['ideditar'];
            $imagen=$_REQUEST['imagen'];
            $descripcion=$_REQUEST['descripcion'];
            $autor=$_REQUEST['autor'];
            $editorial=$_REQUEST['editorial'];
            $categoria=$_REQUEST['categoria'];
            $ISBR=$_REQUEST['ISBR'];
            $precio=$_REQUEST['precio'];

            mysqli_query($conexion, "update productos set nombre='$nombre', imagen='$imagen', descripcion='$descripcion', autor='$autor',
            editorial='$editorial', categoria='$categoria', ISBR='$ISBR', precio='$precio' where id='$id'");
             echo "<script>alert('Registro actualizado');</script>";
            echo "<script>window.location='catalogo.php'</script>";
        }

        //admin conditional 



        } else 
        {

        header('location:mensaje.php');
        }

} else {

    header('location:index.php');
}



?>

<title>Booker - Catalogo</title>
<link rel="stylesheet" href="estiloscatalogo.css">
<body>
<main class="contprincipal">
<!-- ____________________________________________ -->
<div class="divisor"></div>
<section  class="contcatego">
	<div class="bordercatego">
				<h2>Catalago Productos</h2>

	</div>
		<article class="catalogoproductos">
			<div class="formulario">
				<br>
				<form action="catalogo.php" method="post" enctype="multipart/form-data">

                    <!-- Catalogos Input -->
                        <input type="text" name="id"
                        <? if (isset ($_REQUEST['editar'])){echo "value='".$reg[ 'id']. "' disabled='disabled' ";} else { echo "value='el ID es Automatico' disabled='disabled'" ;} ?>
                        placeholder="">

                        <input type="text" name="nombre"
                        <? if (isset ($_REQUEST['editar'])){echo "value='".$reg[ 'nombre']. "'";} ?>
                        placeholder="Nombre">

                        <input type="text" name="autor"
                        <? if (isset ($_REQUEST['editar'])){echo "value='".$reg[ 'autor']. "'";} ?>
                        placeholder="Autor">

                        <input type="text" name="editorial"
                        <? if (isset ($_REQUEST[ 'editar'])){echo "value='".$reg[ 'editorial']. "'";} ?>
                        placeholder="Editorial">

                        <!--<input type="hidden" name="descripcion"
                        <? //if (isset ($_REQUEST[ 'editar'])){echo "value='".$reg[ 'descripcion']. "'";} ?>
                        placeholder="Descripcion">-->

                        <textarea name="descripcion" id="" cols="30" rows="10" placeholder="Descripcion"><? if (isset ($_REQUEST[ 'editar'])){echo $reg[ 'descripcion'];} ?></textarea>



                        <select type="text" name="categoria">
                            <? if ($_REQUEST['editar']) {echo "<option value='".$reg['categoria']."' selected>".$reg['categoria']."</option>";}?>
                            <option value=""> Seleccione el Genero </option>
                            <option value="Arte">Arte</option>
                            <option value="Ciencia">Ciencia</option>
                            <option value="Ciencia Ficcion">Ciencia Ficcion</option>
                            <option value="Educacion">Educacion</option>
                            <option value="Fantasia">Fantasia</option>
                            <option value="Medicina">Medicina</option>
                            <option value="Romance">Romance</option>
                            <option value="Tecnologia">Tecnologia</option>

                        </select>


                        <input type="text" name="ISBR"
                        <? if (isset ($_REQUEST[ 'editar'])){echo "value='".$reg[ 'ISBR']. "'";} ?>
                        placeholder="ISBR">

                        <input type="text" name="precio"
                        <? if (isset ($_REQUEST[ 'editar'])){echo "value='".$reg[ 'precio']. "'";} ?>
                        placeholder="Precio">

    

                        <input type="file" name="imagen">
                        <? //pasamos una variable oculta llamada id la cual lleva el valor de id_libro
            				if(isset($_REQUEST['editar'])){echo"<input type='hidden'name='ideditar'value='".$reg['id']."'>";}
            			?>
                        <!-- Pasamos el usuario que subio -->

                        <input type="hidden" <? echo "value='".$nombreusuario."'";?> name="user_upload" >



                        <input type="submit"
                        <? if(isset($_REQUEST[ 'editar'])){echo "value=Guardar";} else { echo "value='Insertar'";}?>
                        id="boton">
                </form>
				<!-- Fin del Catalogo -->
				<br>
			</div>
			<div class="consultacatalogo">

				<hr color="white" size="10px" noshade="noshade" width="100%" style="border-radius:0px;">
					<h3 align="center">Tabla de Productos</h3>
					<hr color="white" size="10px" noshade="noshade" width="100%" style="border-radius:0px;">

				<table class="productostabla" border="0">
					<tr style="background-color:rgb(140,140,140); color:white;">
						<td width="10%" style="border-left: 1px solid white;border-right: 1px solid white;"><strong>ID Libro</strong></td>
						<td style="border-left: 1px solid white;border-right: 1px solid white;"><strong>Nombre</strong></td>
						<td style="border-left: 1px solid white;border-right: 1px solid white;"><strong>Autor</strong></td>
						<td style="border-left: 1px solid white;border-right: 1px solid white;"><strong>Genero</strong></td>
						<td style="border-left: 1px solid white;border-right: 1px solid white;"><strong>Editar</strong></td>
						<td style="border-left: 1px solid white;border-right: 1px solid white;"><strong>Eliminar</strong></td>
					</tr>

					<? while($libro=mysqli_fetch_array($resulta)){?>
                        <tr>
                            <td>
                                <a style="color:green;" href="detallesadmin.php?id=<? echo $libro['id'];?>">
                                   Ver  <span class="icon-book"></span> <? echo $libro['id'];?>
                                </a>
                            </td>
                            <td>
                                <? echo $libro['nombre']; ?>
                            </td>
                            <td>
                                <? echo $libro['autor']; ?>
                            </td>
                            <td>
                                <? echo $libro['categoria']; ?>
                            </td>
                            <td>
                                <a href="catalogo.php?editar=<? echo $libro['id'];?>">Editar </a>
                            </td>
                            <td>
                                <a style="color:red;" href="catalogo.php?eliminar=<? echo $libro['id'];?>"><span class=" icon-cross"></span></a>
                            </td>
                        </tr>

                        <? };?>
                            <tr>
                                <td colspan="6" align="center">Total de registros:
                                    <? echo $nfilas; ?>
                                </td>
                            </tr>
				</table>
              <input type="button" value="Regresar" onclick="history.back(-1)" lign="left" style="color:white; font-size:15px; text-decoration:none; padding:10px; background-color:red; margin:10px; border:none; cursor: pointer;
                    "/>
			<br>
            <br>
			</div>
		</article>
</section>

<div class="divisor"></div>
	<?
	include('footer.php');
	?>
	</main>
</body>
</html>


