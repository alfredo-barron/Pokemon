<?php
class Room extends Elegant {
  protected $table = 'rooms';
  protected $rules = array(
  );
  //Se une con los centros pokemon
  public function center_id() {
    return $this->belongsTo('Center','center_id');
  }

}
