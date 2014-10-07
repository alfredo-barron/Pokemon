<?php
include "DB.php";
$id = (isset($_POST['id'])) ? $_POST['id'] : 0;
$id_pokemon = $_POST['id_pokemon'];
$id_habilidad = $_POST['id_habilidad'];

if($id_pokemon != 0){
  $db = new DB("root","root","localhost","centrospokemon");
  $data = array();
  if($id == 0){
    $data = array('id_pokemon' => $id_pokemon,
    'id_habilidad' => $id_habilidad
    );
    } else {
   $data = array('id_pokemon' => $id_pokemon,
    'id_habilidad' => $id_habilidad,
    'id' => $id);
  }
  $db->save("habilidades",$data);
}
header("Location:catalogo_pokemon.php");
?>
