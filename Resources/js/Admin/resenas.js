function Aprovar(x){
    
    lugar = "#lugar" + x;    

    $.ajax({
        method:"post",
        url:"resenasBE.php",
        data:{
            "idresena" : x
        },
        success:function(resp){  
            alert(resp);
            if(resp == 1)
                $(lugar).attr("hidden", true);
        }
    });

}