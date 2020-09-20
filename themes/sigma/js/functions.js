$(document).ready(function(){
	'use strict';
	console.log('functions js');

	/*
	 * Vanilla JS
	*/


	/*
	 * jQuery
	*/
	// FIT VIDS
	$('.single').fitVids();
	// CAROUSELS IN ARCHIVE BOTTOM POSITION
	$('.bottom_carousel').bxSlider({
		pager:false,
		controls:false,
		auto:true,
		slideMargin:16
	});

	// CAROUSELS IN PAGES WITH PARTNERS
	const bx_conf_partners = {
		mode:'horizontal',
		easing:'ease-in',
		controls:false,
		pager:false,
		auto:true,
		pause:1666,
		maxSlides:9,
		minSlides:2,
		responsive:true
	};
	$('.companies_carousel').bxSlider(bx_conf_partners);

	// View Bos Servicios
	$('button').on('click', function(){
		console.log("click");
		$(this).parent().parent().find('.view_box').show();
	});
	$('.close_viewbox').on('click', function(){
		$(this).parent().hide();
	});

});
