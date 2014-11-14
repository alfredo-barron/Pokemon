<?php
class Catalogo_Pokemon extends Elegant {

  protected $table = 'catalogo_pokemon';

  public function region() {
    return $this->belongsTo('Region','region');
  }

}
