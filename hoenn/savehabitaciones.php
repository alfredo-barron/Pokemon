<?php  
include "DB.php";
$id = (isset($_POST['id'])) ? $_POST['id'] : 0;
$capacidad = $_POST['capacidad'];
$id_centro_pokemon = $_POST['id_centro_pokemon'];
 
if($capacidad != 0){
  $db = new DB("root","110992","localhost","centrospokemon");
  $data = array();
  if($id == 0){
    $data = array('capacidad' => $capacidad,
    'id_centro_pokemon' => $id_centro_pokemon
    );
     $db->save("habitaciones",$data);
    header("Location:habitaciones.php");
    } else {
   $data = array('capacidad' => $capacidad,
    'id_centro_pokemon' => $id_centro_pokemon,
    'id' => $id);
  }
  $db->save("habitaciones",$data);
  header("Location:updatehabitaciones.php");
}
?>