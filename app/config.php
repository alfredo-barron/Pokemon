<?php
include_once 'vars.inc.php';
include_once 'arrays.php';

$app = new \Slim\Slim();

$app->config(array(
  'debug' => true,
  'templates.path' => VIEWS_FOLDER,
  'view' => new \Slim\Views\Twig(),
  'mode'           => SLIM_MODE
));

$view = $app->view();
$app->view->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
    new Twig_Extension_Debug()
);
$app->view()->appendData(array(
  'title' => TITLE,
  'css'  => CSS_FOLDER,
  'js'   => JS_FOLDER,
  'img'  => IMG_FOLDER,
));

//$app->view()->appendData(array('navbar' => $navbar));

use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$capsule->addConnection(array(
  'driver'    => DB_DRIVER,
  'host'      => DB_HOST,
  'database'  => DB_DATABASE,
  'username'  => DB_USERNAME,
  'password'  => DB_PASSWORD,
  'prefix'    => DB_PREFIX,
  'charset'   => DB_CHARSET,
  'collation' => DB_COLLATION,
));
$capsule->bootEloquent();
$capsule->setAsGlobal();
$app->db = $capsule->connection();
?>
