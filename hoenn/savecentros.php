<?php
include "DB.php";
$id = (isset($_POST['id'])) ? $_POST['id'] : 0;
$nombre = $_POST['nombre'];
$id_region = $_POST['id_region'];
$password = $_POST['password'];

if($slots_funcionales != ""){
  $db = new DB("root","root","localhost","centrospokemon");
  $data = array();
  if($id == 0){
    $data = array('nombre' => $nombre,
    'id_region' => $id_region,
    'password' => $password
    );
    } else {
   $data = array('nombre' => $nombre,
    'id_region' => $id_region,
    'password' => $password,
    'id' => $id);
  }
  $db->save("centros_pokemon",$data);
}
header("Location:centrospokemon.php");
?>
