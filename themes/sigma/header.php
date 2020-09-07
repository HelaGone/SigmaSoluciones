<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
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

		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/manifest.json">

		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">

		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/ico/favicon.ico">
		<link rel="icon" type="image/ico" href="<?php echo get_template_directory_uri(); ?>/images/ico/favicon.ico" >
		<!-- START WP_HEAD -->
		<?php wp_head(); ?>
		<!-- END WP_HEAD -->
		<script type="text/javascript">
			const hk_handle_toggle_menu = () => {
				console.log('click menu');
			}
		</script>
	</head>
	<body <?php body_class(); ?> >
		<header id="main_header" class="main_header">
			<div class="header_item">
				<img src="<?php echo THEMEPATH . 'images/logo_sigma.png'; ?>" alt="Sigma Soluciones Logotipo">
			</div>
			<div class="header_item">
				<button type="button" name="button" onclick="hk_handle_toggle_menu">
					<svg xmlns="http://www.w3.org/2000/svg" fill="#F16922" height="24" viewBox="0 0 24 24" width="24">
						<path d="M0 0h24v24H0z" fill="none"/>
						<path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
					</svg>
				</button>
			</div>
		</header>
