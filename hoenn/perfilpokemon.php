<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php";
      $id = $_GET['id'];
      $especie = $_GET['especie'];
      ?>
<div align="center"><h2>Perfil de <b><?php echo $especie;?></b></h2></div>
<table align="center" width="100%">
     <tr align="center">
     <td><b><?php echo $especie;?></b></td>
     <td><b>Estadisticas<b></td>
     <td><b>Tipo<b></td>
     <td><b>Habilidades<b></td>
     </tr>
<?php
     $id = $_GET['id'];
     $data = array();
     $data = array('id' => $id);
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('vista_poke',$data); ?>
     <?php foreach ($catalogos as $cata){ ?>
       <tr>
       <td>
        <div align="center">
       <img src="./images/<?php echo $cata['imagen'];?>">
       </div>
       </td>
       <td>
       <div align="center">
       Hits Points: <b><?php echo $cata['hit_points'];?></b><br>
       Ataque: <b><?php echo $cata['ataque'];?></b><br>
       Defensa: <b><?php echo $cata['defensa'];?></b><br>
       Velocidad: <b><?php echo $cata['velocidad'];?></b><br>
       Evasion: <b><?php echo $cata['evasion'];?></b><br>
       Precision: <b><?php echo $cata['prezision'];?></b><br>
       </div>
       <?php } ?>
       </td>
      <td>
     <?php
     $id = $_GET['id'];
     $data = array();
     $data = array('id' => $id);
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('vista_tipos',$data);
     foreach ($catalogos as $cata){ ?>
         <div align="center">
         <?php echo $cata['tipo'];?><br>
         </div>
         <?php } ?>
       </td>
     <td>
     <?php
     $id = $_GET['id'];
     $data = array();
     $data = array('id' => $id);
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('vista_habiles',$data);
      foreach ($catalogos as $cata){ ?>
      <div align="center">
         <?php echo $cata['habilidad'];?><br>
         </div>
          <?php } ?>
       </td>
      <td>
     <?php
     #$id = $_GET['id'];
     $id_prevolucion = $id;
     $data = array();
     $data = array('id_prevolucion' => $id_prevolucion);
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('vista_evolucion',$data);
      foreach ($catalogos as $cata){ ?>
       <div align="center">
        <b>Evolucion: <b>
       <b><?php echo $cata['especie'];?></b><br>
      <img src="./images/<?php echo $cata['imagen'];?>">
      </div>
     <?php } ?>
     </td>
     </table>
     <div align="center">
      <a href="./tipos.php?id=<?php echo $id ?>"><button class="btn btn-success">Nuevo Tipo</button></a>
      <a href="./habilidades.php?id=<?php echo $id ?>"><button class="btn btn-success">Nueva Habilidad</button></a>
      <a href="./evoluciones.php?id=<?php echo $id ?>"><button class="btn btn-success">Agregar Evolucion</button></a>
     </div>
      </div>
<?php include "footer.php"; ?>
