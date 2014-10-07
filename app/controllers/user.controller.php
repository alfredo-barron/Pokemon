<?php

$app->get('/home', $auth($app), function() use($app){
   $app->render('home.twig');
})->name('home');

 ?>
