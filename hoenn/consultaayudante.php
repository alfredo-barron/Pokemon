<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>
     <div align="center"><h2>Ver Ayudantes Pokemon</h2></div>
   <div align="center">
   <form method="POST" action="consultaayudante.php" role="form">
   <input type="hidden" id="susp1" name="susp1" value="1">
   <button class="btn btn-info">Ver ayudantes activas</button>
   </form>
   <form method="POST" action="consultaayudante.php" role="form">
   <input type="hidden" id="susp0" name="susp0" value="0">
   <button class="btn btn-danger">Ver ayudantes inactivas</button>
   </form>
   </div>

     <?php
     echo '<h3 align="center">Ayudantes Activas</h3>
     <table class="table table-hover">
     <tr>
     <td>Folio</td>
     <td>Especie</td>
     <td>Fecha Graduacion</td>
     <td>Enfermera</td>
     <td>Perfil</td>
     </tr>';
     $susp1 = $_POST['susp1'];
     $data = array();
     $data = array('suspendido' => $susp1);
     $db = new DB("root","root","localhost","centrospokemon");
     $ayudantes = $db->findAll('vista_ayudantes',$data);
     //$db->pretty();
     foreach ($ayudantes as $ayu){ ?>
      <tr>
       <td><?php echo $ayu['id'];?></td>
       <td><?php echo $ayu['especie'];?></td>
       <td><?php echo $ayu['fecha_graduacion'];?></td>
       <td><?php echo $ayu['nombre']." ".$ayu['apellidos'];?></td>
       <td><a href="./perfilayudante.php?id=<?php echo $ayu['id']?>&especie=<?php echo $ayu['especie']?>">Ver perfil</a></td>
     </tr>
     <?php } ?>
     </table>

     <?php
     echo '<h3 align="center">Ayudantes Inactivas</h3>
     <table class="table table-hover">
     <tr>
     <td>Folio</td>
     <td>Especie</td>
     <td>Fecha Graduacion</td>
     <td>Enfermera</td>
     <td>Activar</td>
     </tr>';
     $susp0 = $_POST['susp0'];
     $data = array();
     $data = array('suspendido' => $susp0);
     $db = new DB("root","root","localhost","centrospokemon");
     $ayudantes = $db->findAll('vista_ayudantes',$data);
     //$db->pretty();
     foreach ($ayudantes as $ayu){ ?>
     <tr>
      <td><?php echo $ayu['id'];?></td>
      <td><?php echo $ayu['especie'];?></td>
      <td><?php echo $ayu['fecha_graduacion'];?></td>
      <td><?php echo $ayu['nombre']." ".$ayu['apellidos'];?></td>
      <td><a href="./dar_alta1.php?id=<?php echo $ayu['id']?>&suspendido=1">Activar</a></td>
     </tr>
     <?php } ?>
     </table>

<?php include "footer.php"; ?>
