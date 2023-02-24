$(document).ready(function(){
    //nombre bienvenido
    $("#sub").hover(function(){
       $(this).animate({fontSize : '4em'},"slow");},function(){
    });
    //barra de navegacion
    $("#inicio").hover(function(){
       $(this).animate({fontSize : '2em'},"slow");},function(){
    });

    $("#doctores").hover(function(){
       $(this).animate({fontSize : '2em'},"slow");},function(){
    });

    $("#pacientes").hover(function(){
       $(this).animate({fontSize : '2em'},"slow");},function(){
    });

    $("#consultorios").hover(function(){
       $(this).animate({fontSize : '2em'},"slow");},function(){
    });

    $("#citas").hover(function(){
       $(this).animate({fontSize : '2em'},"slow");},function(){
    });

    $("#expediente").hover(function(){
       $(this).animate({fontSize : '2em'},"slow");},function(){
    });
});
