/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    $(".txtMen").cuentaCaracteres();
    $("#botonTxt").click(enviarMensaje);
})

jQuery.fn.cuentaCaracteres= function(){
    txt=$(this);
    var contador =$('.contador');
    txt.keyup(function(){

        contador.text(': '+txt.attr("value").length+' :');

    });
    return this;

}
function enviarMensaje(){
    
    var texto=$(".txtMen").attr("value");

    $(".txtMen").val("");
    $('.contador').text(': 0 :')
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
    $(".txtMen").addClass("txtMenCargando");    
    
}
function llegadaDatos (datos){
    //var mens=jQuery.parseJSON(datos);
    
    alert("Llegaron los datos..."+datos.mensaje);
    var avatar=$('<div class="ptuits"><img class="avatar" label="ptuit" src="/web/imagen/ptuit.png"></img></div>');
    avatar.appendTo($('#caja_men'));
    var nuevoMens=$('<span class="avatarTxt"><em style="color:blue;">'+datos.usuario+' :</em> '+datos.mensaje+'</span></div>');
    nuevoMens.appendTo($(avatar));
    
}
function problemasEnvio(objeto, quepaso, otroobj){
    alert("Hubo un fallo en el envio AJAX... Pasó lo siguiente: "+quepaso);

}
function completado(exito){
    $(".txtMen").removeClass("txtMenCargando");   
    
    if(exito=="success"){
        alert("Y con éxito");
    }

}