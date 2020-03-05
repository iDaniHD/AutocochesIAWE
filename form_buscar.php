
<?php
    include "cabecera.php";
?>

<form id='form' action="index.php" method="post">
    <div id='datos'>
        <h3>Formulario de búsqueda</h3>
         <h4>Modelos de fabricantes por año</h4>
    <label> </label>
    <select name="marca">
        <?php 
        
            $sql = 'SELECT title FROM make order by title asc';
            $coches = obtenerResultados($conexion, $sql);
            $i = 1950;
           foreach ($coches as $coche)
           {
               echo "<option value = '{$coche['title']}'";
               if (isset ($_POST['marca']) && $_POST['marca'] == "{$coche['title']}")
               {
                   echo "selected = selected";
               }
                echo ">{$coche['title']}</option>";
            }
           
           /*{
               echo "<option value = $i ";
               if (isset ($_POST['annio']) && $_POST['annio'] == "$i")
               {
                   echo "selected = selected";
               }
               echo ">$i</option>";
               $i++;
           }   */  

        ?>
    
    </select><br />
    
    <select name="annio">
        <?php 

            $i = 1950;        
           while ($i < 2013)
           {
               echo "<option value = $i ";
               if (isset ($_POST['annio']) && $_POST['annio'] == "$i")
               {
                   echo "selected = selected";
               }
               echo ">$i</option>";
               $i++;
           } 

        ?>
    
    </select><br />
    </span><br />
    <input type="submit" name="buscar" value="Buscar" /><br />
    </div>
</form>
<?php
    
if (empty($buscar))
{
    if (isset ($marca))
    echo "No existe ningún modelo fabricado por $marca en $annio en nuestra base de datos";
}
else
{
    //verArray($buscar);
    echo "Modelos de $marca en el año $annio <br />";
    foreach ($buscar as $coche)
    {
        echo "{$coche['0']} {$coche['title']}";
    }
}


    include "pie.php";
?>