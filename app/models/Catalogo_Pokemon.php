<?php
class Catalogo_Pokemon extends Elegant {

  protected $table = 'catalogo_pokemon';

  public function region() {
    return $this->belongsTo('Region','region');
  }

  public function habilidad(){
    return $this->hasMany('Habilidad');
  }
  /*
   public function habilidad(){
    return $this->belongsToMany('Catalogo_Habilidad', 'Habilidad', 'id_pokemon', 'id_habilidad');
  }*/

}
