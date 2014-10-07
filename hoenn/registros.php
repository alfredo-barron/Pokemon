<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
   include "DB.php"; ?>
   <div align="center"><h2>Registro para Ingresar un Pokemon a Regenerador</h2></div>
   <form method="POST" action="saveregistros.php" role="form">

   	<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Enfermera de Entrada</label>
    <select class="form-control" id="enfermera_entrada" name="enfermera_entrada">
    <option value="0" selected>Seleccionar</option>
     <?php
     $suspendido=1;
     $data = array();
     $data = array('suspendido' => $suspendido);
     $db = new DB("root","root","localhost","centrospokemon");
     $enfermeras = $db->findAll('enfermeras',$data);
     //$db->pretty();
     foreach ($enfermeras as $enfe){ ?>
     <option value="<?php echo $enfe['id']; ?>"><?php echo $enfe['nombre']." ".$enfe['apellidos'];?></option>
     <?php } ?>
     </select>
     </div>
     </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Fecha de Entrada</label>
    <div class="col-sm-10">
    <input type="datetime-local" class="form-control" id="fecha_entrada" name="fecha_entrada" required>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Regenerador</label>
    <select class="form-control" id="id_regenerador" name="id_regenerador">
    <option value="0" selected>Seleccionar</option>
     <?php
     $suspendido=1;
     $data = array();
     $data = array('suspendido' => $suspendido);
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('regeneradores',$data);
     //$db->pretty();
     foreach ($catalogos as $cata){ ?>
     <option value="<?php echo $cata['id']; ?>"><?php echo "Regenerador ".$cata['id'];?></option>
     <?php } ?>
     </select>
    </div>
    </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Hit Points</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="hit_points" name="hit_points" placeholder="Hit Points" min="1" max="150" required>
    </div>
    </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
    <select class="form-control" id="estatus" name="estatus">
     <?php
     $db = new DB("root","root","localhost","centrospokemon");
     $estatus = $db->findAll('catalogo_estatus');
     //$db->pretty();
     foreach ($estatus as $est){ ?>
     <option value="<?php echo $est['id']; ?>"><?php echo $est['nombre'];?></option>
     <?php } ?>
     </select>
     </div>
     </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Pokebola</label>
    <select class="form-control" id="id_pokebola" name="id_pokebola">
    <option value="0" selected>Seleccionar</option>
     <?php
     $suspendido=1;
     $data = array();
     $data = array('suspendido' => $suspendido);
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('pokebolas',$data);
     //$db->pretty();
     foreach ($catalogos as $cata){ ?>
     <option value="<?php echo $cata['id']; ?>"><?php echo "Pokebola ".$cata['id'];?></option>
     <?php } ?>
     </select>
    </div>
    </div>
    <input type="hidden" class="form-control" id="suspendido" name="suspendido" value="1">
    <button type="submit" class="btn btn-primary">Guardar</button>
   </form>
<?php include "footer.php" ?>
