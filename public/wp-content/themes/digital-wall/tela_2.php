<?php
/**
 * Registering meta boxes
 */


add_filter( 'rwmb_meta_boxes', 'digital_tela_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function digital_tela_register_meta_boxes( $meta_boxes )
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
		'id' => 'standard_2',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Monte seu layout', 'rwmb' ),

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
				'name' => __( 'Upload da Imagem', 'rwmb' ),
				'id'   => "{$prefix}thickbox",
				'type' => 'thickbox_image',
				
			),
			array(
				'name'             => __( 'Upload de 3 Imagens', 'rwmb' ),
				'id'               => "{$prefix}imgadv",
				'type'             => 'image_advanced',
				'max_file_uploads' => 3,
			),
			
				array(
				'name' => __( 'Upload de Vídeo', 'rwmb' ),
				'id'   => "{$prefix}file_advanced",
				'type' => 'file_advanced',
				'max_file_uploads' => 4,
				'mime_type' => 'application,audio,video', // Leave blank for all file types
			),
			
				array(
				'name' => __( 'Conteúdo HTML', 'rwmb' ),
				'id'   => "{$prefix}wysiwyg",
				'type' => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw'  => false,
				'std'  => __( '', 'rwmb' ),

				// Editor settings, see wp_editor() function: look4wp.com/wp_editor
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => false,
					'media_buttons' => true,
				),
				
			),
			array(
				'name' => __( 'Cor BackGround', 'rwmb' ),
				'id'   => "{$prefix}color",
				'type' => 'color',
			),
		)
	);
		return $meta_boxes;
}


