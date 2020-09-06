<?php 
//UNCOMMENT THIS FILE IN ORDER TO WORK
/*
// REGISTER CUSTOM METABOXES //////////////////////////////////////////////////////////
	add_action('add_meta_boxes', function(){
		add_metabox('meta_id', 'Metabox Test', 'callback_function', 'post_type', 'side', 'high');
	});

// CUSTOM METABOXES CALLBACK FUNCTIONS ///////////////////////////////////////////////
	//very simple input field
	function callback_function($post){
		$_meta = get_post_meta($post->ID, '_meta_name', true);
		echo "<input type='text' class='widefat' name='_meta_field_name' value='$_meta'>";
		wp_nonce_field(__FILE__, '_meta_name_nonce');
	}

// SAVE METABOXES VALUES /////////////////////////////////////////////////////////////	
add_action('save_post', function($post_id){
	if ( ! current_user_can('edit_page', $post_id)) 
		return $post_id;

	if ( defined('DOING_AUTOSAVE') and DOING_AUTOSAVE ) 
		return $post_id;

	if ( wp_is_post_revision($post_id) OR wp_is_post_autosave($post_id) ) 
		return $post_id;

	//ACTUALLY SAVING POST META
	if( isset($_POST['_meta_field_name'])&&check_admin_referer(__FILE__, '_meta_name_nonce') ){
		update_post_meta($post_id, '_meta_name', $_POST['_meta_field_name']);
	}else{
		delete_post_meta($post_id, '_meta_name');
	}

// GUARDAR CORRECTAMENTE LOS CHECKBOXES ////////////////////////////////////////////////////

	if(isset($_POST['_meta_name']) and check_admin_referer(__FILE__, '_nt_meta_nonce')){
		update_post_meta($post_id, '_meta_name', $_POST['_meta_name']);
	}else if( !defined('DOING_AJAX') ){
		delete_post_meta($post_id, '_meta_name');
	}

});
*/