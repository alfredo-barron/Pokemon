<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>
     <div align="center"><h2>Ver Regeneradores</h2></div>
   <div align="center">
   <form method="POST" action="consultaregeneradores.php" role="form">
   <input type="hidden" id="susp1" name="susp1" value="1">
   <button class="btn btn-info">Ver regeneradores activos</button>
   </form>
   <form method="POST" action="consultaregeneradores.php" role="form">
   <input type="hidden" id="susp0" name="susp0" value="0">
   <button class="btn btn-danger">Ver regeneradores inactivos</button>
   </form>
   </div>

     <?php
     echo '<h3 align="center">Regeneradores Activos</h3>
     <table class="table table-hover">
     <tr>
     <td>Folio</td>
     <td>Slots</td>
     <td>Slots Funcionales</td>
     <td>Mantenimiento</td>
     <td>Centro Pokemon</td>
     <td>Regeneradores</td>
     </tr>';
     $susp1 = $_POST['susp1'];
     $data = array();
     $data = array('suspendido' => $susp1);
     $db = new DB("root","root","localhost","centrospokemon");
     $enfermeras = $db->findAll('vista_regeneradores',$data);
     //$db->pretty();
     foreach ($enfermeras as $enfe){
      $mante = $enfe['esta_mantenimiento'];
      if ($mante==1) {
        $imprimir="Si";
      }else{
        $imprimir="No";
      }

      ?>
      <tr>
       <td><?php echo $enfe['id'];?></td>
       <td><?php echo $enfe['slots'];?></td>
       <td><?php echo $enfe['slots_funcionales'];?></td>
       <td><?php echo $imprimir; ?></td>
       <td><?php echo $enfe['nombre'];?></td>
       <td><a href="./regenerador.php?id=<?php echo $enfe['id']?>&slots=<?php echo $enfe['slots']?>&slots_funcionales=<?php echo $enfe['slots_funcionales']?>">Ver Regenerador</a></td>
     </tr>
     <?php } ?>
     </table>

     <?php
     echo '<h3 align="center">Regeneradores Inactivos</h3>
     <table class="table table-hover">
     <tr>
     <td>Folio</td>
     <td>Slots</td>
     <td>Slots Funcionales</td>
     <td>Mantenimiento</td>
     <td>Centro Pokemon</td>
     <td>Activar</td>
     </tr>';
     $susp0 = $_POST['susp0'];
     $data = array();
     $data = array('suspendido' => $susp0);
     $db = new DB("root","root","localhost","centrospokemon");
     $enfermeras = $db->findAll('vista_regeneradores',$data);
     //$db->pretty();
     foreach ($enfermeras as $enfe){
      $mante = $enfe['esta_mantenimiento'];
      if ($mante==1) {
        $imprimir="Si";
      }else{
        $imprimir="No";
      }
      ?>
     <tr>
      <td><?php echo $enfe['id'];?></td>
      <td><?php echo $enfe['slots'];?></td>
      <td><?php echo $enfe['slots_funcionales'];?></td>
      <td><?php echo $imprimir;?></td>
      <td><?php echo $enfe['nombre'];?></td>
      <td><a href="./dar_alta5.php?id=<?php echo $enfe['id']?>&suspendido=1">Activar</a></td>
     </tr>
     <?php } ?>
     </table>

<?php include "footer.php"; ?>
