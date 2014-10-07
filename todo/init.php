<?php
include "DB.php";

$db = new DB("root","110992","localhost","centrospokemon");
$db->create('regiones',[
  'id' => 'INT PRIMARY KEY AUTO_INCREMENT',
  'nombre' => 'TEXT NOT NULL'
  ]);
?>
