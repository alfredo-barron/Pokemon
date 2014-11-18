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
 echo "<h1>Pokémon Api</h1>";
})->name('root');

$app->get('/login/:username/:password', function($username,$password) use($app){

  $trainer = Trainer::where('username','=',$username)->first();

  if(!is_null($trainer)){
    if($trainer->password == $password){
      echo $trainer->toJson();
    } else {
      echo json_encode(array('estado' => false, 'mensaje' => 'Contraseña incorrecta'));
    }
  } else {
    echo json_encode(array('estado' => false, 'mensaje' => 'Usuario incorrecto'));
  }

});

$app->get('/logout', function() use($app){
  unset($_SESSION['user']);
  $app->view()->setData('user', null);
})->name('logout');

//Load all the controllers
foreach(glob(CONTROLLERS_FOLDER.'*.php') as $router) {
  include_once $router;
}

$app->run();
?>
