<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
   include "DB.php"; ?>
   <div align="center"><h2>Entrenadores</h2></div>
   <div>
    <form method="POST" action="saveentrenadores.php" role="form">
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
    <label for="inputEmail3" class="col-sm-2 control-label">Alias</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="alias" name="alias" placeholder="Alias" required>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
    <input type="password" id="password" name="password" placeholder="Password"  class="form-control" required>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Fecha de Nacimiento</label>
    <div class="col-sm-10">
    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="aaaa - mm - dd" required>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Lugar de Nacimiento</label>
    <select class="form-control" id="lugar_nacimiento" name="lugar_nacimiento" required>
    <option value="0" selected>Seleccionar</option>
     <?php
     $db = new DB("root","root","localhost","centrospokemon");
     $regiones = $db->findAll('regiones');
     //$db->pretty();
     foreach ($regiones as $region){ ?>
     <option value="<?php echo $region['id']; ?>"><?php echo $region['nombre'];?></option>
     <?php } ?>
     </select>
     </div>
     </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Sexo</label>
    <select class="form-control" id="sexo" name="sexo">
    <option value="0" selected>Seleccionar</option>
    <option value="1">Hombre</option>
    <option value="2">Mujer</option>
     </select>
     </div>
     </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Lider</label>
    <select class="form-control" id="es_lider" name="es_lider">
    <option value="-1" selected>Seleccionar</option>
    <option value="1">Si</option>
    <option value="0">No</option>
     </select>
     </div>
     </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Localizacion Actual</label>
    <select class="form-control" id="localizacion_actual" name="localizacion_actual">
    <option value="0" selected>Seleccionar</option>
     <?php
     $db = new DB("root","root","localhost","centrospokemon");
     $regiones = $db->findAll('regiones');
     //$db->pretty();
     foreach ($regiones as $region){ ?>
     <option value="<?php echo $region['id']; ?>"><?php echo $region['nombre'];?></option>
     <?php } ?>
     </select>
     </div>
     </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
<?php include "footer.php" ?>
