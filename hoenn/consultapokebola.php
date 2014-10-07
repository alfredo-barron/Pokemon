<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>


        <div align="center"><h2>Ver Pokebolas</h2></div>
     <form method="POST" action="consultapokebola.php" role="form">
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Entrenador</label>
    <select class="form-control" id="id_entrenador" name="id_entrenador">
    <option selected value="0">Seleccionar</option>
     <?php
     $suspendido=1;
     $data = array();
     $data = array('suspendido' => $suspendido);
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('entrenadores',$data);
     //$db->pretty();
     foreach ($catalogos as $cata){ ?>
     <option value="<?php echo $cata['id']; ?>"><?php echo $cata['nombre']." ".$cata['apellidos'];?></option>
     <?php } ?>
     </select>
     <button type="submit" class="btn btn-success">Ver Pokebolas</button>
     </div>
     </div>
     </form>
     <br>
   <div align="center">
   <form method="POST" action="consultapokebola.php" role="form">
   <input type="hidden" id="susp1" name="susp1" value="1">
   <button class="btn btn-info">Ver Pokebolas activas</button>
   </form>
   <form method="POST" action="consultapokebola.php" role="form">
   <input type="hidden" id="susp0" name="susp0" value="0">
   <button class="btn btn-danger">Ver Pokebolas inactivas</button>
   </form>
   </div>

      <?php
     $susp1 = $_POST['susp1'];
     $data = array();
     $data = array('suspendido' => $susp1 );
     $db = new DB("root","root","localhost","centrospokemon");
     $pokebolas = $db->findAll('vista_pokebola',$data); ?>
     <table class="table table-hover" width="100%">
     <tr align="center">
     <td align="center" colspan="3"><b>Pokebola</b></td>
     <td align="center" colspan="2"><b>Entrenador</b></td>
     <td align="center" colspan="4"><b>Pokemon</b></td>
     <td align="center" colspan="2"><b>Dar de baja</b></td>
     </tr>
     </table>
     <?php foreach ($pokebolas as $poke){ ?>
     <table class="table table-hover" width="100%">
     <tr>
      <td align="center" width="20%"><?php echo $poke['id']; ?></td>
      <td align="center"  width="30%"><?php echo $poke['nombre']." ".$poke['apellidos']; ?></td>
      <td align="center" width="20%"><?php echo $poke['especie']; ?></td>
      <td align="center"  width="30%"><a href="./dar_baja4.php?id=<?php echo $poke['id'];?>&suspendido=0"><img src="./images/tacha.png" width="35px"><a></td>
     </tr>
    </table>
    <?php } ?>

    <?php
     $susp0 = $_POST['susp0'];
     $data = array();
     $data = array('suspendido' => $susp0 );
     $db = new DB("root","root","localhost","centrospokemon");
     $pokebolas = $db->findAll('vista_pokebola',$data); ?>
     <table class="table table-hover" width="100%">
     <tr align="center">
     <td align="center" colspan="3"><b>Pokebola</b></td>
     <td align="center" colspan="2"><b>Entrenador</b></td>
     <td align="center" colspan="4"><b>Pokemon</b></td>
     <td align="center" colspan="2"><b>Activar</b></td>
     </tr>
     </table>
     <?php foreach ($pokebolas as $poke){ ?>
     <table class="table table-hover" width="100%">
     <tr>
      <td align="center" width="20%"><?php echo $poke['id']; ?></td>
      <td align="center"  width="30%"><?php echo $poke['nombre']." ".$poke['apellidos']; ?></td>
      <td align="center" width="20%"><?php echo $poke['especie']; ?></td>
      <td align="center"  width="30%"><a href="./dar_alta4.php?id=<?php echo $poke['id'];?>&suspendido=1"><img src="./images/activo.png" width="35px"><a></td>
     </tr>
    </table>
    <?php } ?>

     <?php
     $id_entrenador = $_POST['id_entrenador'];
     $data = array();
     $data = array('id_entrenador' => $id_entrenador );
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('vista_pokebola3',$data); ?>
      <!-- Button trigger modal -->
     <table class="table table-hover" width="100%">
     <tr align="center">
     <td align="center" colspan="3"><b>Pokebola</b></td>
     <td align="center" colspan="2"><b>Entrenador</b></td>
     <td align="center" colspan="4"><b>Pokemon</b></td>
     <td align="center" colspan="2"><b>Dar de baja</b></td>
     </tr>
     </table>
     <?php foreach ($catalogos as $cata){ ?>
     <table class="table table-hover" width="100%">
     <tr>
      <td align="center" width="20%">
      <a href="<?php echo $cata['id']; ?>"><button data-toggle="modal" data-target="#myModal">
      <img src="./images/pokebola.gif" width="50px"></button></a></td>
      <td align="center"  width="30%"><?php echo $cata['nombre']." ".$cata['apellidos']; ?></td>
      <td align="center" width="20%"><?php echo $cata['especie']; ?></td>
      <td align="center"  width="30%"><a href="./dar_baja4.php?id=<?php echo $cata['id'];?>&suspendido=0"><img src="./images/tacha.png" width="35px"><a></td>
     </tr>
    </table>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><b><?php echo $cata['especie'];?></b></h4>
      </div>
      <div class="modal-body">
        <div align="center"><b>Alias: </b><?php echo $cata['aliaspokemon'];?><br>
        <img src="./images/<?php echo $cata['imagen'];?>" aling="center">
        </div>
        <br>
        <div align="center">
        <b>Nivel: </b><?php echo $cata['nivel'] ?> <br><br>
        <b>Sexo: </b><?php echo $cata['sexo'] ?>
        <b>Hits Points: </b><?php echo $cata['hit_points'] ?>
        <b>Ataque: </b><?php echo $cata['ataque'] ?>
        <b>Defensa: </b><?php echo $cata['defensa'] ?> <br>
        <b>Velocidad: </b><?php echo $cata['velocidad'] ?>
        <b>Evasion: </b><?php echo $cata['evasion'] ?>
        <b>Precision: </b><?php echo $cata['prezision'] ?>
        <b>Status: </b><?php echo $cata['estatus'] ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
      <?php } ?>


<?php include "footer.php"; ?>
