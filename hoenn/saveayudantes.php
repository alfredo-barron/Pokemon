<?php
include "DB.php";
$id = (isset($_POST['id'])) ? $_POST['id'] : 0;
$tipo = $_POST['tipo'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$fecha_graduacion = $_POST['fecha_graduacion'];
$id_enfermera = $_POST['id_enfermera'];
$id_centro_pokemon = $_POST['id_centro_pokemon'];

if($fecha_nacimiento != ""){
  $db = new DB("root","root","localhost","centrospokemon");
  $data = array();
  if($id == 0){
    $data = array('tipo' => $tipo,
    'fecha_nacimiento' => $fecha_nacimiento,
    'fecha_graduacion' => $fecha_graduacion,
    'id_enfermera' => $id_enfermera,
    'id_centro_pokemon' => $id_centro_pokemon
    );
     $db->save("ayudantes",$data);
    header("Location:ayudantes.php");
    } else {
    $data = array('tipo' => $tipo,
    'fecha_nacimiento' => $fecha_nacimiento,
    'fecha_graduacion' => $fecha_graduacion,
    'id_enfermera' => $id_enfermera,
    'id_centro_pokemon' => $id_centro_pokemon,
    'id' => $id);
    $db->save("ayudantes",$data);
    header("Location:updateayudantes.php");
  }
}
?>
