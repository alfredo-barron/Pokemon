<?php
class Catalogo_Tipo extends Elegant {

  protected $table = 'catalogo_tipos';

  protected $rules = array(
  );

  public function tipos(){
        return $this->hasManyThrough('Catalogo_Tipo', 'Catologo_Pokemon');
    }


}
