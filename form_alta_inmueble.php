<?php
    session_start();

    require_once("gestionBD.php");

    if(!isset($_SESSION["formulario"])) {
        $formulario['id_inmueble']="";
        $formulario['direccion']="";
        $formulario['habitaciones']="";
        $formulario['tipo']=array();

        $_SESSION['formulario']=$formulario;
    }else $formulario=$_SESSION["formulario"];

    if (isset($_SESSION["errores"])){
        $errores=$_SESSION["errores"];
        unset($_SESSION["errores"]);
    }

    $conexion=crearConexionBD();
 ?>

 <!DOCTYPE html>
 <html lang="en">
     <head>
         <meta charset="utf-8">
         <title>Gestion Promociones Sanlucar: Alta Inmueble</title>
         <script src="js/validacion_cliente_alta_inmueble.js" type="text/javascript"></script>
     </head>
     <body>

         <script type="text/javascript">
             $(document).ready(function() {
                 $("#altaInmueble").on("submit", funtion() {
                     return validateForm();
                 });
             });
         </script>






     </body>
 </html>
