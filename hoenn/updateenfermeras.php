<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>
     <div align="center"><h2>Actualizar Enfermeras</h2></div>
<form method="POST" action="updateenfermeras.php" role="form">
	  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Busqueda</label>
    <select class="form-control" id="id" name="id">
    <option value="0" selected>Seleccionar</option>
     <?php
     $suspendido=1;
     $data = array();
     $data = array('suspendido' => $suspendido);
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('enfermeras',$data);
     //$db->pretty();
     foreach ($catalogos as $cata){ ?>
     <option value="<?php echo $cata['id']; ?>"><?php echo $cata['nombre']." ".$cata['apellidos'];?></option>
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
     $enfermeras = $db->findAll('enfermeras',$data);
     //$db->pretty();
     foreach ($enfermeras as $enfe){ ?>
    <form method="POST" role="form">
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Folio</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="id" name="id" placeholder="Folio" value="<?php echo $enfe['id']; ?>" readonly>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $enfe['nombre']; ?>">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Apellidos</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" value="<?php echo $enfe['apellidos']; ?>">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Fecha de Nacimiento</label>
    <div class="col-sm-10">
    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="aaaa - mm - dd" value="<?php echo $enfe['fecha_nacimiento']; ?>">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Fecha de Graduacion</label>
    <div class="col-sm-10">
    <input type="date" class="form-control" id="fecha_graduacion" name="fecha_graduacion" placeholder="aaaa - mm - dd" value="<?php echo $enfe['fecha_graduacion']; ?>">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Cedula Profesional</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cedula Profesional" value="<?php echo $enfe['cedula']; ?>">
    </div>
    </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Centro Pokemon</label>
    <select class="form-control" id="id_centro_pokemon" name="id_centro_pokemon">
    <?php
     $centropoke = $enfe['id_centro_pokemon'];
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
	<input type="submit" onclick = "this.form.action = 'saveenfermeras.php'" value="Actualizar" class="btn btn-primary"/>
	<input type="submit" onclick = "this.form.action = 'dar_baja.php'" value="Darse de baja" class="btn btn-primary"/>
    </div>
</form>
<?php } ?>
<?php include "footer.php"; ?>
