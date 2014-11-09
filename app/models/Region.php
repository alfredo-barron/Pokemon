<?php
class Region extends Elegant {

  protected $table = 'regiones';

  public function centros_pokemon(){
    return $this->hasOne('Centro_Pokemon');
  }

}
