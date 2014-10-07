<?php
include "DB.php";
$id = (isset($_POST['id'])) ? $_POST['id'] : 0;
$id_pokemon = $_POST['id_pokemon'];
$id_tipo = $_POST['id_tipo'];

if($id_pokemon != 0){
  $db = new DB("root","root","localhost","centrospokemon");
  $data = array();
  if($id == 0){
    $data = array('id_pokemon' => $id_pokemon,
    'id_tipo' => $id_tipo
    );
    } else {
   $data = array('id_pokemon' => $id_pokemon,
    'id_tipo' => $id_tipo,
    'id' => $id);
  }
  $db->save("tipos",$data);
}
header("Location:catalogo_pokemon.php");
?>
