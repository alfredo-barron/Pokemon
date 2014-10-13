<?php
define('TITLE', 'Pokémon');
// Database servidor
define('DB_DRIVER', 'pgsql');//mysql,pgsql
define('DB_HOST', 'ec2-54-204-43-139.compute-1.amazonaws.com');
define('DB_PORT', '5432');
define('DB_DATABASE', 'd5pl13aajkhqi0');
define('DB_USERNAME', 'befgvmphhoesjl');
define('DB_PASSWORD', 'v9Ylwt1iN8ocZhshwh4_z1Z4Dy');
define('DB_PREFIX', '');
// Database local
define('DB_DRIVER_L', 'mysql');//mysql,pgsql
define('DB_HOST_L', 'localhost');
define('DB_DATABASE_L', 'centrospokemon');
define('DB_USERNAME_L', 'root');
define('DB_PASSWORD_L', 'root');
define('DB_PREFIX_L', '');
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
