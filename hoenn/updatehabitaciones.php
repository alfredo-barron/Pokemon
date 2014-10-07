<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
   include "DB.php"; ?>
   <div align="center"><h2>Actualizar Habitacion</h2></div>
   <form method="POST" action="updatehabitaciones.php" role="form">
	  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Busqueda</label>
    <select class="form-control" id="id" name="id">
    <option value="0" selected>Seleccionar</option>
     <?php
     $suspendido=1;
     $data = array();
     $data = array('suspendido' => $suspendido);
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('habitaciones',$data);
     //$db->pretty();
     foreach ($catalogos as $cata){ ?>
     <option value="<?php echo $cata['id']; ?>"><?php echo "Habitacion ".$cata['id'];?></option>
     <?php } ?>
     </select>
    <button type="submit" class="btn btn-success">Buscar</button>
    </div>
    </div>
</form>
   <?php
      $id = $_POST['id'];
      $data = array();
      $data = array('id' => $id); ?>

     <?php $db = new DB("root","root","localhost","centrospokemon");
     $ayudantes = $db->findAll('habitaciones',$data);
     //$db->pretty();
     foreach ($ayudantes as $ayu){ ?>
<form method="POST" role="form">
 <div class="form-group">
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Folio</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="id" name="id" placeholder="Folio" value="<?php echo $ayu['id']; ?>" readonly>
    </div>
    </div>
    <label for="inputEmail3" class="col-sm-2 control-label">Capacidad</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="capacidad" name="capacidad" value="<?php echo $ayu['capacidad']; ?>" min="1" max="15" required>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Centro Pokemon</label>
    <select class="form-control" id="id_centro_pokemon" name="id_centro_pokemon">
      <?php
     $centropoke = $ayu['id_centro_pokemon'];
     $data = array();
     $data = array('id' => $centropoke);
     $db = new DB("root","root","localhost","centrospokemon");
     $centros = $db->findAll('centros_pokemon',$data);
     foreach ($centros as $cen){ ?>
     <option value="<?php echo $centropoke; ?>" select><?php echo $cen['nombre'];?></option>
     <?php } ?>
     <?php
     $db = new DB("root","root","localhost","centrospokemon");
     $centros = $db->findAll('centros_pokemon');
     //$db->pretty();
     foreach ($centros as $cen){ ?>
     <option value="<?php echo $cen['id']; ?>"><?php echo $cen['nombre'];?></option>
     <?php } ?>
     </select>
     </div>
     </div>
     <input type="hidden" class="form-control" id="suspendido" name="suspendido" value="0">
    <div align="right">
    <input type="submit" onclick = "this.form.action = 'savehabitaciones.php'" value="Actualizar" class="btn btn-primary"/>
    <input type="submit" onclick = "this.form.action = 'dar_baja6.php'" value="Darse de baja" class="btn btn-primary"/>
    </div>
    </form>
<?php } ?>
<?php include "footer.php" ?>
