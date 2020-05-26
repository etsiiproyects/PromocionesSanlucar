<?php
	function consultarTodosInmuebles($conexion) {
		$consulta = "SELECT * FROM INMUEBLES";
    	return $conexion->query($consulta);
	}

	function alta_inmueble($conexion, $inmueble) {
		try {
			$consulta='CALL insertar_inmueble(:id_inmueble, :direccion, :habitaciones, :tipo)';
			$stmt=$conexion->prepare($consulta);
			$stmt->bindParam(':id_inmueble', $inmueble["id_inmueble"]);
			$stmt->bindParam(':direccion', $inmueble["direccion"]);
			$stmt->bindParam(':habitaciones', $inmueble["habitaciones"]);
			$stmt->bindParam(':tipo', $inmueble["tipo"]);

			$stmt->execute();
			return true;
		}catch(PDOException $e) {
			return false;
		}
	}
?>
