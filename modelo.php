<?php

      // ejecutar consulta y devolver conjunto de resultados
      function obtenerResultados($conexion, $sql)
      {
          $resul = mysqli_query($conexion, $sql);
        
        if (!$resul)
        {
            $error = "error en la consulta - " . mysqli_error($conexion);
            include 'error.php';
            exit();
        }
        
        $resultados = array();

        while ($fila = mysqli_fetch_array($resul))
        {
            $resultados[] = $fila;
        }
          return $resultados;
      }

      
      