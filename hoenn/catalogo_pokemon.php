<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>
     <?php
     echo '<h3 align="center">Catalogo Pokemon</h3>
     <table class="table table-hover">
     <tr>
     <td>#</td>
     <td>Especie</td>
     <td>Hit Points</td>
     <td>Ataque</td>
     <td>Defensa</td>
     <td>Velocidad</td>
     <td>Evasion</td>
     <td>Precision</td>
     <td>Region</td>
     <td>Ver Pokemon</td>
     </tr>';
     $db = new DB("root","root","localhost","centrospokemon");
     $pokemon = $db->findAll('vista_catalogopokemon');
     //$db->pretty();
     foreach ($pokemon as $poke){ ?>
      <tr>
       <td><?php echo $poke['id'];?></td><td><a href="./perfilpokemon.php?id=<?php echo $poke['id']?>&especie=<?php echo $poke['especie']?>"><?php echo $poke['especie'];?></a></td>
       <td><?php echo $poke['hit_points'];?></td>
       <td><?php echo $poke['ataque'];?></td>
       <td><?php echo $poke['defensa'];?></td>
       <td><?php echo $poke['velocidad'];?></td>
       <td><?php echo $poke['evasion'];?></td>
       <td><?php echo $poke['prezision'];?></td>
       <td><?php echo $poke['nombre'];?></td>
       <td><a href="./perfilpokemon.php?id=<?php echo $poke['id']?>&especie=<?php echo $poke['especie']?>">Ver Perfil</a></td>
     </tr>
     <?php } ?>
     </table>
     <form method="POST" action="agregar_catalogopokemon.php" role="form">
     <button class="btn btn-info">Agregar Nuevo Pokemon</button>
     </form>
     </div>
<?php include "footer.php"; ?>
