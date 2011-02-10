<?php

  function obtenerMensajesNuevos($idmensaje){
    
    $tabmensaje = 'mensaje';
    $idmensaje++;
    include('bbdd/bd.php');
    $obj = new bd;
    $sms = $obj->select($tabmensaje, $idmensaje);
    
    if (isset($sms)) {
      for ($i = $idmensaje; $i < count($sms) ; $i++) {
         $mensajes[] = $obj->select($tabmensaje, $i);
      }
      return json_encode($mensajes);
    }
    else{
      return json_encode(array(FALSE));
    }
   
  }
    
?>