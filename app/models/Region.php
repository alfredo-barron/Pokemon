<?php
class Region extends Elegant {

  public function centros_pokemon(){
    return $this->hasMany('Centro_Pokemon');
  }

}
