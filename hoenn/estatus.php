<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>
<div align="center"><h2>Agregar Nuevo Status</h2></div>
<br>
<form method="POST" action="saveestatus.php" role="form">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Status" required>
    </div>
    </div> 
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Tiempo</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="tiempo" name="tiempo" placeholder="Tiempo" required min="1" max="500">
    </div>
    </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Desaparece en</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="desaparece_a" name="desaparece_a" placeholder="Desaparece" required min="1" max="100">
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button> 
</form>
<?php include "footer.php" ?>