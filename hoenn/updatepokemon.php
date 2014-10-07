<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
        include "DB.php"; ?>
   <div align="center"><h2>Actualizar Pokemon</h2></div>
   <div>
     <form method="POST" action="updatepokemon.php">
  <label for="inputEmail3" class="col-sm-2 control-label">Busqueda</label>
     <select class="form-control" id="id" name="id">
     <option value="0" selected>Seleccionar</option>
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
     <button type="submit" class="btn btn-success">Buscar</button>
     </div>
     </div>
     </form>

     <?php
      $id = $_POST['id'];
      $data = array();
      $data = array('id' => $id); ?>

     <?php $db = new DB("root","root","localhost","centrospokemon");
     $pokemon = $db->findAll('pokemon',$data);
     //$db->pretty();
     foreach ($pokemon as $poke){ ?>

    <form method="POST" role="form">
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Folio</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="id" name="id" value="<?php echo $poke['id']; ?>" readonly>
    </div>
    </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Especie</label>
    <select class="form-control" id="especie" name="especie">
    <?php
     $centropoke = $poke['especie'];
     $data = array();
     $data = array('id' => $centropoke);
     $db = new DB("root","root","localhost","centrospokemon");
     $centros = $db->findAll('vista_pokemondispo',$data);
     foreach ($centros as $cen){ ?>
     <option value="<?php echo $centropoke; ?>" select><?php echo $cen['especie'];?></option>
     <?php } ?>
     <?php
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('vista_pokemondispo');
     //$db->pretty();
     foreach ($catalogos as $cata){ ?>
     <option value="<?php echo $poke['id']; ?>" ><?php echo $cata['especie'];?></option>
     <?php } ?>
     </select>
     </div>
     </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Alias</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="alias" name="alias" value="<?php echo $poke['alias']; ?>" >
    </div>
    </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Sexo</label>
    <select class="form-control" id="sexo" name="sexo">
    <?php
     $valor=$poke['sexo'];
    if($valor=="Masculino"){ ?>
        <option value="1" selected>Masculino</option>
        <option value="2">Femenino</option>
     <?php   }
        else{
         ?>
        <option value="1">Masculino</option>
        <option value="2" selected>Femenino</option>
       <?php } ?>
     </select>
     </div>
     </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nivel</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="nivel" name="nivel"value="<?php echo $poke['nivel']; ?>" min="1" max="100">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Intercambiar</label>
    <select class="form-control" id="es_intercambiable" name="es_intercambiable">
    <?php
     $valor=$poke['es_intercambiable'];
    if($valor==1){ ?>
        <option value="1" selected>Si</option>
        <option value="0">No</option>
     <?php   }
        else{
         ?>
        <option value="1">Si</option>
        <option value="0" selected>No</option>
       <?php } ?>
     </select>
     </div>
     </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Hit Points</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="hit_points" name="hit_points" value="<?php echo $poke['hit_points']; ?>" min="1" max="150">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Ataque</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="ataque" name="ataque" value="<?php echo $poke['ataque']; ?>" min="1" max="150">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Defensa</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="defensa" name="defensa" value="<?php echo $poke['defensa']; ?>" min="1" max="150">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Velocidad</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="velocidad" name="velocidad" value="<?php echo $poke['velocidad']; ?>" min="1" max="150">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Evasion</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="evasion" name="evasion" value="<?php echo $poke['evasion']; ?>" min="1" max="150">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Precision</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="prezision" name="prezision" value="<?php echo $poke['prezision']; ?>" min="1" max="150">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
    <select class="form-control" id="estatus" name="estatus">
      <?php
     $centropoke = $poke['estatus'];
     $data = array();
     $data = array('id' => $centropoke);
     $db = new DB("root","root","localhost","centrospokemon");
     $centros = $db->findAll('catalogo_estatus',$data);
     foreach ($centros as $cen){ ?>
     <option value="<?php echo $centropoke; ?>" select><?php echo $cen['nombre'];?></option>
     <?php } ?>
     <?php
     $db = new DB("root","root","localhost","centrospokemon");
     $estatus = $db->findAll('catalogo_estatus');
     //$db->pretty();
     foreach ($estatus as $est){ ?>
     <option value="<?php echo $poke['estatus']; ?>" ><?php echo $est['nombre'];?></option>
     <?php } ?>
     </select>
     </div>
     </div>
     <input type="hidden" class="form-control" id="suspendido" name="suspendido" value="0">
     <div align="right">
     <input type="submit" onclick = "this.form.action = 'saveapokemon.php'" value="Actualizar" class="btn btn-primary"/>
     <input type="submit" onclick = "this.form.action = 'dar_baja3.php'" value="Darse de baja" class="btn btn-primary"/>
    </div>
    </form>
    </div>
    <?php } ?>
<?php include "footer.php" ?>
