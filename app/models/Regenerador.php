<?php
class Regenerador extends Elegant {

  protected $table = 'regeneradores';

  public function id_centro_pokemon() {
    return $this->belongsTo('Centro_Pokemon','id_centro_pokemon');
  }

}
