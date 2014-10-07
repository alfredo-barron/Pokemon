<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>
<div align="center"><h2>Activar un Regenerador</h2></div>
<br>
<form method="POST" action="saveregeneradores.php" role="form">
 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Slots</label>
    <select class="form-control" id="slots" name="slots">
    <option selected value="0">Seleccionar</option>
     <option value="1">50</option>
     <option value="2">75</option>
     <option value="3">100</option>
     <option value="4">150</option>
     </select>
     </div>
     </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Slots Funcionales</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="slots_funcionales" name="slots_funcionales" placeholder="Slots Funcionales" min="1" max="150" required>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Mantenimiento</label>
    <select class="form-control" id="esta_mantenimiento" name="esta_mantenimiento">
     <option selected value="-1">Seleccionar</option>
     <option value="0">No</option>
     <option value="1">Si</option>
     </select>
     </div>
     </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Centro Pokemon</label>
    <select class="form-control" id="id_centro_pokemon" name="id_centro_pokemon">
    <option selected value="0">Seleccionar</option>
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
    <button type="submit" class="btn btn-primary">Guardar</button>
      </form>

<?php include "footer.php"; ?>
