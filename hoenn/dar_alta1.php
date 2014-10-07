<?php
include "DB.php";
$suspendido = $_GET['suspendido'];
$id = (isset($_GET['id'])) ? $_GET['id'] : 0;

if($suspendido != ""){
	$db = new DB("root","root","localhost","centrospokemon");
    $data = array();
    if($id != 0){
      $data = array('suspendido' => $suspendido, 'id' => $id);
    }
  }
  $db->save("ayudantes",$data);
header("Location:consultaayudante.php");
?>
