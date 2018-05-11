<?
include ('conexion.php');
include ('header.php');
include 'funciones.php';
    $consulta="select * from comentarios";
    $resulta=mysqli_query($conexion,$consulta);
    $nfilas=mysqli_num_rows($resulta);
    include 'conexion.php';
    //ELIMINAR REGISTROS
    if(isset($_REQUEST['eliminar'])){
     $eliminar=$_REQUEST['eliminar'];
     mysqli_query($conexion, "delete from comentarios where id_comentario='$eliminar'");
     echo '<script>alert ("Comentario borrado")</script>';
     echo "<script>window.location='catalogocomentarios.php'</script>";
     }

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Catalogo Mensajes</title>
    <style>
    .menucomentarios{
        width: 80%;
        font-family: Sans-Narrow-Regular;
        padding: 20px;
        margin-right: auto;
        margin-left: auto;
    }
    td{
        background-color: rgb(220,220,220);
        padding: 10px;
    }
    th{
        background-color: rgb(200,200,200);
        padding: 10px;
    }
    </style>
</head>
<body>
    <main class="contprincipal"> 
    <div class="divisor"></div>
    <div class="menucomentarios">
	<h1>Comentarios </h1>
	<br>
    <table border="0">
        <tr>
            <th>ELIMINAR</th>
            <th>ID COMENTARIO</th>
            <th>FECHA</th>
            <th>USUARIO</th>
            <th>TITULO</th>
            <th>CONTENIDO</th>
        </tr>
        <? while($comen=mysqli_fetch_array($resulta)){?>
                        <tr>
                            <td>
                                <a style="text-decoration: none;" href="catalogocomentarios.php?eliminar=<? echo $comen['id_comentario'];?>"><span class="icon-cross" style="color:red;"></span></a>
                            </td>

                            <td>
                                <? echo $comen['id_comentario'];?>
                            </td>
                            <td>
                                <? echo CalcularFecha($comen['fecha']); ?>
                            </td>
                            <td>
                                
                                    <?
                                    if(empty($comen['nombreanonimo'])){
                                    echo "Anonimo";
                                    }else{

                                    echo $comen['nombreanonimo'];
                                    }


                                    ?>
                            </td>
                            <td>
                                <? echo $comen['titulo']; ?>
                            </td>
                            <td>
                                <? echo $comen['contenido']; ?>
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
    <br>
    
    <div class="divisor"></div>
    <br>
                 <a href="usuario.php" style="color:white; font-size:15px; text-decoration:none; padding:10px; background-color:red; margin:10px;">
                   Regresar
                </a>
                <?
                include ('footer.php');
                ?>
                <br>
                <br>
</body>
</html>