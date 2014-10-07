<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
   include "DB.php"; ?>
   <div align="center"><h2>Ayudantes Pokemon</h2></div>
     <form method="POST" action="saveayudantes.php" role="form">

    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Especie</label>
    <select class="form-control" id="tipo" name="tipo">
    <option value="0" selected>Seleccionar</option>
     <?php
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('vista_cataloayudantes');
     //$db->pretty();
     foreach ($catalogos as $cata){ ?>
     <option value="<?php echo $cata['id']; ?>"><?php echo $cata['especie'];?></option>
     <?php } ?>
     </select>
     </div>
     </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Fecha de Nacimiento</label>
    <div class="col-sm-10">
    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="aaaa - mm - dd" required>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Fecha de Graduacion</label>
    <div class="col-sm-10">
    <input type="date" class="form-control" id="fecha_graduacion" name="fecha_graduacion" placeholder="aaaa - mm - dd" required>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Enfermera</label>
    <select class="form-control" id="id_enfermera" name="id_enfermera">
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
    <label for="inputEmail3" class="col-sm-2 control-label">Centro Pokemon</label>
    <select class="form-control" id="id_centro_pokemon" name="id_centro_pokemon">
    <option value="0" selected>Seleccionar</option>
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
     <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
<?php include "footer.php" ?>
