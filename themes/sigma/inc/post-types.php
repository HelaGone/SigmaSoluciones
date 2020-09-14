<?php
// CUSTOM POST TYPES //////////////////////////////////////////////////
add_action('init', function(){

	// ASESORES
	$labels = array(
		'name'          => 'Asesores',
		'singular_name' => 'Asesor',
		'add_new'       => 'Nuevo Asesor',
		'add_new_item'  => 'Nuevo Asesor',
		'edit_item'     => 'Editar Asesor',
		'new_item'      => 'Nuevo Asesor',
		'all_items'     => 'Todos',
		'view_item'     => 'Ver Asesor',
		'search_items'  => 'Buscar Asesor',
		'not_found'     => 'No se encontró',
		'menu_name'     => 'Asesores'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'		   => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'asesores' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'menu_icon'			     => 'dashicons-businesswoman',
		'hierarchical'       => false,
		'menu_position'      => 4,
		'taxonomies'         => array(),
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author' )
	);
	register_post_type( 'asesores', $args );


	// INMUEBLES
	$labels = array(
		'name'          => 'Inmuebles',
		'singular_name' => 'Inmueble',
		'add_new'       => 'Nuevo Inmueble',
		'add_new_item'  => 'Nuevo Inmueble',
		'edit_item'     => 'Editar Inmueble',
		'new_item'      => 'Nuevo Inmueble',
		'all_items'     => 'Todos',
		'view_item'     => 'Ver Inmueble',
		'search_items'  => 'Buscar Inmueble',
		'not_found'     => 'No se encontró',
		'menu_name'     => 'Inmuebles'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'		   => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'inmueble'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'menu_icon'			     => 'dashicons-admin-multisite',
		'hierarchical'       => false,
		'menu_position'      => 4,
		'taxonomies'         => array('category', 'post_tag'),
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author' )
	);
	register_post_type( 'inmuebles', $args );


	// TESTIMONIOS
	$labels = array(
		'name'          => 'Casos de éxito',
		'singular_name' => 'Caso',
		'add_new'       => 'Nuevo Caso',
		'add_new_item'  => 'Nuevo Caso',
		'edit_item'     => 'Editar Caso',
		'new_item'      => 'Nuevo Caso',
		'all_items'     => 'Todos',
		'view_item'     => 'Ver Caso',
		'search_items'  => 'Buscar Caso',
		'not_found'     => 'No se encontró',
		'menu_name'     => 'Casos de éxito'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'		   => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'casos-de-exito'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'menu_icon'			     => 'dashicons-awards',
		'hierarchical'       => false,
		'menu_position'      => 4,
		'taxonomies'         => array('category', 'post_tag'),
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author' )
	);
	register_post_type( 'casos-de-exito', $args );


	// RECORRIDOS VIRTUALES
	$labels = array(
		'name'          => 'Recorridos Virtuales',
		'singular_name' => 'Recorrido',
		'add_new'       => 'Nuevo Recorrido',
		'add_new_item'  => 'Nuevo Recorrido',
		'edit_item'     => 'Editar Recorrido',
		'new_item'      => 'Nuevo Recorrido',
		'all_items'     => 'Todos',
		'view_item'     => 'Ver Recorrido',
		'search_items'  => 'Buscar Recorrido',
		'not_found'     => 'No se encontró',
		'menu_name'     => 'Recorridos Virtuales'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'		   => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'recorridos-virtuales'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'menu_icon'			     => 'dashicons-visibility',
		'hierarchical'       => false,
		'menu_position'      => 4,
		'taxonomies'         => array('category', 'post_tag'),
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author' )
	);
	register_post_type( 'recorridos-virtuales', $args );


	// SERVICIOS
	$labels = array(
		'name'          => 'Servicios',
		'singular_name' => 'Servicio',
		'add_new'       => 'Nuevo Servicio',
		'add_new_item'  => 'Nuevo Servicio',
		'edit_item'     => 'Editar Servicio',
		'new_item'      => 'Nuevo Servicio',
		'all_items'     => 'Todos',
		'view_item'     => 'Ver Servicio',
		'search_items'  => 'Buscar Servicio',
		'not_found'     => 'No se encontró',
		'menu_name'     => 'Servicios'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'		   => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'servicios'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'menu_icon'			     => 'dashicons-admin-tools',
		'hierarchical'       => false,
		'menu_position'      => 4,
		'taxonomies'         => array('category', 'post_tag', 'taxonomy'),
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author' )
	);
	register_post_type( 'servicios', $args );

});
