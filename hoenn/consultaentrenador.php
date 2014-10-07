<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>
     <div align="center"><h2>Ver Entrenadores</h2></div>
   <div align="center">
   <form method="POST" action="consultaentrenador.php" role="form">
   <input type="hidden" id="susp1" name="susp1" value="1">
   <button class="btn btn-info">Ver Entrenadores activos</button>
   </form>
   <form method="POST" action="consultaentrenador.php" role="form">
   <input type="hidden" id="susp0" name="susp0" value="0">
   <button class="btn btn-danger">Ver Entrenadores inactivos</button>
   </form>
   </div>

     <?php
     echo '<h3 align="center">Entrenadores Activos</h3>
     <table class="table table-hover">
     <tr>
     <td>Folio</td>
     <td>Nombre</td>
     <td>Apellidos</td>
     <td>Alias</td>
     <td>Perfil</td>
     </tr>';
     $susp1 = $_POST['susp1'];
     $data = array();
     $data = array('suspendido' => $susp1);
     $db = new DB("root","root","localhost","centrospokemon");
     $entrenadores = $db->findAll('entrenadores',$data);
     //$db->pretty();
     foreach ($entrenadores as $entre){ ?>
      <tr>
       <td><?php echo $entre['id'];?></td>
       <td><?php echo $entre['nombre'];?></td>
       <td><?php echo $entre['apellidos'];?></td>
       <td><?php echo $entre['alias'];?></td>
       <td><a href="./perfilentrenador.php?id=<?php echo $entre['id']?>&nombre=<?php echo $entre['nombre']?>&apellidos=<?php echo $entre['apellidos']?>">Ver perfil</a></td>
     </tr>
     <?php } ?>
     </table>

     <?php
     echo '<h3 align="center">Entrenadores Inactivos</h3>
     <table class="table table-hover">
     <tr>
     <td>Folio</td>
     <td>Nombre</td>
     <td>Apellidos</td>
     <td>Alias</td>
     <td>Activar</td>
     </tr>';
     $susp0 = $_POST['susp0'];
     $data = array();
     $data = array('suspendido' => $susp0);
     $db = new DB("root","root","localhost","centrospokemon");
     $entrenadores = $db->findAll('entrenadores',$data);
     //$db->pretty();
     foreach ($entrenadores as $entre){ ?>
     <tr>
       <td><?php echo $entre['id'];?></td>
       <td><?php echo $entre['nombre'];?></td>
       <td><?php echo $entre['apellidos'];?></td>
       <td><?php echo $entre['alias'];?></td>
       <td><a href="./dar_alta2.php?id=<?php echo $entre['id']?>&suspendido=1">Activar</a></td>
     </tr>
     <?php } ?>
     </table>

<?php include "footer.php"; ?>
