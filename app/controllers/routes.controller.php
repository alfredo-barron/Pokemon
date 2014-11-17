<?php

$app->get('/regiones(/:id)', function($id = null) use($app){
  if($id == null){
    $regiones = Region::all();
    echo $regiones->toJson();
  }else{
    $region = Region::where('id',$id)->first();
    echo $region->toJson();
  }
});

$app->get('/centros(/:id)', function($id = null) use($app){
  if($id == null){
    $centros = Center::with('region_id')->get();
    echo $centros->toJson();
  }else{
    $centro = Center::with('region_id')->where('id',$id)->first();
    echo $centro->toJson();
  }
});

$app->get('/region(/:id)/centros', function($id = null) use($app){
  $centro = Region::with('centers')->where('id',$id)->first();
  echo $centro->toJson();
});

$app->get('/tipos(/:id)', function($id = null) use($app){
  if($id == null){
    $tipos = Type::all();
    echo $tipos->toJson();
  }else{
    $tipo = Type::where('id',$id)->first();
    echo $tipo->toJson();
  }
});

$app->get('/habilidades(/:id)', function($id = null) use($app){
  if($id == null){
    $habilidades = Ability::all();
    echo $habilidades->toJson();
  }else{
    $habilidad = Ability::where('id',$id)->first();
    echo $habilidad->toJson();
  }
});

$app->get('/status(/:id)', function($id = null) use($app){
  if($id == null){
    $statuses = Status::all();
    echo $statuses->toJson();
  }else{
    $status = Status::where('id',$id)->first();
    echo $status->toJson();
  }
});

$app->get('/pokemon(/:id)', function($id = null) use($app){
  if($id == null){
    $pokemon = Pokemon::all();
    echo $pokemon->toJson();
  }else{
    $pokemon = Pokemon::where('id',$id)->first();
    echo $pokemon->toJson();
  }
});

$app->get('/evoluciones(/:id)', function($id = null) use($app){
  if($id == null){
    $pokemons = Evolution::with('pokemon_id','pokemon_id_e')->get();
    echo $pokemons->toJson();
  }else{
    $pokemon = Evolution::with('pokemon_id','pokemon_id_e')->where('id',$id)->first();
    echo $pokemon->toJson();
  }
});

$app->get('/entrenadores(/:id)', function($id = null) use($app){
  if($id == null){
    $entrenadores = Trainer::with('region_id','region_id_actual')->get();
    echo $entrenadores->toJson();
  }else{
    $entrenador = Trainer::with('region_id','region_id_actual')->where('id',$id)->first();
    echo $entrenador->toJson();
  }
});

$app->post('/entrenadores', function() use($app) {
  $post = (object) $app->request->post();
  $trainer = new Trainer();
  $trainer->name = $post->name;
  $trainer->last_name = $post->last_name;
  $trainer->image = $post->image;
  $trainer->username = $post->username;
  $trainer->password = $post->password;
  $trainer->birthday = $post->birthday;
  $trainer->region_id = $post->region_id;
  $trainer->gender = $post->gender;
  $trainer->leader = $post->leader;
  $trainer->region_id_actual = $post->region_id_actual;
  if($trainer->save()) {
    $response['status'] = '1';
  } else {
    $response['status'] = '0';
  }

  echo json_encode($response);
});


$app->get('/pokebolas(/:id)', function($id = null) use($app){
  if($id == null){
    $pokebolas = Pokeball::all();
    echo $pokebolas->toJson();
  }else{
    $pokebola = Pokeball::where('id',$id)->first();
    echo $pokebola->toJson();
  }
});

$app->get('/regeneradores(/:id)', function($id = null) use($app){
  if($id == null){
    $regeneradores = Regenerator::with('center_id')->get();
    echo $regeneradores->toJson();
  }else{
    $regenerador = Regenerator::with('center_id')->where('id',$id)->first();
    echo $regenerador->toJson();
  }
});

$app->get('/habitaciones(/:id)', function($id = null) use($app){
  if($id == null){
    $habitaciones = Room::with('center_id')->get();
    echo $habitaciones->toJson();
  }else{
    $habitacion = Room::with('center_id')->where('id',$id)->first();
    echo $habitacion->toJson();
  }
});
