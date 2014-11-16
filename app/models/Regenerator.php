<?php
class Regenerator extends Elegant {
  protected $rules = array(
  );
  //Se une con centro pokemon
  public function center_id() {
    return $this->belongsTo('Center','center_id');
  }

}
