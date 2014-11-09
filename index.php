<?php
session_cache_limiter(false);
@session_start();
date_default_timezone_set('America/Mexico_City');

require 'vendor/autoload.php';
include_once 'app/vars.inc.php';
include_once APP_FOLDER.'config.php';

//Load all the models
include_once MODELS_FOLDER."Elegant.php";
foreach(glob(MODELS_FOLDER.'*.php') as $model) {
  if($model != "Elegant.php")
    include_once $model;
}

$auth = function ($app) {
  return function () use ($app) {
    if (!isset($_SESSION['user'])) {
      //$_SESSION['redirectTo'] = $app->request()->getPathInfo()
      $app->redirect($app->urlFor('root'));
    }
  };
};

$app->contentType('text/html; charset=utf-8');

$app->hook('slim.before.dispatch', function() use ($app) {
  $user = null;
  if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
  }
  $app->view()->appendData(array('user' => $user));
});

$app->get('/', function() use($app){
  //$app->render('index.twig');
  echo "<a href=\"/regiones\">GET (/regiones)</a><br>";
  echo "<a href=\"/centros\">GET (/centros)</a><br>";
  echo "<a href=\"/catalogo_tipos\">GET (/catalogo_tipos)</a><br>";
  echo "<a href=\"/catalogo_habilidades\">GET (/catalogo_habilidades)</a><br>";
  echo "<a href=\"/catalogo_estatus\">GET (/catalogo_estatus)</a><br>";
  echo "<a href=\"/catalogo_pokemon\">GET (/catalogo_pokemon)</a><br>";
  echo "<a href=\"/habilidades\">GET (/habilidades)</a><br>";
  echo "<a href=\"/tipos\">GET (/tipos)</a><br>";
  echo "<a href=\"/evoluciones\">GET (/evoluciones)</a><br>";
  echo "<a href=\"/entrenadores\">GET (/entrenadores)</a><br>";
  echo "<a href=\"/pokemon\">GET (/pokemon)</a><br>";
  echo "<a href=\"/pokebolas\">GET (/pokebolas)</a><br>";
  echo "<a href=\"/regeneradores\">GET (/regeneradores)</a><br>";
  echo "<a href=\"/registro\">GET (/registro)</a><br>";
  echo "<a href=\"/habitaciones\">GET (/habitaciones)</a><br>";
  echo "<a href=\"/camas\">GET (/camas)</a><br>";
})->name('root');

$app->post('/login', function() use($app){
  $post = (object) $app->request()->post();
  $usuario = (isset($post->usuario)) ? $post->usuario : '';
  $password = (isset($post->password)) ? $post->password : '';

  $entrenador = Entrenador::where('usuario','=',$usuario)->first();

  if(!is_null($entrenador)){
    if($entrenador->password == $password){
      echo json_encode(array('estado' => true, 'mensaje' => 'Sesión Iniciada'));
      $_SESSION['user'] = $entrenador;
    } else {
      echo json_encode(array('estado' => false, 'mensaje' => 'Contraseña Incorrecta'));
    }
  } else {
    echo json_encode(array('estado' => false, 'mensaje' => 'Usuario Incorrecto'));
  }

});

$app->get('/logout', function() use($app){
  unset($_SESSION['user']);
  $app->view()->setData('user', null);
  $app->redirect($app->urlFor('root'));
})->name('logout');

//Load all the controllers
foreach(glob(CONTROLLERS_FOLDER.'*.php') as $router) {
  include_once $router;
}

$app->run();
?>
