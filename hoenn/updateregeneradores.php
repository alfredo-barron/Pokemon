<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
   include "DB.php"; ?>
   <div align="center"><h2>Actualizar Regenerador</h2></div>
   <form method="POST" action="updateregeneradores.php" role="form">
	  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Busqueda</label>
    <select class="form-control" id="id" name="id">
    <option value="0" selected>Seleccionar</option>
     <?php
     $suspendido=1;
     $data = array();
     $data = array('suspendido' => $suspendido);
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('regeneradores',$data);
     //$db->pretty();
     foreach ($catalogos as $cata){ ?>
     <option value="<?php echo $cata['id']; ?>"><?php echo "Regenerador ".$cata['id'];?></option>
     <?php } ?>
     </select>
    <button type="submit" class="btn btn-success">Buscar</button>
    </div>
    </div>
</form>

<?php
      $id = $_POST['id'];
      $data = array();
      $data = array('id' => $id); ?>

     <?php $db = new DB("root","root","localhost","centrospokemon");
     $ayudantes = $db->findAll('regeneradores',$data);
     //$db->pretty();
     foreach ($ayudantes as $ayu){ ?>
<form method="POST" role="form">
 <div class="form-group">
       <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Folio</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="id" name="id" placeholder="Folio" value="<?php echo $ayu['id']; ?>" readonly>
    </div>
    </div>
    <label for="inputEmail3" class="col-sm-2 control-label">Slots</label>
    <select class="form-control" id="slots" name="slots">
     <?php $slots = $ayu['slots'];
     switch ($slots) {
         case '50':
             $valor=1;
             break;
        case '75':
             $valor=2;
             break;
        case '100':
             $valor=3;
             break;
        case '150':
             $valor=4;
             break;
     }
     ?>
     <option value="<?php echo $valor; ?>"selected><?php echo $ayu['slots']; ?></option>
     <option value="1" >50</option>
     <option value="2">75</option>
     <option value="3">100</option>
     <option value="4">150</option>
     </select>
     </div>
     </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Slots Funcionales</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="slots_funcionales" name="slots_funcionales" value="<?php echo $ayu['slots_funcionales']; ?>" min="1" max="150" required>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Mantenimiento</label>
    <select class="form-control" id="esta_mantenimiento" name="esta_mantenimiento">
    <?php $mante= $ayu['esta_mantenimiento'];
        if($mante==1){
            $msn="Si";
            $valor = 1;
        }else{
            $msn="No";
            $valor = 0;
        }
     ?>
      <option value="<?php echo $valor; ?>" selected><?php echo $msn; ?></option>
     <option value="0">No</option>
     <option value="1">Si</option>
     </select>
     </div>
     </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Centro Pokemon</label>
    <select class="form-control" id="id_centro_pokemon" name="id_centro_pokemon">
     <?php
     $centropoke = $ayu['id_centro_pokemon'];
     $data = array();
     $data = array('id' => $centropoke);
     $db = new DB("root","root","localhost","centrospokemon");
     $centros = $db->findAll('centros_pokemon',$data);
     foreach ($centros as $cen){ ?>
     <option value="<?php echo $centropoke; ?>" select><?php echo $cen['nombre'];?></option>
     <?php } ?>
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
    <input type="hidden" class="form-control" id="suspendido" name="suspendido" value="0">
    <div align="right">
    <input type="submit" onclick = "this.form.action = 'saveregeneradores.php'" value="Actualizar" class="btn btn-primary"/>
    <input type="submit" onclick = "this.form.action = 'dar_baja5.php'" value="Darse de baja" class="btn btn-primary"/>
    </div>
      </form>

<?php } ?>
<?php include "footer.php" ?>
