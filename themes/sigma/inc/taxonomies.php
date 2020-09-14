<?php
// TAXONOMIES ////////////////////////////////////////////////////////////////////////
	add_action( 'init', 'custom_taxonomies_callback', 0 );
	function custom_taxonomies_callback(){

		// TIPO DE SERVICIO
		if( ! taxonomy_exists('autores')){

			$labels = array(
				'name'              => 'Tipos de servicios',
				'singular_name'     => 'Tipo de servicio',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar Tipo de servicio',
				'update_item'       => 'Actualizar Tipo de servicio',
				'add_new_item'      => 'Nuevo Tipo de servicio',
				'new_item_name'     => 'Nombre Nuevo Tipo de servicio',
				'menu_name'         => 'Tipos de servicios'
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_in_rest'			=> true,
				'public'						=> true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'tipo-servicio' ),
			);

			register_taxonomy( 'tipo-servicio', 'servicios', $args );
		}


		// TERMS
		// if ( ! term_exists( 'inmobiliario', 'tipo-servicio' ) ){
		// 	wp_insert_term( 'Inmobiliario', 'category', array('slug' => 'inmobiliario') );
		// }
		// if ( ! term_exists( 'diseno-construccion', 'tipo-servicio' ) ){
		// 	wp_insert_term( 'Diseño & Construcción', 'category', array('slug' => 'diseno-construccion') );
		// }
		// if ( ! term_exists( '', 'tipo-servicio' ) ){
		// 	wp_insert_term( 'Inmobiliario', 'category', array('slug' => 'inmobiliario') );
		// }

		/* // SUB TERMS CREATION
		if(term_exists('parent-term', 'category')){
			$term = get_term_by( 'slug', 'parent-term', 'category');
			$term_id = intval($term->term_id);
			if ( ! term_exists( 'child-term', 'category' ) ){
				wp_insert_term( 'A child term', 'category', array('slug' => 'child-term', 'parent' => $term_id) );
			}

		} */

	}
