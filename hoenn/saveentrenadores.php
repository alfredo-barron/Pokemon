<?php
include "DB.php";
$id = (isset($_POST['id'])) ? $_POST['id'] : 0;
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$alias = $_POST['alias'];
$password = $_POST['password'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$lugar_nacimiento = $_POST['lugar_nacimiento'];
$sexo = $_POST['sexo'];
$es_lider = $_POST['es_lider'];
$localizacion_actual = $_POST['localizacion_actual'];

if($nombre != ""){
  $db = new DB("root","root","localhost","centrospokemon");
  $data = array();
  if($id == 0){
$data = array('nombre' => $nombre,
    'apellidos' => $apellidos,
    'alias' => $alias,
    'password' => $password,
    'fecha_nacimiento' => $fecha_nacimiento,
    'lugar_nacimiento' => $lugar_nacimiento,
    'sexo' => $sexo,
    'es_lider' => $es_lider,
    'localizacion_actual' => $localizacion_actual
    );
    $db->save("entrenadores",$data);
    header("Location:entrenadores.php");
    } else {
    $data = array('nombre' => $nombre,
    'apellidos' => $apellidos,
    'alias' => $alias,
    'password' => $password,
    'fecha_nacimiento' => $fecha_nacimiento,
    'lugar_nacimiento' => $lugar_nacimiento,
    'sexo' => $sexo,
    'es_lider' => $es_lider,
    'localizacion_actual' => $localizacion_actual,
    'id' => $id);
    $db->save("entrenadores",$data);
    header("Location:updateentrenadores.php");
  }
}
?>
