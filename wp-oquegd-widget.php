<?php

class OqueListaWidget extends WP_Widget
{
	function OqueListaWidget()
	{
		$widget_ops = array('classname' => 'OqueListaWidget', 'description' => 'O que é? Gabinete Digital. Lista de documentos O que é?' );
		$this->WP_Widget('OqueListaWidget', 'Gabinete Digital - O que é?', $widget_ops);
	}

	function form($instance)
	{
		$instance = wp_parse_args( (array) $instance, array( 'titulo' => '', 'colunas' => '3', 'qtd' => '5', 'css_class' => '' ) );
		$titulo = $instance['titulo'];
		$colunas = $instance['colunas'];
		$qtd = $instance['qtd'];
		$css_class = $instance['css_class'];

		?>
  		<p><label for="<?php echo $this->get_field_id('titulo'); ?>">Titulo: <input class="widefat" id="<?php echo $this->get_field_id('titulo'); ?>" name="<?php echo $this->get_field_name('titulo'); ?>" type="text" value="<?php echo attribute_escape($titulo); ?>" /></label></p>
  		<p><label for="<?php echo $this->get_field_id('qtd'); ?>">Quantidade: <input class="widefat" id="<?php echo $this->get_field_id('qtd'); ?>" name="<?php echo $this->get_field_name('qtd'); ?>" type="text" value="<?php echo attribute_escape($qtd); ?>" /></label></p>
  		<p><label for="<?php echo $this->get_field_id('colunas'); ?>">Colunas: <input class="widefat" id="<?php echo $this->get_field_id('colunas'); ?>" name="<?php echo $this->get_field_name('colunas'); ?>" type="text" value="<?php echo attribute_escape($colunas); ?>" /></label></p>
  		<p><label for="<?php echo $this->get_field_id('css_class'); ?>">Classe CSS: <input class="widefat" id="<?php echo $this->get_field_id('css_class'); ?>" name="<?php echo $this->get_field_name('css_class'); ?>" type="text" value="<?php echo attribute_escape($css_class); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['titulo'] = $new_instance['titulo'];
    $instance['colunas'] = $new_instance['colunas'];
    $instance['qtd'] = $new_instance['qtd'];
    $instance['css_class'] = $new_instance['css_class'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    $args_query_post = '';
    $txtreturn = '';
    
    $titulo   = empty($instance['titulo']) ? ' ' : apply_filters('widget_titulo', $instance['titulo']);
    $colunas  = $instance['colunas'];
    $qtd 	  = $instance['qtd'];
    $custom_post = 'oquegd_oque';
 
    if (!empty($qtd))
    	$args_query_post = $args_query_post . "posts_per_page=" . $qtd;
    
    if (!empty($custom_post))
    {
    	if ($args_query_post == '')
    		$args_query_post = $args_query_post . "post_type=" . $custom_post;
    	else 
    		$args_query_post = $args_query_post . "&post_type=" . $custom_post;
    }
    query_posts($args_query_post);
	
	$txtreturn .= "<div class='publicacoes'>";
	$txtreturn .= "<h3>".$titulo."</h3>";
	$txtreturn .= "<ul class='thumbnails'>";
    
	if (have_posts()) : 
		while (have_posts()) : the_post(); 
			//echo "<li><a href='".get_permalink()."'>".get_the_title()."</a><br>" . get_the_excerpt(). "</li>";
			$txtreturn .= "<li class='span".$colunas."'>";
			$txtreturn .= "<div class='thumbnail'>";
			$txtreturn .= "<h4>".get_the_title()."</h4>";
			$txtreturn .= get_the_content();
			$txtreturn .= "</div>";
			$txtreturn .= "</li>";
		endwhile;
	endif; 
	wp_reset_query();

	$txtreturn .= "</ul>";
	$txtreturn .= "</div>";

	echo $txtreturn;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("OqueListaWidget");') );


class OqueWidget extends WP_Widget
{
	function OqueWidget()
	{
		$widget_ops = array('classname' => 'OqueWidget', 'description' => 'O que é? Gabinete Digital. Documento unico O que é?' );
		$this->WP_Widget('OqueWidget', 'Gabinete Digital - O que é?', $widget_ops);
	}

	function form($instance)
	{
		$instance = wp_parse_args( (array) $instance, array( 'titulo' => '', 'post_id' => '', 'colunas' => '3', 'css_class' => '' ) );
		$titulo = $instance['titulo'];
		$post_id = $instance['post_id'];
		$colunas = $instance['colunas'];		
		$css_class = $instance['css_class'];

		?>
  		<p><label for="<?php echo $this->get_field_id('titulo'); ?>">Titulo: <input class="widefat" id="<?php echo $this->get_field_id('titulo'); ?>" name="<?php echo $this->get_field_name('titulo'); ?>" type="text" value="<?php echo attribute_escape($titulo); ?>" /></label></p>
  		<p><label for="<?php echo $this->get_field_id('post_id'); ?>">ID: <input class="widefat" id="<?php echo $this->get_field_id('post_id'); ?>" name="<?php echo $this->get_field_name('post_id'); ?>" type="text" value="<?php echo attribute_escape($post_id); ?>" /></label></p>
  		<p><label for="<?php echo $this->get_field_id('colunas'); ?>">Colunas: <input class="widefat" id="<?php echo $this->get_field_id('colunas'); ?>" name="<?php echo $this->get_field_name('colunas'); ?>" type="text" value="<?php echo attribute_escape($colunas); ?>" /></label></p>
  		<p><label for="<?php echo $this->get_field_id('css_class'); ?>">Classe CSS: <input class="widefat" id="<?php echo $this->get_field_id('css_class'); ?>" name="<?php echo $this->get_field_name('css_class'); ?>" type="text" value="<?php echo attribute_escape($css_class); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['titulo'] = $new_instance['titulo'];
    $instance['post_id'] = $new_instance['post_id'];
    $instance['colunas'] = $new_instance['colunas'];
    $instance['css_class'] = $new_instance['css_class'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    $args_query_post = '';
    
    $titulo = empty($instance['titulo']) ? ' ' : apply_filters('widget_titulo', $instance['titulo']);
    $post_id = $instance['post_id'];
    $colunas = $instance['colunas'];
    $custom_post = 'oquegd_oque';
 
    echo "<li class='span".$instance['colunas']."'><div class='thumbnail oque_lista ".$instance['css_class']."'>";
    
    echo $before_title . $titulo . $after_title;;
	        
    if (!empty($post_id))
    	$args_query_post = $args_query_post . "p=" . $post_id;
    
    if (!empty($custom_post))
    {
    	if ($args_query_post == '')
    		$args_query_post = $args_query_post . "post_type=" . $custom_post;
    	else 
    		$args_query_post = $args_query_post . "&post_type=" . $custom_post;
    }

    query_posts($args_query_post);
	if (have_posts()) : 
		echo "<ul>";
		while (have_posts()) : the_post(); 
			echo "<li><a href='".get_permalink()."'>".get_the_title()."</a><br>" . get_the_excerpt(). "</li>";
	 		
		endwhile;
		echo "</ul>";
	endif; 
	wp_reset_query();
 
	echo "</div></li>";
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("OqueWidget");') );


?>