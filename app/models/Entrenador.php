<?php
class Entrenador extends Elegant {

  protected $table = 'entrenadores';

  public function lugar_nacimiento() {
    return $this->belongsTo('Region','lugar_nacimiento');
  }

  public function localizacion_actual() {
    return $this->belongsTo('Region','localizacion_actual');
  }

  public function cama(){
    return $this->hasOne('Cama');
  }

}
