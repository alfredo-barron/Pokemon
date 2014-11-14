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
    $centros = Centro_Pokemon::with('id_region')->get();
    echo $centros->toJson();
  }else{
    $status = Centro_Pokemon::with('id_region')->where('id',$id)->first();
    echo $status->toJson();
  }
});

$app->get('/catalogo_tipos(/:id)', function($id = null) use($app){
  if($id == null){
    $catalogo_tipos = Catalogo_Tipo::all();
    echo $catalogo_tipos->toJson();
  }else{
    $catalogo_tipo = Catalogo_Tipo::where('id',$id)->first();
    echo $catalogo_tipo->toJson();
  }
});

$app->get('/catalogo_habilidades(/:id)', function($id = null) use($app){
  if($id == null){
    $catalogo_habilidades = Catalogo_Habilidad::with('pokemon')->get();
    echo $catalogo_habilidades->toJson();
  }else{
    $catalogo_habilidad = Catalogo_Habilidad::where('id',$id)->first();
    echo $catalogo_habilidad->toJson();
  }
});

$app->get('/catalogo_estatus(/:id)', function($id = null) use($app){
  if($id == null){
    $catalogo_estatuses = Catalogo_Estatus::all();
    echo $catalogo_estatuses->toJson();
  }else{
    $catalogo_status = Catalogo_Estatus::where('id',$id)->first();
    echo $catalogo_status->toJson();
  }
});

$app->get('/catalogo_pokemon(/:id)', function($id = null) use($app){
  if($id == null){
    $catalogo_pokemons = Catalogo_Pokemon::with('region')->get();
    echo $catalogo_pokemons->toJson();
  }else{
    $catalogo_pokemon = Catalogo_Pokemon::with('region')->where('id',$id)->first();
    echo $catalogo_pokemon->toJson();
  }
});

$app->get('/habilidades(/:id)', function($id = null) use($app){
  if($id == null){
    $habilidades = Habilidad::with('id_habilidad','id_pokemon')->get();
    echo $habilidades->toJson();
  }else{
    $habilidad = Habilidad::where('id',$id)->first();
    echo $habilidad->toJson();
  }
});

$app->get('/tipos(/:id)', function($id = null) use($app){
  if($id == null){
    $tipos = Tipo::all();
    echo $tipos->toJson();
  }else{
    $tipo = Tipo::where('id',$id)->first();
    echo $tipo->toJson();
  }
});

$app->get('/evoluciones(/:id)', function($id = null) use($app){
  if($id == null){
    $evoluciones = Evolucion::all();
    echo $evoluciones->toJson();
  }else{
    $evolucion = Evolucion::where('id',$id)->first();
    echo $evolucion->toJson();
  }
});

$app->get('/entrenadores(/:id)', function($id = null) use($app){
  if($id == null){
    $entrenadores = Entrenador::with('lugar_nacimiento','localizacion_actual')->get();
    echo $entrenadores->toJson();
  }else{
    $entrenador = Entrenador::with('lugar_nacimiento','localizacion_actual')->where('id',$id)->first();
    echo $entrenador->toJson();
  }
});

$app->post('/entrenadores', function() use($app) {
  $post = (object) $app->request->post();
  $entrenador = new Entrenador();
  $entrenador->nombre = $post->nombre;
  $entrenador->apellidos = $post->apellidos;
  $entrenador->imagen = $post->imagen;
  $entrenador->usuario = $post->usuario;
  $entrenador->password = $post->password;
  $entrenador->fecha_nacimiento = $post->fecha_nacimiento;
  $entrenador->lugar_nacimiento = $post->lugar_nacimiento;
  $entrenador->sexo = $post->sexo;
  $entrenador->es_lider = $post->es_lider;
  $entrenador->localizacion_actual = $post->localizacion_actual;
  $entrenador->save();

  if (!$entrenador) {
    echo json_encode(array('estado' => false, 'mensaje' => 'Error al registro'));
  }
  else {
   echo json_encode(array('estado' => true, 'mensaje' => 'Registro realizado'));
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

$app->get('/pokebolas(/:id)', function($id = null) use($app){
  if($id == null){
    $pokebolas = Pokebola::all();
    echo $pokebolas->toJson();
  }else{
    $pokebola = Pokebola::where('id',$id)->first();
    echo $pokebola->toJson();
  }
});

$app->get('/regeneradores(/:id)', function($id = null) use($app){
  if($id == null){
    $regeneradores = Regenerador::with('id_centro_pokemon')->get();
    echo $regeneradores->toJson();
  }else{
    $regenerador = Regenerador::with('id_centro_pokemon')->where('id',$id)->first();
    echo $regenerador->toJson();
  }
});

$app->get('/registros(/:id)', function($id = null) use($app){
  if($id == null){
    $registro = Registro::all();
    echo $registro->toJson();
  }else{
    $registro = Registro::where('id',$id)->first();
    echo $registro->toJson();
  }
});

$app->get('/habitaciones(/:id)', function($id = null) use($app){
  if($id == null){
    $habitaciones = Habitacion::with('id_centro_pokemon')->get();
    echo $habitaciones->toJson();
  }else{
    $habitacion = Habitacion::with('id_centro_pokemon')->where('id',$id)->first();
    echo $habitacion->toJson();
  }
});

$app->get('/camas(/:id)', function($id = null) use($app){
  if($id == null){
    $camas = Cama::with('id_habitacion','id_entrenador')->get();
    echo $camas->toJson();
  }else{
    $cama = Cama::with('id_habitacion','id_entrenador')->where('id',$id)->first();
    echo $cama->toJson();
  }
});
