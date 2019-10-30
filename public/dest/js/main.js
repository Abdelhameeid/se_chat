$(document).ready(function(){
 $('#customRadioInline1').click(function(){
        $('.warn').slideDown(500);
    });
    $('#customRadioInline2').click(function(){
        $('.warn').slideUp(500);
        
    });
    /////// chosse the identity at ads & offer form
    $('#img-slide-option').click(function(){
        $('.img-slide').show(500)
    });
    // Material Select Initialization
    $('select').niceSelect();
    ///wow plugin height
    new WOW().init();
  
});