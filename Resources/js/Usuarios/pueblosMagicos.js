$(document).ready(function(){

    var campos;

    $.ajax({
        method:"post",
        url:"pueblosMagicosBE.php",        
        data:{
            "opcion" : "1",        
        },
        success:function(resp){                                    	                	                                                                                   
            $("#nombre").autocomplete({
                data: JSON.parse(resp),
                onAutocomplete: function(){
                    nombre = $("#nombre").val();
                    $.ajax({
                        method:"post",
                        url:"pueblosMagicosBE.php",
                        data:{
                            "opcion" : "2",
                            "nombre" : nombre
                        },
                        success:function(resp){
                            $("#resultado").html(resp);
                            $("#calificacion").formSelect();

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
                                        url:"pueblosMagicosBE.php",
                                        data:$("#formulario").serialize(),
                                        success:function(resp){                                            
                                            if(resp == 1){
                                                $.alert({     
                                                    title: "OK",
                                                    content:"Reseña subida. Esperando revisión",
                                                    type:"green",
                                                    onDestroy: function(){
                                                        $(location).attr("href", "./menu.php")
                                                    }                            
                                                });
                                            }else{
                                                $.alert({
                                                    title:"Error",
                                                    content: "Ocurrió un error. Intentar de nuevo",
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
                        }
                    });
                } 
            }); 
        }
    });   
           

  });