 <?php
/**
 * Registering meta boxes
 */


add_filter( 'rwmb_meta_boxes', 'digital_slide_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
 
function digital_slide_register_meta_boxes( $meta_boxes )
{
	/**
	 * Prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'digital_ponto_';
	
		/* 
	
	$args = array( 'posts_per_page' => -1, 'post_type'=> 'tela');
	$posts_array = get_posts( $args );
	
	foreach ($posts_array as $post){
	$id_telas[] = $post->ID;
	$attach = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID));
	$url_telas[]= $attach[0];
		}
		
		function fill_keys($keyArray, $valueArray) {
    if(is_array($keyArray)) {
        foreach($keyArray as $key => $value) {
            $filledArray[$value] = $valueArray[$key];
        }
    }
    return $filledArray;
}



	$option = fill_keys($id_telas,$url_telas);
	
 */
	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'slide_time_tela',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Escolha as Telas', 'rwmb' ),

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
							
			
		
			
		) 
	);
	
	
		return $meta_boxes;
}
 