<?
session_start();
include ('conexion.php');

$id_usuario=$_SESSION['id_usuario'];
$consulta="SELECT * FROM usuarios where id_usuario='$id_usuario'";
$sql=mysqli_query($conexion,$consulta);
$datos=mysqli_fetch_array($sql);
$admin=$datos['admin'];


if($admin==true){

include ('header.php');


if(isset($_REQUEST['titulo'])&& !isset($_REQUEST['id'])){

date_default_timezone_set('America/Mexico_City');


$titulo = $_REQUEST['titulo'];
$contenido = $_REQUEST['contenido'];

//insertamos el registro
$cons="select * from noticias";
if(trim(!$titulo=="") and trim(!$contenido=="")){
$insertar="insert into noticias (titulo,contenido) values ('$titulo', '$contenido')";
mysqli_query($conexion,$insertar) or die (mysql_error()."ERROR EN ENCONTRAR CONSULTA");

    echo "<script> alert('Noticia registrada')</script>";
    echo "<script>window.location='catalogonoticias.php'</script>";
}else{
    echo "<script> alert('Hubo un error, Debe llenar los campos')</script>";}

}



    //CONSULTA DE REGISTROS
    include 'conexion.php';
    $consulta="select * from noticias";
    $resulta=mysqli_query($conexion,$consulta);
    $nfilas=mysqli_num_rows($resulta);
    //ELIMINAR REGISTROS
    if(isset($_REQUEST['eliminar'])){
     $eliminar=$_REQUEST['eliminar'];
     mysqli_query($conexion, "delete from noticias where id_noticia='$eliminar'");
     echo '<script>alert ("Noticia borrada")</script>';
     echo "<script>window.location='catalogonoticias.php'</script>";
     }


    //CONSULTAR EL REGISTRO A EDITAR
    if(isset($_REQUEST['editar'])){
         $editar=$_REQUEST['editar'];
         $registro=mysqli_query($conexion, "select * from noticias where id_noticia='$editar'");
         $reg=mysqli_fetch_array($registro);
    }
        //actualiza el registro
        if (isset($_REQUEST['id'])){
            $id_noticia = $_REQUEST['id'];
            $titulo = $_REQUEST['titulo'];
            $contenido = $_REQUEST['contenido'];

            mysqli_query($conexion, "update noticias set titulo='$titulo', contenido='$contenido' where id_noticia='$id_noticia'");

            echo "<script>alert('Noticia actualizada');</script>";
            echo "<script>window.location='catalogonoticias.php'</script>";
        }
}else{
    echo "<script> window.location='mensaje.php'</script>";
}




?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Catalogo Noticias</title>
    <style>
    .menunoticia{
        margin-left: auto;
        margin-right: auto;
        width: 90%;
        padding: 30 px;

    }
    .menunoticia h1{
        font-family: Oswald-Light;
    }
    #form_cat_noticias input,
    #form_cat_noticias textarea{
        border:none;
        background-color: rgb(220,220,220);
        color :black;
        padding: 10px;
        margin: 15px;
       width: 300px;
       font-family: Sans-Narrow-Regular;
    }
    #guardar{

        cursor:pointer;
        background: rgb(30,125,215);
        color:white;
    }
    #guardar:hover{
        background-color: rgb(30,125,215);
        color:white;
    }
    table{
        font-family: Oswald-Light;

    }
    tr{
        background-color: rgb(200,200,200);
    }
    td{
        padding: 10px;
    }


    </style>
</head>
<body>
    <main class="contprincipal">
    <div class="divisor"></div>
    <div class="menunoticia">
        <br>
    <h1>Ingresar Nueva Noticia</h1>
	<form action="catalogonoticias.php" method="post" id="form_cat_noticias">

		<input type="text" name="titulo" <? if (isset ($_REQUEST['editar'])){echo "value='".$reg[ 'titulo']."'";} ?> 
        placeholder="Titulo de Noticia"><br>

    <!-- 		<input type="date" name"fecha" <?// if (isset ($_REQUEST[ 'editar'])){echo "value='".$reg[ 'fecha']. "'";} ?>
        placeholder="Fecha Y-M-D"> <br> -->

<!-- 		<input type="text" name="contenido" <? //if (isset ($_REQUEST[ 'editar'])){echo "value='".$reg[ 'contenido']. "'";} ?>
        placeholder="Cuerpo de Noticia"> -->

        <textarea name="contenido" class="" cols="30" rows="10" placeholder="Cuerpo de Noticia" ><? if (isset ($_REQUEST['editar'])){echo $reg[ 'contenido'];} ?></textarea>
        <br>



	   <input type="submit" <? if(isset($_REQUEST[ 'editar'])){echo "value='Guardar' ";} else { echo "value='Insertar' ";}?> id="guardar" name='guardar'>

       <? if(isset($_REQUEST['editar'])){echo"<input type='hidden'name='id'value='".$reg['id_noticia']."'>";}?>
	</form>
	<br>
	<table border="0">
		<tr style="background-color:rgb(100,125,63);">
			<td><strong>Eliminar</strong></td>
            <td><strong>Editar</strong></td>
			<td><strong>Noticia ID</strong></td>
			<td><strong>Titulo de noticia</strong></td>
			<td><strong>Fecha de Noticia</strong></td>
			<td><strong>Contenido de noticia</strong></td>
		</tr>
		<? while($noti=mysqli_fetch_array($resulta)){?>
                        <tr >
                        	<td>
                                <a href="catalogonoticias.php?eliminar=<? echo $noti['id_noticia'];?>">Eliminar</a>
                            </td>
                            <td>
                                <a href="catalogonoticias.php?editar=<? echo $noti['id_noticia'];?>"> Editar </a>
                            </td>
                            <td>
                                <? echo $noti['id_noticia'];?>
                            </td>
                            <td>
                                <? echo $noti['titulo']; ?>
                            </td>
                            <td>


                                <? 

                                    //Acomodamos la fecha

                                    $fecha=explode("-",$noti['fecha']);
                                    $dia_hora=$fecha[2];

                                    switch ($fecha[1]) {
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

                                    
                                    $mes=$valormes;

                                    $ano=$fecha[0];
                                    $Div_hora_dia=explode(" ",$dia_hora);
                                    $horaminutosegundo=$Div_hora_dia[1];
                                    $dia=$Div_hora_dia[0];
                                    $div_horas=explode(":" ,$horaminutosegundo);
                                    $segundo=$div_horas[2];
                                    $minuto=$div_horas[1];
                                    $hora=$div_horas[0];



                                echo $dia." de ".$mes." del ".$ano." a las ".$hora.":".$minuto." Hrs"; 


                                ?>




                            </td>
                            <td>
                                <? echo $noti['contenido']; ?>
                            </td>

                        </tr>

                        <?;}?>
						<tr>
                             <td colspan="6" align="center">Total de registros:
                                <? echo $nfilas; ?>
                            </td>
                        </tr>
    </table>
    </div>
</main>
	<br>
    <div class="divisor"></div>
    <br>
				 <a href="usuario.php" style="color:white; font-size:15px; text-decoration:none; padding:10px; background-color:red; margin:10px;">
                   Regresar
                </a>
                <?
                include 'footer.php';
                ?>
                <br>
                <br>
</body>
</html>