<?php
	session_start();

  	include_once("gestionBD.php");
 	include_once("gestionarUsuarios.php");

	if (isset($_POST['submit'])){
		$email= $_POST['email'];
		$pass = $_POST['pass'];

		$conexion = crearConexionBD();
		$num_usuarios = consultarUsuario($conexion,$email,$pass);
		cerrarConexionBD($conexion);

        if($num_usuarios>0) $login="error";
        else{
            $_SESSION['login']=$email;
            Header("Location: index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Promocion Sanlucar: Inicio de Sesion</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700&display=swap" rel="stylesheet">
    </head>
    <body>
        <main>
            <?php if (isset($login)) {
	           echo "<div class=\"error\">";
	            echo "Error en la contraseña o no existe el usuario.";
	            echo "</div>";
	        }
	        ?>

        <div class="iniciosesion">
		    <a href="../index.php"><img class="img-login" src="images/logo.png" alt="Promociones Sanlúcar" /></a>
		    <form action="login.php" method="post">
			     <div class="input-group"><label for="email">Email: </label><input type="text" name="email" id="email" /></div>
			     <div class="input-group"><label for="pass">Contraseña: </label><input type="password" name="pass" id="pass" /></div>
			     <input class="boton" type="submit" name="submit" value="Iniciar Sesion" />
		   </form>

		<p>¿No estás registrado? <a href="registroWeb.php">¡Registrate!</a></p>
		<p>Inicia Sesion como <a href="loginEmpleados.php">Empleado </a></p>
	</div>


        </main>
    </body>
</html>
