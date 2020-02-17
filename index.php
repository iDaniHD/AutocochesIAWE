<?php
    require_once 'utils.php';
    require_once 'conexion.php';
    require_once 'modelo.php';
    verArray($_GET);
    verArray($_POST);
    
    
    if (isset ($_GET['opcion']) && $_GET['opcion']=='insertar')
    {
        include 'form_insertar.php';
        exit();
    }
    
    
    if (isset ($_GET['opcion']) && $_GET['opcion']=='buscar')
    {
        include 'form_buscar.php';
        exit();
    }
    
    if ( isset($_POST['buscar']))
    {
        
        $errores = array();
        $marca = trim($_POST['marca']); 
        /* if (empty($texto))
        {
            $errores['texto'] = 'Introduzca nombre del producto';
        } */
        
        $annio = trim($_POST['annio']);
        /*if (empty($precio))
        {
            $errores['precio'] = 'Introduzca precio del producto';
        }
        else if (!is_numeric($precio))
        {
            $errores['precio'] = 'Introduzca valor numérico';
        }
        else if ($precio < 0)
        {
            $errores['precio'] = 'Introduzca valor positivo';
        }
            */
        if (!empty($errores))
        {
            include "form_buscar.php"; 
            exit();
        }  
        $marca = mysqli_real_escape_string($conexion, $marca);
        $annio = mysqli_real_escape_string($conexion, $annio);
        $sql = "SELECT m.title, l.title, l.year FROM make m join model l on m.id = l.make_id where m.title = '$marca' and l.year = $annio";
        
        $buscar = obtenerResultados($conexion, $sql);
        verArray($buscar);
        
        include "form_buscar.php";     
        
        
        exit();
    }
    
    
    
    $sql = 'SELECT title FROM make order by title asc';
    $coches = obtenerResultados($conexion, $sql);
    
    
    include 'vista_inicio.php';
?>
