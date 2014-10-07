<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>
<div align="center"><h2>Activar un Espacio</h2></div>

<form method="POST" action="savehabitaciones.php" role="form">
 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Capacidad</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="capacidad" name="capacidad" placeholder="Capacidad" min="1" max="15" required>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Centro Pokemon</label>
    <select class="form-control" id="id_centro_pokemon" name="id_centro_pokemon">
    <option value="0" selected>Seleccionar</option>
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

<?php include "footer.php" ?>
