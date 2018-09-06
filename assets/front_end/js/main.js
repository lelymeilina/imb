
$(function() {
	var pull = $('#pull');
	var menu = $('nav.nav-home ul');

	$(pull).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});
});
	
$(window).resize(function(){
	var menu = $('nav.nav-home ul');
	var w = $(window).width();
    if(w > 320 && menu.is(':hidden')) {
          menu.removeAttr('style');
        }
    });
	
$(window).load(function() {
	$('#loader').delay(800).fadeOut(500);
	
	$('.banner').unslider({
        fluid: true,
        dots: true,
        speed: 500,
        delay: 4000
      });
	if(window.chrome) {
        $('.banner li').css('background-size', '100% 100%');
    }
});


$(document).ready(function ($) {
	
	App.initHelpers(['appear', 'appear-countTo']);
	
	if($('#biodata').length > 0){
		App.initHelpers(['datepicker', 'colorpicker']);
		
	}
	/*----------------------------------------------------*/
	/*	Nice-Scroll
	/*----------------------------------------------------*/
	
	$("html").niceScroll({
		scrollspeed: 100,
		mousescrollstep: 38,
		cursorwidth: 5,
		cursorborder: 0,
		cursorcolor: '#00afd1',
		autohidemode: true,
		zindex: 999999999,
		horizrailenabled: false,
		cursorborderradius: 0,
	});
	
	
	/*----------------------------------------------------*/
	/*	Back Top Link
	/*----------------------------------------------------*/
	
    var offset = 200;
    var duration = 500;
    $(window).scroll(function() {
        if ($(this).scrollTop() > offset) {
            $('.back-to-top').fadeIn(400);
        } else {
            $('.back-to-top').fadeOut(400);
        }
    });
    $('.back-to-top').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop: 0}, 600);
        return false;
    })

});