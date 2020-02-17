<?php

     function verArray($array)
     {
         echo "<pre>";
         print_r($array);
         echo "</pre>";
     }
     
     
     function filtrarDato($dato)
     {
         return htmlspecialchars(trim($dato));
     }
?>
