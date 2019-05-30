$(document).ready(function(){
    $("#formulario").validetta({
        bubblePosition: "bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        validators: {
            regExp: {
                nickExp : {
                    pattern : /(([A-Z]|[a-z]|[0-9]|_|\.)+)$/,
                    errorMessage : 'Debe contener sólo letras, números, punto o guión bajo.'
                }
            }
        },
        onError:function(e){
            e.preventDefault();
        },
        onValid:function(e){
            e.preventDefault();
            $("#btn").attr("disabled", true);
            $.ajax({
                method:"post",
                url:"registroBE.php",
                data:$("#formulario").serialize(),
                success:function(resp){                                    	                	                                                   
                    if(resp == 1){
                        $.alert({     
                            title: "OK",
                            content:"Registro completo",
                            type:"green",
                            onDestroy: function(){
                                $(location).attr("href", "./")
                            }                            
                        });
                    }else{
                        $.alert({
                            title:"Error",
                            content: "Ese usuario ya ha sido tomado o ese correo ya fue usado",
                            type:"red",
                            onDestroy:function(){
                                $("#btn").attr("disabled", false); 
                            }
                        });
                    }      
                }
            });
        }
    });
});