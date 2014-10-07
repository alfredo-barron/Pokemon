<?php
# consume.php
include 'DB.php';
$db = new DB("root","110992","localhost","todo");
$url = 'http://127.0.0.1/TecValles/Todo/json.php';
$url .= (isset($_GET['id'])) ? '?id='.$_GET['id'] : "";
$db->pretty($db->toArray($db->getJson($url)));
?>
