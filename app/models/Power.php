<?php
class Ability extends Elegant {
  protected $table = 'powers';
  protected $rules = array(
  );
  public $timestamps = false;

   public function pokemons() {
    return $this->belongsToMany('Pokemon');
  }

}
