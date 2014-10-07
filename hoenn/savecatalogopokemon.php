<?php
include "DB.php";
$id = (isset($_POST['id'])) ? $_POST['id'] : 0;
$especie = $_POST['especie'];
$region = $_POST['region'];
$hit_points = $_POST['hit_points'];
$ataque = $_POST['ataque'];
$defensa = $_POST['defensa'];
$velocidad = $_POST['velocidad'];
$evasion = $_POST['evasion'];
$prezision = $_POST['prezision'];
$evol_trans = $_POST['evol_trans'];

if($especie != ""){
  $db = new DB("root","root","localhost","centrospokemon");
  $data = array();
  if($id == 0){
    $data = array('especie' => $especie,
    'region' => $region,
    'hit_points' => $hit_points,
    'ataque' => $ataque,
    'defensa' => $defensa,
    'velocidad' => $velocidad,
    'evasion' => $evasion,
    'prezision' => $prezision,
    'evol_trans' => $evol_trans
    );
    } else {
    $data = array('especie' => $especie,
    'region' => $region,
    'hit_points' => $hit_points,
    'ataque' => $ataque,
    'defensa' => $defensa,
    'velocidad' => $velocidad,
    'evasion' => $evasion,
    'prezision' => $prezision,
    'evol_trans' => $evol_trans,
    'id' => $id);
  }
  $db->save("catalogo_pokemon",$data);
}
header("Location:catalogo_pokemon.php");
?>
