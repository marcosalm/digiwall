<?php
/**
 * Registering meta boxes
 */
 
add_filter( 'rwmb_meta_boxes', 'layout_tela_register_meta_boxes' );


/**
 * Register meta boxes
 *
 * @return void
 */
function layout_tela_register_meta_boxes( $meta_boxes )
{
	/**
	 * Prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'digital_ponto_';

	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'layout',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Escolha seu layout', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'tela' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(

			array(
				'id'       => 'layout',
				'name'     => '',
				'type'     => 'image_select',

				// Array of 'value' => 'Image Source' pairs
				'options'  => array(
					'layout_1' 	 => get_template_directory_uri().'/img/img-full.png',
					'layout_2'	 => get_template_directory_uri().'/img/split-half.png',
					'layout_3' 	 => get_template_directory_uri().'/img/split-dois-vert-direita.png',
					'layout_4' 	 => get_template_directory_uri().'/img/split-dois-vert-esquerda.png',
					'layout_5' 	 => get_template_directory_uri().'/img/split-tres.png',
					'layout_6'	 => get_template_directory_uri().'/img/video.png',
					'layout_7'	 => get_template_directory_uri().'/img/html.png',
				)
			),
		)
	);
	
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'layout_1',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Imagem em Tela Cheia ', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'tela' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				'name'             => '',
				'id'               => "full_image",
				'type'             => 'plupload_image',
				'max_file_uploads' => 1,
			),
		),
	);
	
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'layout_2',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Tela dividida em dois ', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'tela' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				'name'             => '',
				'id'               => "half_left",
				'type'             => 'plupload_image',
				'max_file_uploads' => 1,
			),
			array(
				'name'             => '',
				'id'               => "half_right",
				'type'             => 'plupload_image',
				'max_file_uploads' => 1,
			),
		),
	);
	
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'layout_3',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Tela dividida em dois, split na direita ', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'tela' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				'name'             => '',
				'id'               => "split-right_left",
				'type'             => 'plupload_image',
				'max_file_uploads' => 1,
			),
		
			array(
				'name'             => '',
				'id'               => "split-right_upper",
				'type'             => 'plupload_image',
				'max_file_uploads' => 1,
			),
			array(
				'name'             => '',
				'id'               => "split-right_down",
				'type'             => 'plupload_image',
				'max_file_uploads' => 1,
			),
				
		),
	);
	
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'layout_4',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Tela dividida em dois, split na esquerda ', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'tela' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
		array(
				'name'             => '',
				'id'               => "split-left_upper",
				'type'             => 'plupload_image',
				'max_file_uploads' => 1,
			),
			array(
				'name'             => '',
				'id'               => "split-left_down",
				'type'             => 'plupload_image',
				'max_file_uploads' => 1,
			),
			array(
				'name'             => '',
				'id'               => "split-left_right",
				'type'             => 'plupload_image',
				'max_file_uploads' => 1,
			),
			
		),
	);
	
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'layout_5',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Tela dividida em três ', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'tela' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				'name'             => '',
				'id'               => "tree_left",
				'type'             => 'plupload_image',
				'max_file_uploads' => 1,
			),
			array(
				'name'             => '',
				'id'               => "tree_middle",
				'type'             => 'plupload_image',
				'max_file_uploads' => 1,
			),
			array(
				'name'             => '',
				'id'               => "tree_right",
				'type'             => 'plupload_image',
				'max_file_uploads' => 1,
			),
		),
	);
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'layout_6',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Video Full Screen ', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'tela' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			array(
				'name' => __( 'File Upload', 'rwmb' ),
				'id'   => "video",
				'type' => 'file',
			),
		),
	);
	
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'layout_7',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Conteúdo HTML ', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'tela' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
		array(
				// Field name - Will be used as label
				'name'  => __( 'Título', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "title",
				// Field description (optional)
				'desc'  => __( 'Text description', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( 'Default text value', 'rwmb' ),
			
			),
			array(
				// Field name - Will be used as label
				'name'  => __( 'Subtítulo', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "subtitle",
				// Field description (optional)
				'desc'  => __( 'Text description', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( 'Default text value', 'rwmb' ),
				
			),
			array(
				'name' => __( 'Cor do Background', 'rwmb' ),
				'id'   => "bgcolor",
				'type' => 'color',
			),
			array(
				'name' => __( 'WYSIWYG / Rich Text Editor', 'rwmb' ),
				'id'   => "content_html",
				'type' => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw'  => false,
				'std'  => __( 'WYSIWYG default value', 'rwmb' ),

				// Editor settings, see wp_editor() function: look4wp.com/wp_editor
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => false,
					'media_buttons' => true,
				),
			),
		)
	); 

function fill_keys($keyArray, $valueArray) {
    if(is_array($keyArray)) {
        foreach($keyArray as $key => $value) {
            $filledArray[$value] = $valueArray[$key];
        }
    }
    return $filledArray;
}

	$args = array( 'posts_per_page' => -1, 'post_type'=> 'tela');
	$posts_array = get_posts( $args );
	if (isset($posts_array) && !empty($posts_array)){
	foreach ($posts_array as $post){
		$id[] = $post->ID;
		$attach = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID));
		$url[]= $attach[0];
	}

	$option = fill_keys($id,$url);

	
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'telas_slide',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Escolha as telas do Seu Slide', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'slide' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(

			array(
				'id'       => 'telas_slide',
				'name'     => 'telas_slide',
				'type'     => 'image_select',
				'class'	   => '',
				// Array of 'value' => 'Image Source' pairs
				'options'  => $option,
				'multiple' => true,
			),
			array(
				'type' => 'divider',
				'id'   => 'div_test', // Not used, but needed
			),
		)
	);
}

	$pontoargs = array( 'posts_per_page' => -1, 'post_type'=> 'slide');
	$ponto_posts_array = get_posts( $pontoargs );

	foreach ($ponto_posts_array as $ponto_post){
		$ponto_id[] = $ponto_post->ID;
		$ponto_attach = wp_get_attachment_image_src( get_post_thumbnail_id($ponto_post->ID));
		$ponto_url[]= $ponto_attach[0];
	}
		
		
	$ponto_option = fill_keys($ponto_id,$ponto_url);

	
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'slide_ponto',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Escolha os slides do seu Ponto', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'page' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(

			array(
				'id'       => 'slide_ponto',
				'name'     => '',
				'type'     => 'image_select',

				// Array of 'value' => 'Image Source' pairs
				'options'  => $ponto_option,
				'multiple' => true,
			),
			array(
				'type' => 'divider',
				'id'   => 'div_test', // Not used, but needed
			),
		)
	);
	
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'slide_default',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Escolha o slides Padrão deste Ponto', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'page' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'core',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
				array(
				'name'    => 'asdasd',
				'id'      => "slide_default",
				'type'    => 'post',

				// Post type
				'post_type' => 'slide',
				// Field type, either 'select' or 'select_advanced' (default)
				'field_type' => 'select_advanced',
				// Query arguments (optional). No settings means get all published posts
				'query_args' => array(
					'post_status' => 'publish',
					'posts_per_page' => '-1',
				)
			)
			
		)
	);
	
	
	
		return $meta_boxes;
}


