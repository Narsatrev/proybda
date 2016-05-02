function alerta_global(tipo,titulo, mensaje){
    var string_generar_alerta="<div class='alerta_global'><div class='titulo_alerta_global'>"+titulo+"</div><div class='mensaje_alerta_global'>"+mensaje
    +"</div><div class='contenedor_botones'>";
    if(tipo==1){
        string_generar_alerta+="<div class='boton_ok_alerta_global b1' id='bok'>OK</div><div class='boton_cancelar_alerta_global'>Cancelar</div>";
    }else{
        string_generar_alerta+="<div class='boton_ok_alerta_global' id='bok'>OK</div>";
    }
    string_generar_alerta+="</div></div><div class='pantalla_oscura_alerta_global'><div>";
//    $('body').append();
    
    $(string_generar_alerta).hide().appendTo('body').fadeIn(800);
}


$(document).keydown(function(e){
    if(e.which == 13){
        if($(".alerta_global").length>0){
            $(".boton_ok_alerta_global").click();
        }
    }
    if(e.which == 27){
        if($(".alerta_global").length>0){
            $(".boton_cancelar_alerta_global").click();
        }
    }    
});
var e=false;

$(document).on('click','.boton_ok_alerta_global',function() {
    if($(this).hasClass('b1')){
        e=true;       
    }        
    $(document).find('.alerta_global').fadeOut(150, function(){
        $(this).remove(); 
    });
    $(document).find('.pantalla_oscura_alerta_global').fadeOut(150, function(){
        $(this).remove(); 
    });    
});


$(document).on('click','.boton_cancelar_alerta_global',function() {
    $(document).find('.alerta_global').fadeOut(150, function(){
        $(this).remove(); 
    });
    $(document).find('.pantalla_oscura_alerta_global').fadeOut(150, function(){
        $(this).remove(); 
    });
});



