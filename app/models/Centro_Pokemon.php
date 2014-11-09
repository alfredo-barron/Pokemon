<?php
class Centro_Pokemon extends Elegant {

  protected $table = 'centros_pokemon';

  public function region(){
    return $this->belongsTo('Region');
  }

}
