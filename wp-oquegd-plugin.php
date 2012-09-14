<?php
/*
 Plugin Name: WP O que e? GD
Plugin URI: http://www.procergs.rs.gov.br
Description: Plugin Wordpress O que e? GD, desenvolvido pela PROCERGS.
Version: 1.0.0
Author: Cristiane | Felipe | Leo
Author URI: http://www.procergs.rs.gov.br
*/

/*  Copyright 2012

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class WPOqueGD{

	public function ativar(){
		add_option('wp_oquegd', '');
	}
	public function desativar(){
		delete_option('wp_oquegd');
	}
}

$prefix = 'wp_oquegd_';

$pathPlugin = substr(strrchr(dirname(__FILE__),DIRECTORY_SEPARATOR),1).DIRECTORY_SEPARATOR.basename(__FILE__);

// Função ativar
register_activation_hook( $pathPlugin, array('WPOqueGD','ativar'));

// Função desativar
register_deactivation_hook( $pathPlugin, array('WPOqueGD','desativar'));

include_once('wp-oquegd-custom_post.php');
include_once('wp-oquegd-custom_taxonomy.php');
include_once('wp-oquegd-custom_metabox.php');
include_once('wp-oquegd-widget.php');

?>
