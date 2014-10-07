 <?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>
     <div align="center"><h2>Retirar Pokemon</h2></div>
 <form method="POST" action="registrosfinal.php" role="form">
      <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Busqueda</label>
    <select class="form-control" id="id" name="id">
    <option value="0" selected>Seleccionar</option>
     <?php
     $suspendido=1;
     $data = array();
     $data = array('suspendido' => $suspendido);
     $db = new DB("root","root","localhost","centrospokemon");
     $catalogos = $db->findAll('registros',$data);
     //$db->pretty();
     foreach ($catalogos as $cata){ ?>
     <option value="<?php echo $cata['id']; ?>"><?php echo "Registro ".$cata['id']?></option>
     <?php } ?>
     </select>
    <button type="submit" class="btn btn-success">Buscar</button>
    </div>
    </div>
</form>

<?php
      $id = $_POST['id'];
      $data = array();
      $data = array('id' => $id);
      $db = new DB("root","root","localhost","centrospokemon");
     $ayudantes = $db->findAll('registros',$data);
     //$db->pretty();
     foreach ($ayudantes as $ayu){ ?>
  <form method="POST" action="saveregistros.php" role="form">
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Folio</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="id" name="id" placeholder="Folio" value="<?php echo $ayu['id']; ?>" readonly>
    <input type="hidden" class="form-control" id="enfermera_entrada" name="enfermera_entrada" placeholder="Folio" value="<?php echo $ayu['enfermera_entrada']; ?>" readonly>
    <input type="hidden" class="form-control" id="fecha_entrada" name="fecha_entrada" placeholder="Folio" value="<?php echo $ayu['fecha_entrada']; ?>" readonly>
    <input type="hidden" class="form-control" id="id_regenerador" name="id_regenerador" placeholder="Folio" value="<?php echo $ayu['id_regenerador']; ?>" readonly>
    <input type="hidden" class="form-control" id="id_pokebola" name="id_pokebola" placeholder="Folio" value="<?php echo $ayu['id_pokebola']; ?>" readonly>
    </div>
    </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Enfermera de Salida</label>
    <select class="form-control" id="enfermera_salida" name="enfermera_salida">
    <option value="0" selected>Seleccionar</option>
     <?php
     $suspendido=1;
     $data = array();
     $data = array('suspendido' => $suspendido);
     $db = new DB("root","root","localhost","centrospokemon");
     $enfermeras = $db->findAll('enfermeras',$data);
     //$db->pretty();
     foreach ($enfermeras as $enfe){ ?>
     <option value="<?php echo $enfe['id']; ?>"><?php echo $enfe['nombre']." ".$enfe['apellidos'];?></option>
     <?php } ?>
     </select>
     </div>
     </div>
    <?php
      $id=$_POST['id'];
      $data = array();
      $data = array('id' => $id);
      $db = new DB("root","root","localhost","centrospokemon");
     $regis = $db->findAll('vista_registroestatus',$data);
     foreach ($regis as $r){
            $fecha=$r['fecha_entrada'];
            $hit_points=$r['hit_points'];
            $estatus=$r['estatus'];
            $tiempo=$r['tiempo'];
            $desaparece=$r['desaparece_a'];
        }

function dateadd($date, $dd=0, $mm=0, $yy=0, $hh=0, $mn=0, $ss=0){
      $date_r = getdate(strtotime($date));
      $date_result = date("Y-m-d",

                    mktime(($date_r["hours"]+$hh),
                           ($date_r["minutes"]+$mn),
                           ($date_r["seconds"]+$ss),
                           ($date_r["mon"]+$mm),
                           ($date_r["mday"]+$dd),
                           ($date_r["year"]+$yy)));
                       return $date_result;
      }

      $fecha_estimada=dateadd($fecha,8,0,0,0,0,$segundos);

      $minutos=($hit_points/10)*2.5;
      $segundos=$minutos*60;

      if($estatus==1){
            $segundos+=$tiempo;
            $suspendido=0;

        }
          else if($estatus==7 or $estatus==8){
            $segundos+=$tiempo;
           $suspendido=0;
        }
          else if($estatus==2 or $estatus==3){
            $segundos+=$tiempo;
            $suspendido=0;
        }
          else if($estatus==4 or $estatus==5){
            $segundos+=$tiempo;
             $suspendido=0;
        }
          else if($estatus==6){
            $segundos+=$tiempo;
             $suspendido=0;
        }
        ?>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Fecha Estimada</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="fecha_estimada" name="fecha_estimada" value="<?php echo $fecha_estimada; ?>">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Fecha de Salida</label>
    <div class="col-sm-10">
    <input type="datetime-local" class="form-control" id="fecha_salida" name="fecha_salida" requiered>
    </div>
    </div>
    <input type="hidden" class="form-control" id="estatus" name="estatus" value="1">
    <input type="hidden" class="form-control" id="hit_points" name="hit_points" value="100">
    <input type="hidden" class="form-control" id="suspendido" name="suspendido" value="0">
     <button type="submit" class="btn btn-primary">Retirar</button>
     </form>
      <?php } ?>
    <?php include "footer.php"; ?>
