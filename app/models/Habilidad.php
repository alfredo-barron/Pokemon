<?php
class Habilidad extends Elegant {

  protected $table = 'habilidades';

  public function id_habilidad() {
    return $this->belongsTo('Catalogo_Habilidad','id_habilidad');
  }

  public function id_pokemon() {
    return $this->belongsTo('Catalogo_Pokemon','id_pokemon');
  }

}
