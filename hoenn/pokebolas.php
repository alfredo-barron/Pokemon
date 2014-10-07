<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>
<div align="center"><h2>Asignar Pokebola</h2></div>
<br>
<form method="POST" action="savepokebolas.php" role="form">
 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Entrenador</label>
    <select class="form-control" id="id_entrenador" name="id_entrenador">
    <option selected value="0">Seleccionar</option>
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
     </div>
     </div>
     <label for="inputEmail3" class="col-sm-2 control-label">Pokemon</label>
     <select class="form-control" id="id_pokemon" name="id_pokemon">
     <option selected value="0">Seleccionar</option>
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
     </div>
     </div>
     <input type="hidden" id="archivada" name="archivada" value="1">
     <br>
     <div align="center">
     	<button><img src="./images/pokebola.gif"></button>
     	<h3>Atrapalo ya!</h3>
     </div>
     </form>


<?php include "footer.php"; ?>
