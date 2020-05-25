<?php
	function consultarTodosInmuebles($conexion) {
		$consulta = "SELECT * FROM INMUEBLES";
    	return $conexion->query($consulta);
	}
?>
