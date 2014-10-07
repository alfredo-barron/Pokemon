<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
        include "DB.php"; ?>

         <div align="center"><h2>Catalogo Pokemon</h2></div>
   <div>
    <form method="POST" action="savecatalogopokemon.php" role="form">
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Especie</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="especie" name="especie" placeholder="Especie">
    </div>
    </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Region</label>
    <select class="form-control" id="region" name="region">
    <option selected value="0">Seleccionar</option>
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
    <label for="inputEmail3" class="col-sm-2 control-label">Hit Points</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="hit_points" name="hit_points" placeholder="Hit Points">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Ataque</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="ataque" name="ataque" placeholder="Ataque">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Defensa</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="defensa" name="defensa" placeholder="Defensa">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Velocidad</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="velocidad" name="velocidad" placeholder="Velocidad">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Evasion</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="evasion" name="evasion" placeholder="Evasion">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Precision</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="prezision" name="prezision" placeholder="Precision">
    </div>
    </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Evoluciona</label>
    <select class="form-control" id="evol_trans" name="evol_trans">
    <option selected value="-1">Seleccionar</option>
    <option value="1">Si</option>
    <option value="0">No</option>
     </select>
     </div>
     </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    </div>
<?php include "footer.php" ?>
