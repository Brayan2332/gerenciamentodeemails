/**
 * Created by Brayan Bertan on 01/12/2017.
 */

$("#formulario").submit(function () {
    var sEmail	= $("#email").val();
    var emailFilter=/^.+@.+\..{2,}$/;
    var illegalChars= /[\(\)\<\>\,\;\:\\\/\"\[\]]/
    if(!(emailFilter.test(sEmail))||sEmail.match(illegalChars)){
        document.getElementById('testeEmail').textContent='email inválido';
        document.getElementById('testeEmail').style.color='red';
        return false;
    }else{
        document.getElementById('testeEmail').textContent='';
        return true;
    }
});
