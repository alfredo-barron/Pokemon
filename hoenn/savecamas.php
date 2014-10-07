<?php
include "DB.php";
$en_uso = $_POST['en_uso'];
$id_habitacion = $_POST['id_habitacion'];
$id_entrenador = $_POST['id_entrenador'];
$id = (isset($_POST['id'])) ? $_POST['id'] : 0;

if($en_uso != 0){
	$db = new DB("root","root","localhost","centrospokemon");
    $data = array();
    if($id == 0){
    	$data = array('en_uso' => $nombre,
                    'id_habitacion' => $id_habitacion,
                    'id_entrenador' => $id_entrenador);
      $db->save("camas",$data);
header("Location:camas.php");
    }
    else {
   		$data = array('en_uso' => $en_uso,
                    'id_habitacion' => $id_habitacion,
                    'id_entrenador' => $id_entrenador,
                    'id' => $id);
      $db->save("camas",$data);
      header("Location:updatecamas.php");
  }
  }

?>
