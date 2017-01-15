$(document).ready(function(){
    
    $("body.page-id-5 .ciclo2").replaceWith('<div id="faderCiclo2"> <div class="fader"> <img src="'+TEMPLATE_URL+'/images/pro_al_1.png" /> <img src="'+TEMPLATE_URL+'/images/pro_al_2.png" /> </div> </div>')
    $("body.page-id-5 .ciclo5").replaceWith('<div id="faderCiclo5"> <div class="fader"> <img src="'+TEMPLATE_URL+'/images/pro_vac_1.png" /> <img src="'+TEMPLATE_URL+'/images/pro_vac_2.png" /> <img src="'+TEMPLATE_URL+'/images/pro_vac_3.png" /> </div> </div>')
    
    
    $("body.page-id-7 table.bordes:last").css('border-bottom','6px solid #E4E4E4');
    
    $("body.page-id-6 h4:first").css('border-top','9px solid black')
    
    $("body.page-id-6 h4").click(function(){
        $("body.page-id-6 .informacion").slideUp(200)
        if( $(this).next('.informacion').is(':visible') ){
            $(this).next('.informacion').slideUp(200)
            $(this).removeClass('opened');    
        } else {
            $(this).next('.informacion').slideDown(200);
            $(this).addClass('opened');
        }
    })
    
    $('#faderCiclo2 .fader').innerfade({
		animationtype: 'fade',
		speed: 1000,
		timeout: 3000,
		containerheight: '100%'
	});
    
    $('#faderCiclo5 .fader').innerfade({
		animationtype: 'fade',
		speed: 1000,
		timeout: 3000,
		containerheight: '100%'
	});
    
    $('.exposer').innerfade({
		animationtype: 'fade',
		speed: 1000,
		timeout: 5000,
		containerheight: '100%'
	});
    
    $("#franja .carousel").jCarouselLite({
        auto : 4000,
        speed : 1000,
        visible : 1
    })
    
});
