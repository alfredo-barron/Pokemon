<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>
     <?php
     echo '<h3 align="center">Habilidades</h3>
     <table class="table table-hover">
     <tr>
     <td>#</td>
     <td>Habilidad</td>
     </tr>';
     $db = new DB("root","root","localhost","centrospokemon");
     $habilidades = $db->findAll('catalogo_habilidades');
     //$db->pretty();
     foreach ($habilidades as $habi){ ?>
      <tr>
       <td><?php echo $habi['id'];?></td>
       <td><?php echo $habi['nombre'];?></td>
     </tr>
     <?php } ?>
     </table>
     <a href="./habilidad.php"><button class="btn btn-info">Agregar Nueva Habilidad</button></a>
     </div>
<?php include "footer.php"; ?>
