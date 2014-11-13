<?php
define('TITLE', 'Pokémon');

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

// Slim Vars
define('COOKIE_PREFIX','pkmn');//Only lowercase letters[a-z], numbers[0-9] and _
define('COOKIES_ENABLED', true);//If you need to store more than 4 kb set to false
define('COOKIE_SECRET', 'pkmnsecret');//Change for a different secret
define('COOKIE_DURATION', '15 minutes');//Default value, change as needed

define('SLIM_MODE','development');//development,production

// ATTENTION! Do not change, unless you know what you are doing.
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
?>
