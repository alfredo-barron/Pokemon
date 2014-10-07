<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>
<div align="center"><h2>Asignar Habilidad</h2></div>
<?php $id = $_GET['id']; ?>

<?php
 	 $data = array();
 	 $data = array('id' => $id);
	 $db = new DB("root","root","localhost","centrospokemon");
     $ayudantes = $db->findAll('vista_poke',$data);
     //$db->pretty();
     foreach ($ayudantes as $ayu){ ?>
     	 <form method="POST" action="savehabilidades.php" role="form">
     	 <input type="hidden" id="id_pokemon" name="id_pokemon" value="<?php echo $ayu['id']; ?>">
         <div class="form-group">
         <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
         <div class="col-sm-10">
         <input type="text" class="form-control" value="<?php echo $ayu['especie']; ?>" readonly>
         </div>
         </div>
         <div align="center"><img src="./images/<?php echo $ayu['imagen'];?>"></div>
     	 <?php } ?>
     	 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Habilidad</label>
    <select class="form-control" id="id_habilidad" name="id_habilidad">
     <?php
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('catalogo_habilidades');
     //$db->pretty();
     foreach ($catalogos as $cata){ ?>
     <option value="<?php echo $cata['id']; ?>"><?php echo $cata['nombre'];?></option>
     <?php } ?>
     </select>
     </div>
     </div>
     <button type="submit" class="btn btn-primary">Guardar</button>
     </form>
<?php include "footer.php"; ?>
