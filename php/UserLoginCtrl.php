<?php
/** Esta clase nos da la función getUserPage() para devolver la página de usuario que se debe cargar de acuerdo al nombre de usuario*/
/*
    Author: JoseManuelDominguez
    Date: 09.02.2011           
*/  
class UserLoginCtrl {
/**
  *@class UserLoginCtrl*/

  protected $direccion;

  function __construct($nick) {
    $this->direccion = 'user'.$nick.'.php';
    
  }
  public function getUserPage()
  {
    return $this->direccion;
  }
  
}

?>