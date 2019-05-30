$(document).ready(function(){
    $("#formulario1").validetta({
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
            $("#btn1").attr("disabled", true);
            $.ajax({
                method:"post",
                url:"editarBE.php",
                data:$("#formulario1").serialize(),
                success:function(resp){
                    if(resp == 1){
                        $.alert({     
                            title: "OK",
                            content:"Datos actualizados",
                            type:"green",
                            onDestroy: function(){
                                $(location).attr("href", "./menu.php")
                            }                            
                        });
                    }else{
                        $.alert({
                            title:"Error",
                            content: "No realizó ningún cambio",
                            type:"red",
                            onDestroy:function(){
                                $("#btn1").attr("disabled", false); 
                            }
                        });
                    }
                }
            });
        }
    });
    $("#formulario2").validetta({
        bubblePosition: "bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,        
        onError:function(e){
            e.preventDefault();
        },
        onValid:function(e){
            e.preventDefault();
            $("#btn2").attr("disabled", true);
            $.ajax({
                method:"post",
                url:"editarBE.php",
                data:$("#formulario2").serialize(),
                success:function(resp){                                    	                	                                                                       
                    if(resp == 1){
                        $.alert({     
                            title: "OK",
                            content:"Contraseña actualizada",
                            type:"green",
                            onDestroy: function(){
                                $(location).attr("href", "./menu.php")
                            }                            
                        });
                    }else{
                        $.alert({
                            title:"Error",
                            content: "La contraseña no es correcta",
                            type:"red",
                            onDestroy:function(){
                                $("#btn2").attr("disabled", false); 
                            }
                        });
                    }                      
                }
            });
        }
    });
});