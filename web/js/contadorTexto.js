/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
   $("textarea").cuentaCaracteres();
})

jQuery.fn.cuentaCaracteres= function(){
    txt=$(this);
    var contador =$('<div>Nº Caracteres: '+ txt.attr("value").length+'</div>');
    txt.after(contador);
    txt.keyup(function(){

    contador.text('Nº Caracteres: '+txt.attr("value").length);

        });
        return this;

}

