<?php
include "DB.php";
$id = (isset($_POST['id'])) ? $_POST['id'] : 0;
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$fecha_graduacion = $_POST['fecha_graduacion'];
$cedula = $_POST['cedula'];
$id_centro_pokemon = $_POST['id_centro_pokemon'];

if($nombre != ""){
  $db = new DB("root","root","localhost","centrospokemon");
  $data = array();
  if($id == 0){
    $data = array('nombre' => $nombre,
    'apellidos' => $apellidos,
    'fecha_nacimiento' => $fecha_nacimiento,
    'fecha_graduacion' => $fecha_graduacion,
    'cedula' => $cedula,
    'id_centro_pokemon' => $id_centro_pokemon
    );
    $db->save("enfermeras",$data);
    header("Location:enfermeras.php");
    } else {
    $data = array('nombre' => $nombre,
    'apellidos' => $apellidos,
    'fecha_nacimiento' => $fecha_nacimiento,
    'fecha_graduacion' => $fecha_graduacion,
    'cedula' => $cedula,
    'id_centro_pokemon' => $id_centro_pokemon,
    'id' => $id);
    $db->save("enfermeras",$data);
    header("Location:updateenfermeras.php");
  }
}

?>
