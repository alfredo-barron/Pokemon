<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>
     <div align="center"><h2>Ver Habitaciones</h2></div>
   <div align="center">
   <form method="POST" action="consultahabitaciones.php" role="form">
   <input type="hidden" id="susp1" name="susp1" value="1">
   <button class="btn btn-info">Ver habitaciones activas</button>
   </form>
   <form method="POST" action="consultahabitaciones.php" role="form">
   <input type="hidden" id="susp0" name="susp0" value="0">
   <button class="btn btn-danger">Ver habitaciones inactivas</button>
   </form>
   </div>

     <?php
     echo '<h3 align="center">Habitaciones Activas</h3>
     <table class="table table-hover">
     <tr>
     <td>Folio</td>
     <td>Capacidad</td>
     <td>Centro Pokemon</td>
     </tr>';
     $susp1 = $_POST['susp1'];
     $data = array();
     $data = array('suspendido' => $susp1);
     $db = new DB("root","root","localhost","centrospokemon");
     $enfermeras = $db->findAll('vista_habitaciones',$data);
     //$db->pretty();
     foreach ($enfermeras as $enfe){   ?>
      <tr>
       <td><?php echo $enfe['id'];?></td>
       <td><?php echo $enfe['capacidad'];?></td>
       <td><?php echo $enfe['centro'];?></td>
     </tr>
     <?php } ?>
     </table>

     <?php
     echo '<h3 align="center">Regeneradores Inactivos</h3>
     <table class="table table-hover">
     <tr>
     <td>Folio</td>
     <td>Capacidad</td>
     <td>Centro Pokemon</td>
     <td>Activar</td>
     </tr>';
     $susp0 = $_POST['susp0'];
     $data = array();
     $data = array('suspendido' => $susp0);
     $db = new DB("root","root","localhost","centrospokemon");
     $enfermeras = $db->findAll('vista_habitaciones',$data);
     //$db->pretty();
     foreach ($enfermeras as $enfe){ ?>
     <tr>
      <td><?php echo $enfe['id'];?></td>
      <td><?php echo $enfe['capacidad'];?></td>
      <td><?php echo $enfe['centro'];?></td>
      <td><a href="./dar_alta6.php?id=<?php echo $enfe['id']?>&suspendido=1">Activar</a></td>
     </tr>
     <?php } ?>
     </table>

<?php include "footer.php"; ?>
