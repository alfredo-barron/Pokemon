<?php
class Centro_Pokemon extends Elegant {

  protected $table = 'centros_pokemon';

  public function id_region() {
    return $this->belongsTo('Region','id_region');
  }

  public function regenerador(){
    return $this->hasMany('Regenerador');
  }

  public function habitacion(){
    return $this->hasMany('Habitacion');
  }

}
