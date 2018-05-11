<?
include ('header.php');
include ('conexion.php');
session_start();

//mensajeadmin.php
if($_SESSION['id_usuario']==1){


if(isset($_REQUEST['username'])&& !isset($_REQUEST['id'])){

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$admin = $_REQUEST['admin'];


//insertamos el registro
$cons="select * from usuarios";
if(trim(!$username=="") and trim(!$password=="")){
$insertar="insert into usuarios (username,password,admin) values ('$username', '$password','$admin')";
mysqli_query($conexion,$insertar) or die (mysql_error()."ERROR EN REGISTRAR USUARIO");

    echo "<script> alert('USUARIO REGISTRADO')</script>";
    echo "<script>window.location='catalogousuarios.php'</script>";
}else{
    echo "<script> alert('Hubo un error, Debe llenar los campos')</script>";}

}



    //CONSULTA DE REGISTROS
    include 'conexion.php';
    $consulta="select * from usuarios";
    $resulta=mysqli_query($conexion,$consulta);
    $nfilas=mysqli_num_rows($resulta);
    //ELIMINAR REGISTROS
    if(isset($_REQUEST['eliminar'])){
     $eliminar=$_REQUEST['eliminar'];
     mysqli_query($conexion, "delete from usuarios where id_usuario='$eliminar'");
     echo '<script>alert ("Usuario Borrado")</script>';
     echo "<script>window.location='catalogousuarios.php'</script>";
     }


    //CONSULTAR EL REGISTRO A EDITAR
    if(isset($_REQUEST['editar'])){
         $editar=$_REQUEST['editar'];
         $registro=mysqli_query($conexion, "select * from usuarios where id_usuario='$editar'");
         $reg=mysqli_fetch_array($registro);
    }
        //actualiza el registro
        if (isset($_REQUEST['id'])){

		$id_usuario = $_REQUEST['id'];
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
        $admin=0;
        if($_REQUEST['admin']==on){
            $admin=1;
        }else{
            $admin=0;
        }



            mysqli_query($conexion, "update usuarios set username='$username', password='$password', admin='$admin' where id_usuario='$id_usuario'");

            echo "<script>alert('USUARIO ACTUALIZADO');</script>";
            
            echo "<script>window.location='catalogousuarios.php'</script>";
        }
    }else{

     header('location:mensajeadmin.php');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Catalogo Noticias</title>
    <style>
    #form_cat_usuarios input {
        font-family: Sans-Narrow-Regular;

        background-color: rgb(220,220,220);
    }
    .admincheck{
        font-size: 20px;
    }
    label{
        font-family: RobotoSlab-Regular;
        font-size: 15px;
        padding: 10px;
    }
    .botonform{
                width: 250px;
        border: none;
        padding: 10px;
        margin: 10px;
    }
    .menuusuarios{
        width: 70%;
        margin-right: auto;
        margin-left: auto;
        margin-top: 100px;
        margin-bottom: 100px;
    }
    h1{
        font-family: Sans-Narrow-Regular;
    }

#guardar{
    cursor: pointer;
}
#guardar:hover{
    background-color: rgb(30,125,215);
    color:white;
}
td{
    background-color: rgb(220,220,220);
    padding: 10px;
}
table{
    font-family: Sans-Narrow-Regular;
}

    </style>
</head>
<body>
    <main class="contprincipal">
        <div class="divisor"></div>
        <div class="menuusuarios">
	<h1>Ingresar Usuarios</h1>
    <br>
	<form action="catalogousuarios.php" method="post" id="form_cat_usuarios">

		<input class="botonform" type="text" name="username" <? if (isset ($_REQUEST['editar'])){echo "value='".$reg[ 'username']."'";} ?>
        placeholder="Nombre de Usuario"><br>
		<input class="botonform" type="password" name="password" <? if (isset ($_REQUEST[ 'editar'])){echo "value='".$reg[ 'password']. "'";} ?>
        placeholder="Contraseña de Usuario"><br>
        
        <label for="name">Permisos de Administrador</label>
        <input type="checkbox" name="admin" class="admincheck"  <? if (isset ($_REQUEST['editar']))
        {

            if ($reg['admin']==true)
                {
                    echo " checked='checked' ";
                }else {
                    echo " ";
                }
        } 
        ?>><br>

       <input class="botonform" id="guardar" type="submit" <? if(isset($_REQUEST[ 'editar'])){echo "value='Guardar' ";} else { echo "value='Insertar' ";}?> name='guardar'>

       <? if(isset($_REQUEST['editar'])){echo"<input type='hidden'name='id'value='".$reg['id_usuario']."'>";}?>
	</form>
	<br>
	<table border="0">
		<tr>
			<td>Eliminar</td>
            <td>Editar</td>
            <td>ID USUARIO</td>
			<td>Usuario</td>
			<td>Password</td>
            <td>Estado</td>

		</tr>
		<? while($user=mysqli_fetch_array($resulta)){
                if ($user['id_usuario']==1 && $user['username']=="admin"){

                }else{


        ?>
                        <tr>
                        	<td>
                                <a href="catalogousuarios.php?eliminar=<?php echo $user['id_usuario'];?>">Eliminar</a>
                            </td>
                            <td>
                                <a href="catalogousuarios.php?editar=<?php echo $user['id_usuario'];?>"> Editar </a>
                            </td>
                            <td>
                                <?php echo $user['id_usuario'];?>
                            </td>
                            <td>
                                <?php echo $user['username'];?>
                            </td>
                            <td>
                                <?php echo $user['password']; ?>
                            </td>
                            <td>
                                <?php if ($user['admin']==0)
                                    {
                                        echo "<p style='color:red;'>User</p>";
                                    }
                                    else 
                                    {
                                        echo "<p style='color:green;'>Admin</p>";
                                    }
                                ?>
                            </td>

                        </tr>

                        <?
                            }
                        }?>
						<tr>
                             <td colspan="6" align="center">Total de registros:
                                <? echo $nfilas; ?>
                            </td>
                        </tr>

	</table>
    </div>
	<br>
	<br>
    <div class="divisor"></div>
    </main>
    <br>

				 <a href="usuario.php" style="color:white; font-size:15px; text-decoration:none; padding:10px; background-color:red; margin:10px;">
                   Regresar
                </a>
                <?
                include'footer.php';
                ?>
                <br>
                <br>
</body>
</html>