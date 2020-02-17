<?php 
    
    include "cabecera.php";
    
    echo "<table>";
    #verArray($peliculas);
    $cont = 1;
    echo "<table>";
    foreach ($coches as $coche)
    {
        echo "<div class='pelicula'>";
        echo "<p> $cont - ". $coche['title'] . "</p>";
        echo "</div>";
        $cont++;
    }
    echo "</table>";
    
    #echo $resultado;
    include "pie.php";
    
    
    
    
    include "pie.php";
?>
 
