/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
   $("#txtMen").cuentaCaracteres();
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

