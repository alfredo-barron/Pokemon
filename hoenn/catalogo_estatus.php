<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>
     <?php
     echo '<h3 align="center">Status</h3>
     <table class="table table-hover">
     <tr>
     <td>#</td>
     <td>Status</td>
     <td>Tiempo</td>
     <td>Desaparece</td>
     </tr>';
     $db = new DB("root","root","localhost","centrospokemon");
     $estatus = $db->findAll('catalogo_estatus');
     //$db->pretty();
     foreach ($estatus as $est){ ?>
      <tr>
       <td><?php echo $est['id'];?></td>
       <td><?php echo $est['nombre'];?></td>
       <td><?php echo "+".$est['tiempo']." segundos";?></td>
       <td><?php echo $est['desaparece_a']."%"; ?></td>
     </tr>
     <?php } ?>
     </table>
     <a href="./estatus.php"><button class="btn btn-info">Agregar Nuevo Status</button></a>
     </form>
     </div>
<?php include "footer.php"; ?>
