<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>
<div align="center"><h2>Agregar Nueva Habilidad</h2></div>
<br>
<form method="POST" action="savehabilidad.php" role="form">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Habilidad</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Habilidad" required>
    </div>
    </div> 
    <button type="submit" class="btn btn-primary">Guardar</button> 
</form>
<?php include "footer.php" ?>