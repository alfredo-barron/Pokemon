<?php
include "DB.php";
$archivada = $_POST['archivada'];
$id = (isset($_POST['id'])) ? $_POST['id'] : 0;

if($suspendido != ""){
	$db = new DB("root","root","localhost","centrospokemon");
    $data = array();
    if($id != 0){
      $data = array('archivada' => $archivada, 'id' => $id);
    }
  }
  $db->save("pokebolas",$data);
header("Location:updatepokebolas.php");
?>
