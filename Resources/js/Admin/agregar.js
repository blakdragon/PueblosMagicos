$(document).ready(function(){
    $("#estado").formSelect();
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
                url:"agregarBE.php",
                data:$("#formulario").serialize(),
                success:function(resp){                
                    if(resp == 1){
                        $.alert({     
                            title: "OK",
                            content:"Se ha subido el pueblo mágico",
                            type:"green",
                            onDestroy: function(){
                                $(location).attr("href", "./menu.php")
                            }                            
                        });
                    }else{
                        $.alert({
                            title:"Error",
                            content: "Ese pueblo ya existe",
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