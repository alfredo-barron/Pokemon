<?php
include "DB.php";
$id = (isset($_POST['id'])) ? $_POST['id'] : 0;
$slots = $_POST['slots'];
$slots_funcionales = $_POST['slots_funcionales'];
$esta_mantenimiento = $_POST['esta_mantenimiento'];
$id_centro_pokemon = $_POST['id_centro_pokemon'];

if($slots_funcionales != ""){
  $db = new DB("root","root","localhost","centrospokemon");
  $data = array();
  if($id == 0){
    $data = array('slots' => $slots,
    'slots_funcionales' => $slots_funcionales,
    'esta_mantenimiento' => $esta_mantenimiento,
    'id_centro_pokemon' => $id_centro_pokemon
    );
     $db->save("regeneradores",$data);
  header("Location:regeneradores.php");
    } else {
   $data = array('slots' => $slots,
    'slots_funcionales' => $slots_funcionales,
    'esta_mantenimiento' => $esta_mantenimiento,
    'id_centro_pokemon' => $id_centro_pokemon,
    'id' => $id);
  }
  $db->save("regeneradores",$data);
  header("Location:updateregeneradores.php");
}

?>
