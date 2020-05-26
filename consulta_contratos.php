<?php
	session_start();

	require_once("gestionBD.php");
	require_once("gestionarContratos.php");

	if(!isset($_SESSION['loginEmpleado'])) {
		header("Location: loginEmpleados.php");
	} else {
		if(isset($_SESSION["contrato"])) {
			$contrato = $_SESSION["contrato"];
			unset($_SESSION["contrato"]);
		}
	}

	$conexion = crearConexionBD();
	$filas = consultarTodosContratos($conexion);
	cerrarConexionBD($conexion);

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Promociones Sanlucar: Lista de Contratos</title>
  <link rel="stylesheet" type="text/css" href="css/consultaContratos.css">
</head>

<body>

<?php
	include_once("cabecera.php");
?>

<section class="contenido">
	<h1>Lista de Contratos: </h1>
	<div class="contratos">
		<?php
			foreach($filas as $fila) {
		?>
		<div class="contrato">
        <a href="#" class="btn-toggle"><b> CONTRATO <?php echo $fila["OID_CONTRATO"]; ?></b></a>
            <div class="toggle">
                <div class="wrap">
                    <p>Inicio del contrato: <b><?php echo $fila["INICIOALQUILER"]; ?></b></p>
                    <p>Fin del contrato: <b><?php echo $fila["FINALQUILER"]; ?></b></p>
                    <p>Pago mensual: <b><?php echo $fila["PAGOMENSUAL"]; ?></b></p>
                    <p>NIF cliente: <b><?php echo $fila["NICK"]; ?></b></p>
                    <button> Eliminar </button>
                </div>
            </div>
        </div>
		<?php } ?>
	</div>
</section>


<?php
	include_once("footer.php");
?>

<script>
let botones = document.querySelectorAll('.btn-toggle');
let toggles = document.querySelectorAll('.toggle');
for(var i = 0; i<botones.length; i++){

	let boton = botones[i];
	let toggle = toggles[i];
	console.log(typeof(boton));
	boton.addEventListener('click', (e) => {

		console.log(toggle);
		toggle.classList.toggle("active");
	});


	console.log("funciona");
  };



</script>

</body>
</html>
