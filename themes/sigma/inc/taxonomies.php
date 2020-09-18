<?php
// TAXONOMIES ////////////////////////////////////////////////////////////////////////
	add_action( 'init', 'custom_taxonomies_callback', 0 );
	function custom_taxonomies_callback(){

		// TIPO DE SERVICIO
		if( ! taxonomy_exists('tipo-servicio')){

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

			register_taxonomy( 'tipo-servicio', array('casos-de-exito', 'recorridos-virtuales'), $args );
		}

		// TERMS

		$args = array(
			'post_type'=>'servicios',
			'posts_per_page'=>-1,
			'post_status'=>'publish',
		);
		$terms = get_posts($args);

		// debug($terms);
		// die();

		if(is_array($terms)&&!empty($terms)):
			foreach($terms as $key => $term):
				$slg = strtolower($term->post_name);
				$nme = $term->post_title;
				if ( !term_exists( $slg, 'tipo-servicio' ) ){
					wp_insert_term( $nme, 'tipo-servicio', array('slug' => $slg) );
				}
			endforeach;
		endif;

		// RUBROS
		if( ! taxonomy_exists('rubros')){

			$labels = array(
				'name'              => 'Rubros',
				'singular_name'     => 'Rubro',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar Rubro',
				'update_item'       => 'Actualizar Rubro',
				'add_new_item'      => 'Nuevo Rubro',
				'new_item_name'     => 'Nombre Nuevo Rubro',
				'menu_name'         => 'Rubros'
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
				'rewrite'           => array( 'slug' => 'rubros' ),
			);

			register_taxonomy( 'rubros', array('servicios'), $args );
		}

		if ( ! term_exists( 'inmobiliaria', 'rubros' ) ){
			wp_insert_term( 'Inmobiliaria', 'rubros', array('slug' => 'inmobiliaria') );
		}
		if ( ! term_exists( 'medios-digitales', 'rubros' ) ){
			wp_insert_term( 'Recorridos virtuales', 'rubros', array('slug' => 'medios-digitales') );
		}
		if ( ! term_exists( 'arquitectura', 'rubros' ) ){
			wp_insert_term( 'Diseño & Construcción', 'rubros', array('slug' => 'arquitectura') );
		}



		/* // SUB TERMS CREATION
		if(term_exists('parent-term', 'category')){
			$term = get_term_by( 'slug', 'parent-term', 'category');
			$term_id = intval($term->term_id);
			if ( ! term_exists( 'child-term', 'category' ) ){
				wp_insert_term( 'A child term', 'category', array('slug' => 'child-term', 'parent' => $term_id) );
			}

		} */

	}
