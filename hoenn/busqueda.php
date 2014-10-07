<?php include "header.php"; ?>
<?php
      $id = $_POST['id'];
	  $data = array();
      $data = array('id' => $id); ?>

     <?php $db = new DB("root","root","localhost","centrospokemon");
     $enfermeras = $db->findAll('enfermeras',$data);
     //$db->pretty();
     foreach ($enfermeras as $enfe){ ?>
    <form method="POST" action="saveenfermeras.php">
	<input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $enfe['nombre']; ?>"> <br>
	<input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" value="<?php echo $enfe['apellidos']; ?>"> <br>
	<input type="text" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de nacimiento" value="<?php echo $enfe['fecha_nacimiento']; ?>"> <br>
	<input type="text" id="fecha_graduacion" name="fecha_graduacion" placeholder="Fecha de graduacion" value="<?php echo $enfe['fecha_graduacion']; ?>"> <br>
	<input type="text" id="cedula" name="cedula" placeholder="Cedula profesional" value="<?php echo $enfe['cedula']; ?>"> <br>
	<input type="text" id="id_centro_pokemon" name="id_centro_pokemon" placeholder="Centro" value="<?php echo $enfe['id_centro_pokemon']; ?>"><br>
	<button type="submit">Actualizar</button>&nbsp;&nbsp;&nbsp;<button type="submit">Darse de baja</button>
</form>
<?php } ?>
<?php include "footer.php"; ?>
