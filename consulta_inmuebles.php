<?php
session_start();

require_once ("gestionBD.php");
require_once ("gestionarInmuebles.php");

if(!isset($_SESSION['login']) && !isset($_SESSION['loginEmpleado'])) {
	header("Location: login.php");
} else {
	if(isset($_SESSION["inmueble"])) {
		$inmueble = $_SESSION["inmueble"];
		unset($_SESSION["inmueble"]);
	}

    $conexion=crearConexionBD();

    $filas=consultarTodosInmuebles($conexion);
    cerrarConexionBD($conexion);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Gestion De Promociones Sanlucar: Lista Inmuebles</title>
        <link rel="stylesheet" type="text/css" href="css/consultaInmueble.css">
    </head>
    <body>
        <?php
            include_once("cabecera.php");
        ?>

        <section class="contenido">
	           <?php if(!isset($_SESSION['loginEmpleado'])){ ?>
		            <div class="inserta">
			              <h2><a href="registroInmueble.php"> INSERTAR INMUEBLE </a></h2>
		            </div>
	           <?php } ?>


        <h1>Lista de Inmuebles: </h1>

	    <div class="inmuebles">
		    <?php
			    foreach($filas as $fila) {
					echo $fila["ID_INMUEBLE"];
		     ?>
		    <form method="post" action="controlador_inmuebles.php">
		    <div class="inmueble">
			    <div class="nameBx">
				    <img src="/images/casa.jpg" width="300px">
			    </div>
			    <div class="infoBx">
				    <!-- <input id="ID_INMUEBLE" name="ID_INMUEBLE" type="hidden" value="<?php echo $fila["ID_INMUEBLE"]; ?>"/> -->
				    <h2>Inmueble: <b><?php echo $fila["ID_INMUEBLE"]; ?></b></h2>
				    <!-- <input id="DIRECCION" name="DIRECCION" type="hidden" value="<?php echo $fila["DIRECCION"]; ?>"/> -->
				    <p>Direccion: <b><?php echo $fila["DIRECCION"]; ?></b></p>
				    <!-- <input id="HABITACIONES" name="HABITACIONES" type="hidden" value="<?php echo $fila["HABITACIONES"]; ?>"/> -->
				    <p>Numero de habitaciones: <b><?php echo $fila["HABITACIONES"]; ?></b></p>
				    <!-- <input id="TIPO" name="TIPO" type="hidden" value="<?php echo $fila["TIPO"]; ?>"/> -->
				    <p>Tipo de inmueble: <b><?php echo $fila["TIPO"]; ?></b></p>

				    <?php if(!isset($_SESSION['loginEmpleado'])){ ?>

					    <?php if (isset($inmueble) and ($inmueble["ID_INMUEBLE"] == $fila["ID_INMUEBLE"])) { ?>
						    <button id="grabar" name="grabar" type="submit" >Guardar </button>
						<?php } else { ?>
						    <button id="editar" name="editar" type="submit" > Modificar </button>
						<?php } ?>
						<button id="borrar" name="borrar" type="submit"> Borrar </button>

					<?php } ?>
               </div>
		    </form>
				<?php } ?>
			  </div>
        </div>
        </section>


<?php
	include_once("footer.php");
?>

    </body>
</html>
