<?php
class Cama extends Elegant {

  protected $table = 'camas';

  public function id_habitacion() {
    return $this->belongsTo('Habitacion','id_habitacion');
  }

  public function id_entrenador() {
    return $this->belongsTo('Entrenador','id_entrenador');
  }

}
