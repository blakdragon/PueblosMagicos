$(document).ready(function(){
    $("#btn").click(function(){
        $.confirm({
            title: "Cerrar Sesión",
            content: "¿Realmente deseas cerrar sesión?",
            buttons: {
                Si: function(){
                    $.ajax({
                        method:"post",
                        url:"./../cerrarSesion.php",                        
                        success:function(resp){
                            $(location).attr("href", "./../")
                        }
                    });
                },
                No: function(){ 
                }
            },
            onDestroy: function(){
                $("#btn").blur(); // Para que no se vea como 'presionado' el botón  
            }
        }); 
    });
});