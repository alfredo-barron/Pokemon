<?php
@session_start();
date_default_timezone_set('America/Mexico_City');

if(getenv('DATABASE_URL') != false){
  $dbopts = parse_url(getenv('DATABASE_URL'));
  $path = ltrim($dbopts['path'],'/');
  $host = $dbopts['host'];
  $port = $dbopts['port'];
  $user = $dbopts['user'];
  $pass = $dbopts['pass'];
  define('DB_DRIVER', 'pgsql');//mysql,pgsql
  define('DB_HOST', $host);
  define('DB_PORT', $port);
  define('DB_DATABASE', $path);
  define('DB_USERNAME', $user);
  define('DB_PASSWORD', $pass);
  define('DB_PREFIX', '');
} else {
  define('DB_DRIVER', 'pgsql');//mysql,pgsql
  define('DB_HOST', '127.0.0.1');
  define('DB_PORT', '5432');
  define('DB_DATABASE', 'centrospokemon');
  define('DB_USERNAME', 'postgres');
  define('DB_PASSWORD', '');
  define('DB_PREFIX', '');
}

define('ROOT', basename(dirname(__DIR__)).'/');
define('APP_FOLDER', 'app/');
define('PUBLIC_FOLDER', 'public/');
define('CSS_FOLDER', PUBLIC_FOLDER.'css/');
define('JS_FOLDER', PUBLIC_FOLDER.'js/');
define('IMG_FOLDER', PUBLIC_FOLDER.'img/');
define('MODELS_FOLDER', APP_FOLDER.'models/');
define('VIEWS_FOLDER', APP_FOLDER.'views/');
define('CONTROLLERS_FOLDER', APP_FOLDER.'controllers/');
define('LANGS_FOLDER',APP_FOLDER.'lang/');
define('COOKIE_NAME', COOKIE_PREFIX);
define('DB_COLLATION', 'utf8_general_ci');
define('DB_CHARSET', 'utf8');

require 'vendor/autoload.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->config(array(
 'debug' => 'true',
 'templates.path' => "app/views",
 'view' => new \Slim\Views\Twig()
  ));

$view = $app->view();
$app->view->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
    new Twig_Extension_Debug()
);

//include_once 'app/vars.inc.php';
//include_once APP_FOLDER.'config.php';

//Load all the models
include_once MODELS_FOLDER."Elegant.php";
foreach(glob(MODELS_FOLDER.'*.php') as $model) {
  if($model != "Elegant.php")
    include_once $model;
}

$app->contentType('text/html; charset=utf-8');

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

$app->get('/', function() use($app){
  //$app->render('index.twig');
 echo "<h1>Pokémon Api</h1>";
})->name('root');

$app->get('/login/:username/:password', function($username,$password) use($app){

  $trainer = Trainer::where('username','=',$username)->where('password','=',$password)->first();

  if(!is_null($trainer)){
      echo $trainer->toJson();
  } else {
     $trainer['id'] = "0";
     echo json_encode($trainer);
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
