$(document).ready(function(){
    $("#formulario").validetta({
        bubblePosition: "bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onError:function(e){
            e.preventDefault();
        },
        onValid:function(e){
            e.preventDefault();
            $("#btn").attr("disabled", true);
            $.ajax({
                method:"post",
                url:"login.php",
                data:$("#formulario").serialize(),
                success:function(resp){                                    	                	                               
                    if(resp == 1){
                        $.alert({     
                            title: "Ingresar al sistema",
                            content:"¡Bienvenido!",
                            type:"green",
                            onDestroy: function(){
                                $(location).attr("href", "./menu.php")
                            }                            
                        });
                    }else{
                        $.alert({
                            title:"Error",
                            content:"El CURP o la contraseña son incorrectos",
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