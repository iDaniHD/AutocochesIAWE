<?php
    include "cabecera.php";
?>
    
 <form id='form' action="index.php" method="post">
  <label for="make">Marca : </label>
 <?php if (isset ($errores['marca'])) echo "<p>Introduzca marca</p>"; ?>
  <input type="text" id="make" name="make" value="<?php if (isset ($marca)) echo $marca ?>"><br><br>
  <label for="model">Modelo : </label>
 <?php if (isset ($errores['modelo'])) echo "<p>Introduzca modelo</p>"; ?>
  <input type="text" id="model" name="model" value="<?php if (isset ($modelo)) echo $modelo ?>"><br><br>
  <input type="submit" name="insertar" value="Insertar">
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
    
    <?php
    if ($insercion == 1)
    {
        echo "Inserción realizada correctamente";
    }
?>
</form>
    
    

<?php
    include "pie.php";
?>
