<?php
       $conexion = mysqli_connect("localhost", "pepe", "pepa");
    if (!$conexion) // no se puede establecer conexi�n
    {
        $error = "Imposible establecer conexi&oacute;n con el servidor de BD";
        include "error.php";
        exit();
    }
    // seleccionar la base de datos de trabajo
    $bd = "bdcoches";
    $resul = mysqli_select_db($conexion, $bd);
    if (!$resul)
    {
        $error = "Imposible localizar la base de datos $bd";
        include "error.php";
        exit();
    } 
?>
