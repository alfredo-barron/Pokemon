<?php include "header.php"; ?>
<h1>Centro Pokemon Arrecipolis</h1>
<?php include "menu.php";
      include "DB.php"; ?>

 <?php $id = $_GET['id'];
	  $slots = $_GET['slots'];
	  $slots_funcionales = $_GET['slots_funcionales'];
?>
  <?php
     $db = new DB("root","root","localhost","centrospokemon");
     $data=array();
     $data = array('id_regenerador' => $id);
     $db->find("registros",['suspendido'=>1]);
     $ingresadas=$db->count();
     ?>

     <?php
     $db = new DB("root","root","localhost","centrospokemon");
     $data=array();
     $data = array('id_regenerador' => $id);
     $db->find("registros",['suspendido'=>0]);
     $retiradas=$db->count();
     ?>

<div align="center"><h2>Regenerador <?php echo $id; ?></h2><br><br><br>
  <h3>Slots:<b> <?php echo $slots; ?></b> </h3>
  <h3>Slots Funcionales:<b> <?php echo $slots_funcionales; ?></b></h3>
  <h3>Pokebolas Ingresadas:<b> <?php echo $ingresadas; ?></b></h3>
  <h3>Pokebolas Retiradas:<b> <?php echo $retiradas; ?></b></h3>
</div>

<?php include "footer.php"; ?>
