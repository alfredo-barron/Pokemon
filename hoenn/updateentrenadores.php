<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>
     <div align="center"><h2>Actualizar Entrenadores</h2></div>
<form method="POST" action="updateentrenadores.php" role="form">
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Busqueda</label>
    <select class="form-control" id="id" name="id">
    <option value="0" selected>Seleccionar</option>
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
    <button type="submit" class="btn btn-success">Buscar</button>
    </div>
    </div>
</form>
<?php
      $id = $_POST['id'];
      $data = array();
      $data = array('id' => $id); ?>

     <?php $db = new DB("root","root","localhost","centrospokemon");
     $entrenadores = $db->findAll('entrenadores',$data);
     //$db->pretty();
     foreach ($entrenadores as $entre){ ?>
    <form method="POST" role="form">
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Folio</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="id" name="id" placeholder="Folio" value="<?php echo $entre['id']; ?>" readonly>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $entre['nombre']; ?>">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Apellidos</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" value="<?php echo $entre['apellidos']; ?>">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Alias</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="alias" name="alias" placeholder="Alias" value="<?php echo $entre['alias']; ?>">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $entre['password']; ?>">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Fecha de Nacimiento</label>
    <div class="col-sm-10">
    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="aaaa - mm - dd" value="<?php echo $entre['fecha_nacimiento']; ?>">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Lugar de Nacimiento</label>
    <select class="form-control" id="lugar_nacimiento" name="lugar_nacimiento">
      <?php
     $centropoke = $entre['lugar_nacimiento'];
     $data = array();
     $data = array('id' => $centropoke);
     $db = new DB("root","root","localhost","centrospokemon");
     $regiones = $db->findAll('regiones',$data);
     foreach ($regiones as $region){ ?>
     <option value="<?php echo $centropoke; ?>" select><?php echo $region['nombre'];?></option>
     <?php } ?>
     <?php
     $db = new DB("root","root","localhost","centrospokemon");
     $centros = $db->findAll('regiones');
     //$db->pretty();
     foreach ($centros as $cen){ ?>
     <option value="<?php echo $cen['id']; ?>"><?php echo $cen['nombre'];?></option>
     <?php } ?>
     </select>
     </div>
     </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Sexo</label>
    <div class="col-sm-10">
    <select class="form-control" id="sexo" name="sexo">
    <?php
     $valor=$entre['sexo'];
    if($valor=="Hombre"){ ?>
        <option value="1" selected>Hombre</option>
        <option value="2">Mujer</option>
     <?php   }
        else{
         ?>
        <option value="1">Hombre</option>
        <option value="2" selected>Mujer</option>
       <?php } ?>
    </select>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Lider</label>
    <div class="col-sm-10">
    <select class="form-control" id="es_lider" name="es_lider">
    <?php
     $valor=$entre['es_lider'];
    if($valor==1){ ?>
        <option value="1" selected>Si</option>
        <option value="0">No</option>
     <?php   }
        else{
        $valor=0; ?>
        <option value="1">Si</option>
        <option value="0" selected>No</option>
       <?php } ?>
    </select>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Localizacion Actual</label>
    <select class="form-control" id="localizacion_actual" name="localizacion_actual">
     <?php
     $centropoke = $entre['lugar_nacimiento'];
     $data = array();
     $data = array('id' => $centropoke);
     $db = new DB("root","root","localhost","centrospokemon");
     $regiones = $db->findAll('regiones',$data);
     foreach ($regiones as $region){ ?>
     <option value="<?php echo $centropoke; ?>" select><?php echo $region['nombre'];?></option>
     <?php } ?>
     <?php
     $db = new DB("root","root","localhost","centrospokemon");
     $centros = $db->findAll('regiones');
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
    <input type="submit" onclick = "this.form.action = 'saveentrenadores.php'" value="Actualizar" class="btn btn-primary"/>
    <input type="submit" onclick = "this.form.action = 'dar_baja2.php'" value="Darse de baja" class="btn btn-primary"/>
    </div>
</form>
<?php } ?>
<?php include "footer.php"; ?>
