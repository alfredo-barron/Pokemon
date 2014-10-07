<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
   include "DB.php"; ?>
   <div align="center"><h2>Actualizar Habitacion</h2></div>
   <form method="POST" action="consultarcamas.php" role="form">
	  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Busqueda</label>
    <select class="form-control" id="id" name="id">
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
    <button type="submit" class="btn btn-success">Buscar</button>
    </div>
    </div>

     <table class="table table-hover">
     <tr>
     <td><b>#</b></td>
     <td><b>Habitacion</b></td>
     <td><b>Nombre</b></td>
     <td><b>Apellidos</b></td>
     <td><b>Alias</b></td>
     <td><b>Uso</b></td>
     </tr>
    <?php
     $id = $_POST['id'];
     $data = array();
     $data = array('id_habitacion' => $id);
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('vista_camas',$data); ?>
     <?php foreach ($catalogos as $cata){ ?>
     <tr>
     <td><?php echo $cata['id'] ?></td>
     <td><?php echo $cata['id_habitacion'] ?></td>
     <td><?php echo $cata['nombre'] ?></td>
     <td><?php echo $cata['apellidos'] ?></td>
     <td><?php echo $cata['alias'] ?></td>
     <td><?php $si=$cata['en_uso'];
     if($si==1){
        $valor = "Si";
     }
     else{
        $valor = "No";
     }
     echo $valor;
      ?></td>
     </tr>
    </table>
     <?php } ?>
<?php include "footer.php" ?>
