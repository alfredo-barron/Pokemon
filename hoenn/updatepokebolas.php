<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
   include "DB.php"; ?>
   <div align="center"><h2>Actualizar Pokebolas</h2></div>
     <form method="POST" action="updatepokebolas.php" role="form">
	  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Busqueda</label>
    <select class="form-control" id="id" name="id">
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
    <button type="submit" class="btn btn-success">Buscar</button>
    </div>
    </div>
</form>
<?php
      $id = $_POST['id'];
	  $data = array();
      $data = array('id' => $id);
      $db = new DB("root","root","localhost","centrospokemon");
     $enfermeras = $db->findAll('pokebolas',$data);
      foreach ($enfermeras as $enfe){ ?>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Entrenador</label>
    <select class="form-control" id="id_entrenador" name="id_entrenador">
    <option value="<?php echo $enfe['id_entrenador']?>" selected>Seleccionar</option>
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
     </div>
     </div>
     <label for="inputEmail3" class="col-sm-2 control-label">Pokemon</label>
     <select class="form-control" id="id_pokemon" name="id_pokemon">
       <option value="<?php echo $enfe['id_pokemon']?>" selected>Seleccionar</option>
     <?php
     $suspendido=1;
     $data = array();
     $data = array('suspendido' => $suspendido);
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('vista_pokemon',$data);
     //$db->pretty();
     foreach ($catalogos as $cata){ ?>
     <option value="<?php echo $cata['id']; ?>"><?php echo $cata['especie']." Alias: ".$cata['alias'];?></option>
     <?php } ?>
     </select>
     </div>
     </div>
     <input type="hidden" id="archivada" name="archivada" value="0">
     <input type="hidden" id="suspendido" name="suspendido" value="0">
     <div align="right">
     <input type="submit" onclick = "this.form.action = 'savepokebolas.php'" value="Actualizar" class="btn btn-primary"/>
	<input type="submit" onclick = "this.form.action = 'dar_baja4.php'" value="Darse de baja" class="btn btn-primary"/>
	<input type="submit" onclick = "this.form.action = 'desarchivar.php'" value="Desarchivar" class="btn btn-primary"/>
	</div>
       <?php } ?>
<?php include "footer.php" ?>
