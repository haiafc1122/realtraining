/*
*
*	Author @BaoHuyBaoHuy
*
*/

$(document).ready(function(){

	// SideNav Reposive
	$('.button-collapse').sideNav({
	    menuWidth: 300,
	    edge: 'right',
	    draggable: true
	});

	$('.modal').modal();
	$('select').material_select();

	// Slider index
	$('.carousel').carousel({
		dist:0,
        shift:0,
        padding:50,
	});
	window.setInterval(function(){$('.carousel').carousel('next')},3000)
	$(window).resize(function(){
		remove_valign();
	})
	remove_valign();

	function remove_valign(){
		var document_width = $(document).width();
		var selector = $('.content_4 .valign-wrapper');
		if (document_width <= 580) {
			$('.content_4 .row.valign-wrapper').removeClass('valign-wrapper').addClass('center');
		}else{
			$('.content_4 .row.center').removeClass('center').addClass('valign-wrapper');
		};
	}
	//End slider index

	// Fixed Nav
	var top = $(this).scrollTop();
	setFixedHeader(top);

	function setFixedHeader(top){
		if (top >= 50) {
			$('#header').addClass('top_fixed');
			$('body>section').css('margin-top','80px');
			$('.img_fixed').fadeIn();
		}else{
			$('#header').removeClass('top_fixed');
			$('body>section').css('margin-top','0');
			$('.img_fixed').fadeOut();
		}
	}

	$(document).scroll(function(){
		var top = $(this).scrollTop();
		setFixedHeader(top);
	})
})