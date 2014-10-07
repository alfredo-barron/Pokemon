<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
   include "DB.php"; ?>
   <div align="center"><h2>Enfermeras</h2></div>
   <div>
    <form method="POST" action="saveenfermeras.php" role="form">
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Apellidos</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required>
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
    <label for="inputEmail3" class="col-sm-2 control-label">Cedula Profesional</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cedula Profesional" required>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Centro Pokemon</label>
    <select class="form-control" id="id_centro_pokemon" name="id_centro_pokemon" required>
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
