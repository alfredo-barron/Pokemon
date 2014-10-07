<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>
     <div align="center"><h2>Actualizar Ayudantes Pokemon</h2></div>
<form method="POST" action="updateayudantes.php" role="form">
	     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Busqueda</label>
    <select class="form-control" id="id" name="id">
    <option value="0" selected>Seleccionar</option>
     <?php
     $suspendido=1;
     $data = array();
     $data = array('suspendido' => $suspendido);
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('vista_ayudantes',$data);
     //$db->pretty();
     foreach ($catalogos as $cata){ ?>
     <option value="<?php echo $cata['id']; ?>"><?php echo $cata['id'].": ".$cata['especie'];?></option>
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
     $ayudantes = $db->findAll('ayudantes',$data);
     //$db->pretty();
     foreach ($ayudantes as $ayu){ ?>
    <form method="POST" role="form">
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Folio</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="id" name="id" placeholder="Folio" value="<?php echo $ayu['id']; ?>" readonly>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Tipo</label>
    <select class="form-control" id="tipo" name="tipo">
     <?php
     $centropoke = $ayu['tipo'];
     $data = array();
     $data = array('id' => $centropoke);
     $db = new DB("root","root","localhost","centrospokemon");
     $centros = $db->findAll('vista_cataloayudantes',$data);
     foreach ($centros as $cen){ ?>
     <option value="<?php echo $centropoke; ?>" select><?php echo $cen['especie'];?></option>
     <?php } ?>
     <?php
     $db = new DB("root","root","localhost","centrospokemon");
     $centros = $db->findAll('vista_cataloayudantes');
     //$db->pretty();
     foreach ($centros as $cen){ ?>
     <option value="<?php echo $cen['id']; ?>"><?php echo $cen['especie'];?></option>
     <?php } ?>
     </select>
     </div>
     </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Fecha de Nacimiento</label>
    <div class="col-sm-10">
    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="aaaa - mm - dd" value="<?php echo $ayu['fecha_nacimiento']; ?>">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Fecha de Graduacion</label>
    <div class="col-sm-10">
    <input type="date" class="form-control" id="fecha_graduacion" name="fecha_graduacion" placeholder="aaaa - mm - dd" value="<?php echo $ayu['fecha_graduacion']; ?>">
    </div>
    </div>
      <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Enfermera</label>
    <select class="form-control" id="id_enfermera" name="id_enfermera">
     <?php
     $centropoke = $ayu['id_enfermera'];
     $data = array();
     $data = array('id' => $centropoke);
     $db = new DB("root","root","localhost","centrospokemon");
     $centros = $db->findAll('vista_enfermeras1',$data);
     foreach ($centros as $cen){ ?>
     <option value="<?php echo $centropoke; ?>" select><?php echo $cen['nombre']." ".$cen['apellidos'];?></option>
     <?php } ?>

     <?php
     $suspendido=1;
     $data = array();
     $data = array('suspendido' => $suspendido);
     $db = new DB("root","root","localhost","centrospokemon");
     $centros = $db->findAll('enfermeras',$data);
     //$db->pretty();
     foreach ($centros as $cen){ ?>
     <option value="<?php echo $cen['id']; ?>"><?php echo $cen['nombre']." ".$cen['apellidos'];?></option>
     <?php } ?>
     </select>
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
     $suspendido=1;
     $data = array();
     $data = array('suspendido' => $suspendido);
     $db = new DB("root","root","localhost","centrospokemon");
     $centros = $db->findAll('centros_pokemon',$data);
     //$db->pretty();
     foreach ($centros as $cen){ ?>
     <option value="<?php echo $cen['id']; ?>"><?php echo $cen['nombre'];?></option>
     <?php } ?>
     </select>
     </div>
     </div>
    <div class="form-group">
    <div class="col-sm-10">
    <input type="hidden" class="form-control" id="suspendido" name="suspendido" value="0">
    </div>
    </div>
    <div align="right">
	<input type="submit" onclick = "this.form.action = 'saveayudantes.php'" value="Actualizar" class="btn btn-primary"/>
	<input type="submit" onclick = "this.form.action = 'dar_baja1.php'" value="Darse de baja" class="btn btn-primary"/>
    </div>
</form>
<?php } ?>

<?php include "footer.php"; ?>
