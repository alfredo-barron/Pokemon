<?php
include "DB.php";
$nombre = $_POST['nombre'];
$tiempo = $_POST['tiempo'];
$desaparece_a = $_POST['desaparece_a'];
$id = (isset($_POST['id'])) ? $_POST['id'] : 0;

if($nombre != ""){
	$db = new DB("root","root","localhost","centrospokemon");
    $data = array();
    if($id == 0){
    	$data = array('nombre' => $nombre,
                    'tiempo' => $tiempo,
                    'desaparece_a' => $desaparece_a);
    }
    else {
   		$data = array('nombre' => $nombre,
                    'tiempo' => $tiempo,
                    'desaparece_a' => $desaparece_a,
                    'id' => $id);
  }
  }
  $db->save("catalogo_estatus",$data);
header("Location:catalogo_estatus.php");
?>
