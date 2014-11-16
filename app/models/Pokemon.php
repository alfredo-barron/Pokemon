<?php
class Pokemon extends Elegant {

  protected $rules = array(
  );

  public function evolutions(){
    return $this->hasOne('Evolution');
  }

  public function region_id() {
    return $this->belongsTo('Region','region_id');
  }

}
