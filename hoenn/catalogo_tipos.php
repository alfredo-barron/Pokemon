<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>
     <?php
     echo '<h3 align="center">Tipos</h3>
     <table class="table table-hover">
     <tr>
     <td>#</td><td>Tipo</td>
     </tr>';
     $db = new DB("root","root","localhost","centrospokemon");
     $tipos = $db->findAll('catalogo_tipos');
     //$db->pretty();
     foreach ($tipos as $tip){ ?>
      <tr>
       <td><?php echo $tip['id'];?></td><td><?php echo $tip['nombre'];?></td>
     </tr>
     <?php } ?>
     </table>
     <a href="./tipo.php"><button class="btn btn-info">Agregar Nuevo Tipo</button></a>
     </div>
<?php include "footer.php"; ?>
