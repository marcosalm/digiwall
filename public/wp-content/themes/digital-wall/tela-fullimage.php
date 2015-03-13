<?php
/**
 * Registering meta boxes
 */


add_filter( 'rwmb_meta_boxes', 'tela_1_register_meta_boxes' );

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
	$prefix = 'tela_1_';

	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'standard',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'IMagem Tela Cheia', 'rwmb' ),

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
				'name' => __( 'Thickbox Image Upload', 'rwmb' ),
				'id'   => "{$prefix}thickbox",
				'type' => 'thickbox_image',
			),
				

				
			
		)
	);

		return $meta_boxes;
}


