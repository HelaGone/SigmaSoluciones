<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-91771961-11"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		  gtag('config', 'UA-91771961-11');
		</script>
		<meta charset="utf-8" name="Custom Theme">
		<title><?php ct_print_title(); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes, maximum-scale=5, minimum-scale=1, height=device-height">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="HandheldFriendly" content="true"/>
		<meta http-equiv="cleartype" content="on"/>
		<meta name="theme-color" content="#fff"/>

		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/images/ico/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/images/ico/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/ico/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/images/ico/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/ico/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/images/ico/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/ico/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/images/ico/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/images/ico/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/images/ico/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/images/ico/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/images/ico/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/images/ico/favicon-16x16.png">

		<link rel="manifest" href="<?php echo THEMEPATH .'manifest.json'; ?>">
		<link rel="preload" href="<?php echo FONTSPATH .'AkzidenzGrotesk-Light.otf'; ?>" as="font" crossorigin>
		<link rel="preload" href="<?php echo FONTSPATH .'AkzidenzGrotesk-Regular.otf'; ?>" as="font" crossorigin>
		<link rel="preload" href="<?php echo FONTSPATH .'AkzidenzGrotesk-Bold.otf'; ?>" as="font" crossorigin>
		<link rel="preload" href="<?php echo FONTSPATH .'AkzidenzGrotesk-Cond.otf'; ?>" as="font" crossorigin>
		<link rel="preload" href="<?php echo FONTSPATH .'AkzidenzGrotesk-LightCond.otf'; ?>" as="font" crossorigin>
		<link rel="preload" href="<?php echo FONTSPATH .'SourceSerifPro-Bold.ttf'; ?>" as="font" crossorigin>
		<link rel="preload" href="<?php echo FONTSPATH .'SourceSerifPro-Light.ttf'; ?>" as="font" crossorigin>
		<link rel="preload" href="<?php echo FONTSPATH .'SourceSerifPro-LightItalic.ttf'; ?>" as="font" crossorigin>

		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/ico/favicon.ico">
		<link rel="icon" type="image/ico" href="<?php echo get_template_directory_uri(); ?>/images/ico/favicon.ico" >
		<script>
			/*TWITTER JS*/
			/*
			window.twttr = (function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0],
			    t = window.twttr || {};
			  if (d.getElementById(id)) return t;
			  js = d.createElement(s);
			  js.id = id;
			  js.src = "https://platform.twitter.com/widgets.js";
			  fjs.parentNode.insertBefore(js, fjs);

			  t._e = [];
			  t.ready = function(f) {
			    t._e.push(f);
			  };

			  return t;
			}(document, "script", "twitter-wjs"));
			*/

			/*FACEBOOK JS*/
			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
	</script>
		<!-- START WP_HEAD -->
		<?php wp_head(); ?>
		<!-- END WP_HEAD -->
		<script type="text/javascript" async src="<?php echo JSPATH . 'jquery.bxslider.js?ver=4.2.12' ?>"></script>
		<script type="text/javascript">
			let isOpen = false;
			const hk_handle_toggle_menu = () => {
				let menu_node = document.getElementById('menu_container');
				if(!isOpen){
					menu_node.style.padding = '64px 48px';
					menu_node.style.width = '100%';
					//Foter scroll
					document.getElementById('big_f').scrollIntoView({
						behavior: 'auto'
					});
					isOpen = !isOpen;
				}else{
					//Scroll to top
					window.scrollTo(0, 0);
					menu_node.style.padding = '0';
					menu_node.style.width = '0';
					isOpen = !isOpen;
				}
			}
		</script>
	</head>
	<body <?php body_class(); ?> >
		<header id="main_header" class="main_header">
			<div class="main_header_item logo_item">
				<a href="<?php echo home_url('','https'); ?>" title="Sigma Soluciones">
					<img width="83" height="47" src="<?php echo THEMEPATH . 'images/logo_sigma.svg'; ?>" alt="Sigma Soluciones Logotipo">
				</a>
			</div>
			<div class="main_header_item button_item">
				<button type="button" name="button" onclick="hk_handle_toggle_menu()" title="Menu Button">
					<svg xmlns="http://www.w3.org/2000/svg" fill="#F16922" height="24" viewBox="0 0 24 24" width="24">
						<path d="M0 0h24v24H0z" fill="none"/>
						<path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
					</svg>
				</button>
			</div>
		</header>
		<main class="main_wrapper">
