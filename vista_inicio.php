<?php 
    
    include "cabecera.php";
    
    echo "<table>";
    #verArray($peliculas);
    
    if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
    
    <?php
    
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
 
