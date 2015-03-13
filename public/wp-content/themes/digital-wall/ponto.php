<?php
/**
 * Registering meta boxes
 */


add_filter( 'rwmb_meta_boxes', 'digital_ponto_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function digital_ponto_register_meta_boxes( $meta_boxes )
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
		'id' => 'standard',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Escolha o Layout da Tela', 'rwmb' ),

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
				'name'     => __( 'Layout', 'rwmb' ),
				'type'     => 'image_select',

				// Array of 'value' => 'Image Source' pairs
				'options'  => array(
					'left'  => 'http://placehold.it/90x90&text=Left',
					'right' => 'http://placehold.it/90x90&text=Right',
					'none'  => 'http://placehold.it/90x90&text=None',
				),
				

				// Allow to select multiple values? Default is false
				// 'multiple' => true,
			),
			
			
		)
	);

		return $meta_boxes;
}


