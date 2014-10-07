<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php";
      $id = $_GET['id'];
      $nombre = $_GET['nombre'];
      $apellidos = $_GET['apellidos'];
      ?>
<div align="center"><h2>Perfil de <b><?php echo $nombre;?> <?php echo $apellidos; ?></b></h2></div>
       <table align="center" width="100%">
       <tr>
<?php
     $id = $_GET['id'];
     $data = array();
     $data = array('id' => $id);
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('vista_entrenadores',$data);
     foreach ($catalogos as $cata){ ?>
    <td>
     <div aling="right"><img src="./images/<?php echo $cata['imagen'];?>" class="img-thumbnail"  width="350"
    height="350"></div>
    </td>

    <td>
   <h3>Alias: <b><?php echo $cata['alias'];?></b></h3>
   <h3>Nombre: <b><?php echo $cata['nombre']." ".$cata['apellidos'];?></b></h3>
   <h3>Fecha de Nacimiento: <b><?php echo $cata['fecha_nacimiento'];?></b></h3>

    <?php
     $birthday = $cata['fecha_nacimiento'];
     function CalculaEdad( $fecha ) {
    list($Y,$m,$d) = explode("-",$fecha);
    $edad =( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
    return $edad;
     } ?>

   <h3>Edad: <b><?php echo CalculaEdad($birthday)?><b></h3>
   <h3>Lugar de Origen: <b><?php echo $cata['lugar_nacimiento'];?><b></h3>
   <h3>Lugar Actual: <b><?php echo $cata['localizacion_actual'];?><b></h3>
   <h3>Sexo: <b><?php echo $cata['sexo'];?><b></h3>

   <?php $lider= $cata['es_lider'];
   if($lider==1){
   	$es = "Si";
   }
   else{
   	$es = "No";
   }
   ?>

   <h3>Lider Pokemon: <b><?php echo $es;?><b></h3>
   </td>
 <?php } ?>
  <td>
   <h3>Pokebolas</h3>
   <?php
     $id = $_GET['id'];
     $data = array();
     $data = array('id_entrenador' => $id);
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('vista_pokebola3',$data);
     foreach ($catalogos as $cata){ ?>
   <a href="./perfilentrenador.php?id=<?php echo $cata['id_pokemon'];?>"><button data-toggle="modal" data-target="#myModal">
  <img src="./images/pokebola.gif" width="100px"></button></a><br>
   <?php } ?>

   <?php
       $id = $_GET['id'];
       $data = array();
       $data = array('id_entrenador' => $id);
       $db = new DB("root","root","localhost","centrospokemon");
       $pokemon = $db->findAll('vista_pokebola1',$data);
     foreach ($pokemon as $poke){ ?>
  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><b><?php echo $poke['especie'];?></b></h4>
      </div>
      <div class="modal-body">
        <div align="center"><b>Alias: </b><?php echo $poke['aliaspokemon'];?><br>
        <img src="./images/<?php echo $cata['imagen'];?>" aling="center">
        </div>
        <br>
        <div align="center">

        <b>Nivel: </b><?php echo $poke['nivel'] ?> <br><br>
        <b>Sexo: </b><?php echo $poke['sexo'] ?>
        <b>Hits Points: </b><?php echo $poke['hit_points'] ?>
        <b>Ataque: </b><?php echo $poke['ataque'] ?>
        <b>Defensa: </b><?php echo $poke['defensa'] ?> <br>
        <b>Velocidad: </b><?php echo $poke['velocidad'] ?>
        <b>Evasion: </b><?php echo $poke['evasion'] ?>
        <b>Precision: </b><?php echo $poke['prezision'] ?>
        <b>Status: </b><?php echo $poke['estatus'] ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php } ?>
  <td>
  </tr>
   </table>
   <h2 align="center">Pokemon's</h2>
   <table align="center" width="100%">
     <tr>
     <?php
     $id = $_GET['id'];
     $data = array();
     $data = array('id_entrenador' => $id);
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('vista_pokebola1',$data);
     foreach ($catalogos as $cata){ ?>
       <td>
          <h3 align="center"><b><?php echo $cata['especie'];?></b></h3>
          <h4 align="center">Alias: <?php echo $cata['aliaspokemon'];?></h4>
          <div align="center"><img src="./images/<?php echo $cata['imagen'];?>" aling="center"></div>
       </td>
       <?php  } ?>
     </tr>
   </table>

<?php include "footer.php"; ?>
