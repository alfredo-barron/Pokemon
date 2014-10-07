<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>
<div align="center"><h2>Asignar Area de Descanso</h2></div>

<form method="POST" action="savecamas.php" role="form">

 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">En uso</label>
    <select class="form-control" id="en_uso" name="en_uso">
    <option selected value="-1">Seleccionar</option>
    <option value="1">Si</option>
    <option value="0">No</option>
    </select>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Habitacion</label>
    <select class="form-control" id="id_habitacion" name="id_habitacion">
    <option value="0" selected>Seleccionar</option>
     <?php
     $suspendido=1;
     $data = array();
     $data = array('suspendido' => $suspendido);
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('habitaciones',$data);
     //$db->pretty();
     foreach ($catalogos as $cata){ ?>
     <option value="<?php echo $cata['id']; ?>"><?php echo "Habitacion ".$cata['id'];?></option>
     <?php } ?>
     </select>
     </div>
     </select>
     </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Entrenador</label>
    <select class="form-control" id="id_entrenador" name="id_entrenador">
    <option value="0" selected>Seleccionar</option>
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
     <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

<?php include "footer.php" ?>
