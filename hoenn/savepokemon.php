<?php 
include "DB.php";
$id = (isset($_POST['id'])) ? $_POST['id'] : 0;
$especie = $_POST['especie'];
$alias = $_POST['alias'];
$sexo = $_POST['sexo'];
$nivel = $_POST['nivel'];
$es_intercambiable = $_POST['es_intercambiable'];
$hit_points = $_POST['hit_points'];
$ataque = $_POST['ataque'];
$defensa = $_POST['defensa'];
$velocidad = $_POST['velocidad'];
$evasion = $_POST['evasion'];
$prezision = $_POST['prezision']; 
$estatus = $_POST['estatus'];
        

if($especie != 0){
  $db = new DB("root","110992","localhost","centrospokemon");
  $data = array();
  if($id == 0){
    $data = array('especie' => $especie,
    'alias' => $alias,
    'sexo' => $sexo,
    'nivel' => $nivel,
    'es_intercambiable' => $es_intercambiable,
    'hit_points' => $hit_points,
    'ataque' => $ataque,
    'defensa' => $defensa,
    'velocidad' => $velocidad,
    'evasion' => $evasion,
    'prezision' => $prezision,
    'estatus' => $estatus
    );
    $db->save("pokemon",$data);
    header("Location:pokemon.php");
    } else {
    $data = array('especie' => $especie,
    'alias' => $alias,
    'sexo' => $sexo,
    'nivel' => $nivel,
    'es_intercambiable' => $es_intercambiable,
    'hit_points' => $hit_points,
    'ataque' => $ataque,
    'defensa' => $defensa,
    'velocidad' => $velocidad,
    'evasion' => $evasion,
    'prezision' => $prezision,
    'estatus' => $estatus,
    'id' => $id);
    $db->save("pokemon",$data);
    header("Location:updatepokemon.php");
  }  
}

?>