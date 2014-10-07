<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>
     <div align="center"><h2>Ver Enfermeras</h2></div>
   <div align="center">
   <form method="POST" action="consultaenfermera.php" role="form">
   <input type="hidden" id="susp1" name="susp1" value="1">
   <button class="btn btn-info">Ver enfermeras activas</button>
   </form>
   <form method="POST" action="consultaenfermera.php" role="form">
   <input type="hidden" id="susp0" name="susp0" value="0">
   <button class="btn btn-danger">Ver enfermeras inactivas</button>
   </form>
   </div>

     <?php
     echo '<h3 align="center">Enfermeras Activas</h3>
     <table class="table table-hover">
     <tr>
     <td>Folio</td>
     <td>Nombre</td>
     <td>Apellidos</td>
     <td>Cedula Profesional</td>
     <td>Centro Pokemon</td>
     <td>Perfil</td>
     </tr>';
     $susp1 = $_POST['susp1'];
     $data = array();
     $data = array('suspendido' => $susp1);
     $db = new DB("root","root","localhost","centrospokemon");
     $enfermeras = $db->findAll('vista_enfermeras',$data); ?>

     <?php foreach ($enfermeras as $enfe){ ?>
      <tr>
       <td><?php echo $enfe['id'];?></td>
       <td><?php echo $enfe['nombre'];?></td>
       <td><?php echo $enfe['apellidos'];?></td>
       <td><?php echo $enfe['cedula'];?></td>
       <td><?php echo $enfe['centro'];?></td>
       <td><a href="./perfilenfermera.php?id=<?php echo $enfe['id']?>&nombre=<?php echo $enfe['nombre']?>&apellidos=<?php echo $enfe['apellidos']?>">Ver perfil</a></td>
     </tr>
     <?php } ?>
     </table>

     <?php
     echo '<h3 align="center">Enfermeras Inactivas</h3>
     <table class="table table-hover">
     <tr>
     <td>Folio</td>
     <td>Nombre</td>
     <td>Apellidos</td>
     <td>Cedula Profesional</td>
     <td>Centro Pokemon</td>
     <td>Activar</td>
     </tr>';
     $susp0 = $_POST['susp0'];
     $data = array();
     $data = array('suspendido' => $susp0);
     $db = new DB("root","root","localhost","centrospokemon");
     $enfermeras = $db->findAll('vista_enfermeras',$data);
     //$db->pretty();
     foreach ($enfermeras as $enfe){ ?>
     <tr>
       <td><?php echo $enfe['id'];?></td>
       <td><?php echo $enfe['nombre'];?></td>
       <td><?php echo $enfe['apellidos'];?></td>
       <td><?php echo $enfe['cedula'];?></td>
       <td><?php echo $enfe['centro'];?></td>
       <td><a href="./dar_alta.php?id=<?php echo $enfe['id']?>&suspendido=1">Activar</a></td>
     </tr>
     <?php } ?>
     </table>

<?php include "footer.php"; ?>
