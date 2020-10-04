jQuery(document).ready(function(){
	'use strict';
	console.log('functions js');

	/*
	 * Vanilla JS
	*/


	/*
	 * jQuery
	*/
	// FIT VIDS
	jQuery('.single-inmuebles').fitVids();
	jQuery('.content_container').fitVids();

	// CAROUSELS IN ARCHIVE BOTTOM POSITION
	jQuery('.bottom_carousel').bxSlider({
		pager:false,
		controls:false,
		auto:true,
		slideMargin:16
	});

	// CAROUSELS IN PAGES WITH PARTNERS
	const bx_conf_partners = {
		controls:false,
		pager:false,
		auto:true,
		slideWidth:0
	};
	jQuery('.companies_carousel').bxSlider(bx_conf_partners);

	// View Bos Servicios
	jQuery('button.serv_button').on('click', function(){
		// console.log("click service");
		jQuery(this).parent().parent().find('.view_box').show();
	});
	jQuery('.close_viewbox').on('click', function(){
		jQuery(this).parent().hide();
	});

});
