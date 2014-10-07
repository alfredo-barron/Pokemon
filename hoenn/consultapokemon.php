<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>
     <div align="center"><h2>Ver Pokemon</h2></div>
   <div align="center">
   <form method="POST" action="consultapokemon.php" role="form">
   <input type="hidden" id="susp1" name="susp1" value="1">
   <button class="btn btn-info">Ver Pokemon activos</button>
   </form>
   <form method="POST" action="consultapokemon.php" role="form">
   <input type="hidden" id="susp0" name="susp0" value="0">
   <button class="btn btn-danger">Ver Pokemon inactivos</button>
   </form>
   </div>

     <?php
     echo '<h3 align="center">Pokemon Activos</h3>
     <table class="table table-hover">
     <tr>
     <td>#</td>
     <td>Especie</td>
     <td>Alias</td>
     <td>Nivel</td>
     <td>Status</td>
     <td>Es intercambiable</td>
     <td>Perfil</td>
     </tr>';
     $susp1 = $_POST['susp1'];
     $data = array();
     $data = array('suspendidopokemon' => $susp1);
     $db = new DB("root","root","localhost","centrospokemon");
     $enfermeras = $db->findAll('vista_pokebola',$data);
     //$db->pretty();
     foreach ($enfermeras as $enfe){ ?>
      <tr>
       <td><?php echo $enfe['id'];?></td>
       <td><?php echo $enfe['especie'];?></td>
       <td><?php echo $enfe['aliaspokemon'];?></td>
       <td><?php echo $enfe['nivel'];?></td>
       <td><?php echo $enfe['estatus'];?></td>
       <td><?php $inter=$enfe['es_intercambiable'];
              if($inter==0){
                $cambio="No";
              }
              else{
                $cambio="Si";
              }
              echo "$cambio";
       ?></td>
       <td>
       <a href="./perfilespokemon.php?id=<?php echo $enfe['id_entrenador']?>&especie=<?php echo $enfe['especie']?>">Ver perfil</a>
       </td>
     </tr>
     <?php } ?>
     </table>

     <?php
     echo '<h3 align="center">Pokemon Inactivas</h3>
     <table class="table table-hover">
     <tr>
     <td>#</td>
     <td>Especie</td>
     <td>Alias</td>
     <td>Nivel</td>
     <td>Status</td>
     <td>Es intercambiable</td>
     <td>Activar</td>
     </tr>';
     $susp0 = $_POST['susp0'];
     $data = array();
     $data = array('suspendidopokemon' => $susp0);
     $db = new DB("root","root","localhost","centrospokemon");
     $enfermeras = $db->findAll('vista_pokebola',$data);
     //$db->pretty();
     foreach ($enfermeras as $enfe){ ?>
     <tr>
       <td><?php echo $enfe['id'];?></td>
       <td><?php echo $enfe['especie'];?></td>
       <td><?php echo $enfe['aliaspokemon'];?></td>
       <td><?php echo $enfe['nivel'];?></td>
       <td><?php echo $enfe['estatus'];?></td>
       <td><?php $inter=$enfe['es_intercambiable'];
              if($inter==0){
                $cambio="No";
              }
              else{
                $cambio="Si";
              }
              echo "$cambio";
       ?></td>
       <td><a href="./dar_alta3.php?id=<?php echo $enfe['id']?>&suspendido=1">Activar</a></td>
     </tr>
     <?php } ?>
     </table>

<?php include "footer.php"; ?>
