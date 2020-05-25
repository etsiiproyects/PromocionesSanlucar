<?php

function consultarTodosContratos($conexion) {
  		$consulta = "SELECT * FROM CONTRATOS";
  		return $conexion->query($consulta);
	}
    
?>
