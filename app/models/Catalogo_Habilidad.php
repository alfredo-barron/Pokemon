<?php
class Catalogo_Habilidad extends Elegant {

  protected $table = 'catalogo_habilidades';

  public function habilidad(){
    return $this->hasMany('Habilidad');
  }

  /*public function pokemon(){
    return $this->belongsToMany('Catalogo_Pokemon', 'Habilidad' ,'id_habilidad', 'id_pokemon');
  } */

}
