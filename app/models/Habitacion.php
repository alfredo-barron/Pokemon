<?php
class Habitacion extends Elegant {

  protected $table = 'habitaciones';

  public function id_centro_pokemon() {
    return $this->belongsTo('Centro_Pokemon','id_centro_pokemon');
  }

}
