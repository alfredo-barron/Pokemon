<?php
include "DB.php";
$id = (isset($_POST['id'])) ? $_POST['id'] : 0;
$id_prevolucion = $_POST['id_prevolucion'];
$id_evolucion = $_POST['id_evolucion'];

if($id_prevolucion != 0){
  $db = new DB("root","root","localhost","centrospokemon");
  $data = array();
  if($id == 0){
    $data = array('id_prevolucion' => $id_prevolucion,
    'id_evolucion' => $id_evolucion
    );
    } else {
   $data = array('id_prevolucion' => $id_prevolucion,
    'id_evolucion' => $id_evolucion,
    'id' => $id);
  }
  $db->save("evoluciones",$data);
}
header("Location:catalogo_pokemon.php");
?>
