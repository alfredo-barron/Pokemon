<?php
include "DB.php";
$suspendido = $_POST['suspendido'];
$id = (isset($_POST['id'])) ? $_POST['id'] : 0;

if($suspendido != ""){
	$db = new DB("root","root","localhost","centrospokemon");
    $data = array();
    if($id != 0){
      $data = array('suspendido' => $suspendido, 'id' => $id);
    }
  }
  $db->save("habitaciones",$data);
header("Location:updatehabitaciones.php");
?>
