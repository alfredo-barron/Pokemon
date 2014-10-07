<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
        include "DB.php"; ?>

         <div align="center"><h2>Pokemon</h2></div>
   <div>
    <form method="POST" action="savepokemon.php" role="form">
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Especie</label>
    <select class="form-control" id="especie" name="especie">
    <option value="0" selected>Seleccionar</option>
     <?php
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('vista_pokemondispo');
     //$db->pretty();
     foreach ($catalogos as $cata){ ?>
     <option value="<?php echo $cata['id']; ?>"><?php echo $cata['especie'];?></option>
     <?php } ?>
     </select>
     </div>
     </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Alias</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="alias" name="alias" placeholder="Alias">
    </div>
    </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Sexo</label>
    <select class="form-control" id="sexo" name="sexo">
    <option value="0" selected>Seleccionar</option>
    <option value="1">Masculino</option>
    <option value="2">Femenino</option>
     </select>
     </div>
     </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nivel</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="nivel" name="nivel" placeholder="Nivel" min="1" max="100" required>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Intercambiar</label>
    <select class="form-control" id="es_intercambiable" name="es_intercambiable">
    <option value="-1" selected>Seleccionar</option>
    <option value="1">Si</option>
    <option value="0">No</option>
     </select>
     </div>
     </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Hit Points</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="hit_points" name="hit_points" placeholder="Hit Points" min="1" max="150" required>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Ataque</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="ataque" name="ataque" placeholder="Ataque" min="1" max="150" required>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Defensa</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="defensa" name="defensa" placeholder="Defensa" min="1" max="150" required>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Velocidad</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="velocidad" name="velocidad" placeholder="Velocidad" min="1" max="150" required>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Evasion</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="evasion" name="evasion" placeholder="Evasion" min="1" max="150" required>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Precision</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="prezision" name="prezision" placeholder="Precision" min="1" max="100" required>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
    <select class="form-control" id="estatus" name="estatus">
    <option value="0" selected>Seleccionar</option>
     <?php
     $db = new DB("root","root","localhost","centrospokemon");
     $estatus = $db->findAll('catalogo_estatus');
     //$db->pretty();
     foreach ($estatus as $est){ ?>
     <option value="<?php echo $est['id']; ?>"><?php echo $est['nombre'];?></option>
     <?php } ?>
     </select>
     </div>
     </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    </div>
<?php include "footer.php" ?>
