<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>

     <?php
     echo '<h3 align="center">Registros</h3>
     <table class="table table-hover">
     <tr>
     <td>Folio</td>
     <td>Fecha Entrada</td>
     <td>Fecha Estimada</td>
     <td>Fecha Salida</td>
     <td>Pokebola</td>
     <td>Regenerador</td>
     <td>Hit Points</td>
     </tr>';
     $db = new DB("root","root","localhost","centrospokemon");
     $enfermeras = $db->findAll('registros',$data);
     //$db->pretty();
     foreach ($enfermeras as $enfe){  ?>
      <tr>
       <td><?php echo $enfe['id'];?></td>
       <td><?php echo $enfe['fecha_entrada'];?></td>
       <td><?php echo $enfe['fecha_estimada'];?></td>
       <td><?php echo $enfe['fecha_salida'];?></td>
       <td><?php echo $enfe['id_pokebola'];?></td>
       <td><?php echo $enfe['id_regenerador'];?></td>
       <td><?php echo $enfe['hit_points'];?></td>
      </tr>
     <?php } ?>
     </table>
