<?php
include "DB.php";
$nombre = $_POST['nombre'];
$id = (isset($_POST['id'])) ? $_POST['id'] : 0;

if($nombre != ""){
	$db = new DB("root","root","localhost","centrospokemon");
    $data = array();
    if($id == 0){
    	$data = array('nombre' => $nombre);
    }
    else {
   		$data = array('nombre' => $nombre, 'id' => $id);
  }
  }
  $db->save("regiones",$data);
header("Location:regiones.php");
?>
