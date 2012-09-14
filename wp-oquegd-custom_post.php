<?php

function wp_oquegd_oque() {
	$labels = array(
			'name' => _x( 'O que é?', 'oque' ),
			'singular_name' => _x( 'Documento', 'oque' ),
			'add_new' => _x( 'Novo Documento', 'oque' ),
			'all_items' => _x('Documentos', 'oque'),
			'add_new_item' => _x( 'Adicionar Novo Documento', 'oque' ),
			'edit_item' => _x( 'Editar Documento', 'oque' ),
			'new_item' => _x( 'Novo Documento', 'oque' ),
			'view_item' => _x( 'Visualizar Documento', 'oque' ),
			'search_items' => _x( 'Pesquisar Documento', 'oque' ),
			'not_found' => _x( 'Nenhum documento encontrado', 'oque' ),
			'not_found_in_trash' => _x( 'Nenhum documento encontrado na lixeira', 'oque' ),
			'parent_item_colon' => _x( 'Documento pai:', 'oque' ),
			'menu_name' => _x( 'O que é?', 'oque'),
	);
	$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'supports' => array( 'title', 'editor', 'author', 'comments', 'revisions'),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 80,
			'show_in_nav_menus' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'has_archive' => true,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => true,
			'capability_type' => 'post'
	);
	register_post_type( 'oquegd_oque', $args );
}

add_action( 'init', 'wp_oquegd_oque' );

?>