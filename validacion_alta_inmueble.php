<?php
	session_start();

  require_once("gestionBD.php");

	if(isset($_SESSION["formulario"])) {
		$nuevoInmueble["id_inmueble"] = $_REQUEST["id_inmueble"];
		$nuevoInmueble["direccion"] = $_REQUEST["direccion"];
		$nuevoInmueble["tipo"] = $_REQUEST["tipo"];
		$nuevoInmueble["habitaciones"] = $_REQUEST["habitaciones"];

        $_SESSION["formulario"] = $nuevoInmueble;

	} else {
		Header("Location: registroInmueble.php");
	}

    $conexion=crearConexionBD();
	$errores = validarDatosInmueble($conexion, $nuevoInmueble);
    cerrarConexionBD($conexion);

	if(count($errores)>0) {
		$_SESSION["errores"] = $errores;
		Header('Location: form_alta_inmueble.php');
	} else {
		Header('Location: accion_alta_inmuebles.php');
	}


	function validarDatosInmueble($conexion, $nuevoInmueble) {
        $errores=array();
		//validadion del id
		if($nuevoInmueble["id_inmueble"]=="") {
			$errores[] = "<p>El ID del inmueble no puede estar vacío</p>";
		} else if(strlen($nuevoInmueble["id_inmueble"])==4) {
			$errores[] = "<p>ID no válido: debe tener 5 caracteres</p>";
		}

		//validacion tipo
		if($nuevoInmueble["tipo"] != "PLURIFAMILIAR" &&
				$nuevoInmueble["tipo"] != "COMERCIAL" && $nuevoInmueble["tipo"]!= "AISLADO") {
			$errores[] = "<p>El tipo debe ser PLURIFAMILIAR, COMERCIAL o AISLADO</p>";
		}

        if($nuevoInmueble["direccion"]==""){
		$errores[] = "<p>La dirección no puede estar vacía</p>";

        return $errores;
	}
	}


?>
