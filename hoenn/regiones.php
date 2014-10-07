<?php include "header.php"; ?>
<?php include "DB.php"; ?>
<form method="POST" action="saveregiones.php">
	<input type="text" id="nombre" name="nombre" placeholder="Nombre"> </br>
	<button type="submit">Guardar</button>
</form>
<?php
$db = new DB("root","root","localhost","centrospokemon");
$regiones = $db->findAll('regiones');
//$db->pretty();
foreach ($regiones as $region){
  echo $region['id']." - ".$region['nombre']." <a style=\"color:red\" href=\"delete.php?id=".$region['id']."\">&times;</a> | <a href=\"update.php?id=".$region['id']."\">Editar</a><br/>";
}
?>
<?php include "footer.php"; ?>
