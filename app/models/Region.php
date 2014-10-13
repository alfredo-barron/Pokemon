<?php
class Region extends Elegant {

  protected $table = 'regiones';

  public function centros_pokemon(){
    return $this->hasMany('Centro_Pokemon');
  }

}
