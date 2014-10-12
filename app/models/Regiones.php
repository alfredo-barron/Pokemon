<?php
class Regiones extends Elegant {

  public function centros_pokemon(){
    return $this->hasMany('Centros_Pokemon');
  }

}
