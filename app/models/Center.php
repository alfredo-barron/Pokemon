<?php
class Center extends Elegant {
  protected $rules = array(
  );
  //Muchos regeneradores en un centro pokemon
  public function regenerators(){
    return $this->hasMany('Regenerator');
  }
  //Muchos cuartos en un centro pokemon
  public function rooms(){
    return $this->hasMany('Room');
  }
  //Se une con region
  public function region_id() {
    return $this->belongsTo('Region','region_id');
  }

}
