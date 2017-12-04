/**
 * Created by Brayan Bertan on 01/12/2017.
 */
$("#formulario").validate({
    rules : {
        nome:{
            required:true,
            minlength:3,
            maxlength:45
        },
        obs:{
            maxlength:122
        },
        email:{
            required:true,
            maxlength:45

        }
    },
    messages:{
        nome:{
            required:"Campo vazio!",
            minlength:"O nome deve ter no minimo 3 caracteres",
            maxlength:"O nome deve ter no máximo 45 caracteres"
        },
        obs:{
            maxlength:"A observaçãodeve ter no máximo 122 caracteres"

        },
        email:{
            required:"É necessário informar um email",
            maxlength:"O email deve ter no máximo 45 caracteres"
        }



    }
});