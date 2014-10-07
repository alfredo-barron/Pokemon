<?php
include "DB.php";
$id = (isset($_POST['id'])) ? $_POST['id'] : 0;
$id_entrenador = $_POST['id_entrenador'];
$id_pokemon = $_POST['id_pokemon'];
$archivada = $_POST['archivada'];

if($id_entrenador != 0){
  $db = new DB("root","root","localhost","centrospokemon");
  $data = array();
  if($id == 0){
    $data = array('id_entrenador' => $id_entrenador,
    'id_pokemon' => $id_pokemon,
    'archivada' => $archivada
    );

   $db->save("pokebolas",$data);
   header("Location:pokebolas.php");

   } else {

   $data = array('id_entrenador' => $id_entrenador,
    'id_pokemon' => $id_pokemon,
    'archivada' => $archivada,
    'id' => $id);

   $db->save("pokebolas",$data);
   header("Location:updatepokebolas.php");

  }

}
?>
