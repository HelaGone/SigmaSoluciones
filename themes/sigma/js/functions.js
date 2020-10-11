$(document).ready(function(){
	console.log("dom ready");

	//DUAL CAROUSEL HOME
	const bx_conf_home = {
		mode:'vertical',
		captions:false,
		pager: false,
		auto:true,
		controls:false
	}
	const bx_conf_home_2 = {
		mode:'vertical',
		captions:false,
		pager: false,
		auto:true,
		controls:false,
		autoDirection:'prev'
	}
	$('.carousel1').bxSlider(bx_conf_home);
	$('.carousel2').bxSlider(bx_conf_home_2);


	// CAROUSELS IN ARCHIVE BOTTOM POSITION
	$('.bottom_carousel').bxSlider({
		pager:false,
		controls:false,
		auto:true,
		slideMargin:16,
		slideWidth:0
	});

	//CARRUSEL GALERÍA INMUEBLE
	$('.inmueble_slider').bxSlider({
		mode:'fade',
		pager:false,
		auto:true,
		slideWidth:0
	});

	// CAROUSELS IN PAGES WITH PARTNERS
	const bx_conf_partners = {
		controls:false,
		pager:false,
		auto:true,
		slideWidth:0
	};
	$('.companies_carousel').bxSlider(bx_conf_partners);
	$('.blocks-gallery-grid').bxSlider(bx_conf_partners);

	// PANNELLUM PLUGIN
	// pannellum.viewer('panorama',{
	//   "type":"equirectangular",
	//   "panorama":"<?php echo esc_url($imagen360); ?>"
	// });

	//TABPANEL
	const hk_hanlde_panel = (elemt, type) =>{
		let tabButtons = document.getElementsByClassName('tab_item')
		Object.keys(tabButtons).forEach((index) => {
			let tab = tabButtons[index];
			let button = $(tab).find('button');
			button.removeClass('selected_tab');
		});
		elemt.classList.add('selected_tab');

		//PANELS
		let panelElements = document.getElementsByClassName('panel');
		Object.keys(panelElements).forEach((index) => {
			let item = panelElements[index];
			item.classList.remove('selected');
			if(item.dataset.mediaType == type){
				item.classList.add('selected');
			}
		});
	} //END HANDLE PANEL FUNCTION

	// View Bos Servicios
	$('button.serv_button').on('click', function(){
		$(this).parent().parent().find('.view_box').show();
	});
	$('.close_viewbox').on('click', function(){
		$(this).parent().hide();
	});

	// FIT VIDS
	$('.single-inmuebles').fitVids();
	$('.content_container').fitVids();

});
