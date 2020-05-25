<?php

function consultarEmpleado($conexion,$nombre,$pass) {
 	$consulta = "SELECT COUNT(*)  FROM EMPLEADO WHERE NOMBRE=:nombre AND PASS=:pass";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':nombre',nombre);
	$stmt->bindParam(':pass',$pass);
	$stmt->execute();
	return $stmt->fetchColumn();
}

	function consultarTodosEmpleados($conexion) {
		$consulta = "SELECT NOMBRE FROM EMPLEADO";
    return $conexion->query($consulta);
	}
?>
?>
