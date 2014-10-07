<?php include "header.php";
   include "DB.php"; ?>
     <form method="POST" action="savecentros.php">
	 <input type="text" id="nombre" name="nombre" placeholder="Nombre"> <br>
     Region: <select id="id_region" name="id_region">
     <?php
     $db = new DB("root","root","localhost","centrospokemon");
     $regiones = $db->findAll('regiones');
     //$db->pretty();
     foreach ($regiones as $region){ ?>
     <option value="<?php echo $region['id']; ?>"><?php echo $region['nombre'];?></option>
     <?php } ?>
     </select> <br>
	 <input type="password" id="password" name="password" placeholder="Password"> <br>
	      <button type="submit">Guardar</button>
    </form>
<?php include "footer.php" ?>
