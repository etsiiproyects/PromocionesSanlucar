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
	           <?php if(isset($_SESSION['loginEmpleado'])){ ?>
		            <div class="inserta">
			              <h2><a href="form_alta_inmueble.php"> INSERTAR INMUEBLE </a></h2>
		            </div>
	           <?php } ?>


        <h1>Lista de Inmuebles: </h1>

	    <div class="inmuebles">
		    <?php
			    foreach($filas as $fila) {
					// echo $fila["ID_INMUEBLE"];
		     ?>

			 <div class="cabecera_id"><h1><?php echo $fila["ID_INMUEBLE"]; ?></h1> </div>
			 <div class="info_inmueble">
				 <h2>Direccion: <?php echo $fila["DIRECCION"]; ?> </h2>
				 <h2>Numero de Habitaciones: <?php echo $fila["HABITACIONES"]; ?> </h2>
				 <h2>Tipo de Inmueble: <?php echo $fila["TIPO"]; ?> </h2>
			 </div>
				<?php } ?>
			  </div>
        </div>
        </section>


<?php
	include_once("footer.php");
?>

    </body>
</html>
