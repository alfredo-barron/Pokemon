<?php

$app->group('/inicio', $auth($app), function() use($app){

  $app->get('', function() use($app){
    $data = array();
    $app->render('home.twig', $data);
  })->name('home');

//Modulo de regiones
  $app->group('/regiones', function() use($app){

    $app->get('/regiones.json(/:id)', function($id = null) use($app){
      if($id == null){
        $regiones = Regiones::all();
        echo $regiones->toJson();
      }else {
        $regiones = Regiones::where('id',$id)->first();
        echo $regiones->toJson();
      }
    });

  });

//Modulo de enfermeras
  $app->group('/enfermeras', function() use($app){

    $app->get('/enfermeras.json(/:id)', function($id = null) use($app){
      if ($id == null) {
        $enfermeras = Enfermeras::all();
        echo $enfermeras->toJson();
      }else {
        $enfermeras = Enfermeras::where('id',$id)->first();
        echo $enfermeras->toJson();
      }
    })->name('enfermeras');

  });

//Modulo de entrenadores
  $app->group('/entrenadores', function() use($app){

    $app->get('/entrenadores.json(/:id)', function($id = null) use($app){
      if ($id == null) {
        $entrenadores = Entrenadores::all();
        echo $entrenadores->toJson();
      }else {
        $entrenadores = Entrenadores::where('id',$id)->first();
        echo $entrenadores->toJson();
      }
    })->name('entrenadores');

  });

});
