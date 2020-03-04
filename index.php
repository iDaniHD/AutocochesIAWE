<?php



    # https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database 


    require_once 'utils.php';
    require_once 'conexion.php';
    require_once 'modelo.php';
    #verArray($_GET);
    #verArray($_POST);
    
    
    if (isset ($_GET['opcion']) && $_GET['opcion']=='insertar')
    {
        include 'form_insertar.php';
        exit();
    }
    
    if ( isset($_POST['insertar']))
    {
        $errores = array();
        $marca = trim($_POST['make']);
            if (empty($marca))
            {
                $errores['marca'] = 'Introduca la marca del fabricante';
            }
        $modelo = trim($_POST['model']);
            if (empty ($modelo))
            {
                $errores['modelo'] = 'Introduzca modelo';
            }
        $annio = trim($_POST['annio']);
        if (!empty($errores))
        {
            include "form_insertar.php"; 
            exit();
        } 
        
        echo "insertamos";
        echo $marca;
        echo $modelo;
        echo $annio;
        
        $marca = mysqli_real_escape_string($conexion, $marca);
        $modelo = mysqli_real_escape_string($conexion, $modelo);
        
        
        // consulta de inserci�n en la BD
        $sql = "INSERT INTO make (id, code, title)
                VALUES (null, '$marca' , '$marca') ";
        //echo $sql;
        
        $resul = mysqli_query($conexion, $sql);
        if (!$resul) // ha ocurrido un error
        {
            $error = "Error en consulta de inserción - ".mysqli_error($conexion);
            include "error.php";
            exit();
        }
        
        
        $sql = "INSERT INTO model (id, make_id, code, title, year)
                VALUES (null, null, '$modelo' , '$modelo', '$annio') ";
        
         $resul = mysqli_query($conexion, $sql);
        if (!$resul) // ha ocurrido un error
        {
            $error = "Error en consulta de inserción - ".mysqli_error($conexion);
            include "error.php";
            exit();
        }
        
        
        #header('Location: index.php?oper=insertar');
        
        $insercion = 1;
        
        include "form_insertar.php"; 
        
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
        #verArray($buscar);
        
        include "form_buscar.php";     
        
        
        exit();
    }
    
    
    
    $sql = 'SELECT title FROM make order by title asc';
    $coches = obtenerResultados($conexion, $sql);
    
    
    include 'vista_inicio.php';
?>
