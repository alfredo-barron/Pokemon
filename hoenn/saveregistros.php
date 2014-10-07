<?php
include "DB.php";
$enfermera_entrada = $_POST['enfermera_entrada'];
$fecha_entrada = $_POST['fecha_entrada'];
$id_regenerador = $_POST['id_regenerador'];
$hit_points = $_POST['hit_points'];
$estatus = $_POST['estatus'];
$id_pokebola = $_POST['id_pokebola'];
$suspendido = $_POST['suspendido'];
$id = (isset($_POST['id'])) ? $_POST['id'] : 0;

if($enfermera_entrada != 0){
	$db = new DB("root","root","localhost","centrospokemon");
    $data = array();
    if($id == 0){
    	$data = array('enfermera_entrada' => $enfermera_entrada,
                    'fecha_entrada' => $fecha_entrada,
                    'id_regenerador' => $id_regenerador,
                    'hit_points' => $hit_points,
                    'estatus' => $estatus,
                    'id_pokebola' => $id_pokebola,
                    'suspendido' => $suspendido
                    );
      $db->save("registros",$data);
     header("Location:registros.php");
    }
    else {
   		$data = array('enfermera_entrada' => $enfermera_entrada,
                    'fecha_entrada' => $fecha_entrada,
                    'id_regenerador' => $id_regenerador,
                    'hit_points' => $hit_points,
                    'estatus' => $estatus,
                    'id_pokebola' => $id_pokebola,
                    'enfermera_salida' => $enfermera_salida,
                    'fecha_estimada' => $fecha_estimada,
                    'fecha_salida' => $fecha_salida,
                    'suspendido' => $suspendido,
                    'id' => $id);
        $db->save("registros",$data);
header("Location:registrosfinal.php");
  }
  }

?>
