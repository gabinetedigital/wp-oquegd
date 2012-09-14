<?php

/*
global $meta_boxes_oquegd;

$prefix = 'wp_oquegd_';

$meta_boxes_oquegd = array();

$meta_boxes_oquegd[] = array(
		'id' => $prefix.'info_geral',
		'title' => 'Informações Gerais',
		'pages' => array('oquegd_oque'),
		'context'=> 'normal',
		'priority'=> 'high',
		'fields' => array(
						array(
							'name'	=> 'Screenshots (plupload)',
							'desc'	=> 'Screenshots of problems, warnings, etc.',
							'id'	=> $prefix . 'screenshot2',
							'type'	=> 'plupload_image',
							'max_file_uploads' => 4,
						),
						array(
							'name'	=> 'Screenshots (thickbox upload)',
							'desc'	=> 'Screenshots of problems, warnings, etc.',
							'id'	=> $prefix . 'screenshot3',
							'type'	=> 'thickbox_image',
						)
		)
);


function wp_oquegd_register_meta_boxes()
{
	global $meta_boxes_oquegd;

	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes_oquegd as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}

add_action('admin_init', 'wp_oquegd_register_meta_boxes' );
*/

?>