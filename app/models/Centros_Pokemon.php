<?php
class Centros_Pokemon extends Elegant {

  protected $table = 'centros_pokemon';

  public function region(){
    return $this->belongsTo('Regiones')->withTimestamps();
  }
}
