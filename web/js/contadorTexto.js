/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    $("#txtMen").cuentaCaracteres();
    $("#botonTxt").click(enviarMensaje);
})

jQuery.fn.cuentaCaracteres= function(){
    txt=$(this);
    var contador =$('<div style="float: left;">: '+ txt.attr("value").length+' :</div>');
    txt.after(contador);
    txt.keyup(function(){

        contador.text(': '+txt.attr("value").length+' :');

    });
    return this;

}
function enviarMensaje(){
    
    var texto=$("#txtMen").attr("value");
    $.ajax({
        url:"/php/iniciar.php",
        async: true,
        type: "POST",
        dataType: "json",
        contentType: "application/x-www-form-urlencoded",
        data:"controlador=mensaje&accion=crearMensaje&txtMen="+texto,
        beforeSend: inicioEnvio,
        success:llegadaDatos,
        complete: completado,
        timeout: 4000,
        error: problemasEnvio

    });
    

    return false;
}
function inicioEnvio (datos){
    $("#txtMen").addClass('#txtMenCargando');
    
    alert("Iniciando el Envio...."+texto);
    
}
function llegadaDatos (datos){
    alert("Llegaron los datos..."+datos);
    
}
function problemasEnvio(objeto, quepaso, otroobj){
    alert("Hubo un fallo en el envio AJAX... Pasó lo siguiente: "+quepaso);

}
function completado(){
    
    alert("Me acabo de completar")
            if(exito=="success"){
                alert("Y con éxito");
            }

}