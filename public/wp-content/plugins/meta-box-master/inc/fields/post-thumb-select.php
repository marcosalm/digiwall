<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RWMB_Post_Thumb_Select_Field' ) )
{
	class RWMB_Post_Thumb_Select_Field extends RWMB_Image_Select_Field
	{
		/**
		 * Enqueue scripts and styles
		 *
		 * @return void
		 */
		static function admin_enqueue_scripts()
		{
			wp_enqueue_style( 'rwmb-image-select', RWMB_CSS_URL . 'image-select.css', array(), RWMB_VER );
			wp_enqueue_script( 'rwmb-image-select', RWMB_JS_URL . 'image-select.js', array( 'jquery' ), RWMB_VER, true );
		}

		/**
		 * Get field HTML
		 *
		 * @param mixed  $meta
		 * @param array  $field
		 *
		 * @return string
		 */
		static function html( $meta, $field )
		{
			$html = array();
			$tpl = '<label class="rwmb-image-select" ><img src="%s" />
		
		<input type="%s" class="hidden" name="%s"  value="%s"%s></label>';
			$script = '';
			$meta = (array) $meta;
	
			$args = array(
				'posts_per_page'   => -1,
				'offset'           => 0,
				'orderby'          => 'post_date',
				'order'            => 'DESC',
				'post_type'        => $field['post_type'],
				'post_status'      => 'publish',
				'suppress_filters' => true ); 
		$posts_array = get_posts( $args );
		
		foreach ($posts_array as $post){
		
		$img_url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
		$value = $post->ID;
		$html[] = sprintf(
					$tpl,
					
					$img_url,
					$field['multiple'] ? 'checkbox' : 'radio',
					$field['field_name'],
					
					$value,
					checked( in_array( $value, $meta ), true, false )
				);
		
		}
	
			
			return implode( ' ', $html );
		}

		/**
		 * Normalize parameters for field
		 *
		 * @param array $field
		 *
		 * @return array
		 */
		static function normalize_field( $field )
		{
			$field['field_name'] .= $field['multiple'] ? '[]' : '';
			return $field;
		}
	}
}
/* 

	<script>
	
	$("#%s").change(function () {
			if ($(this).attr("checked")) {
				// checked
				$(\'.slide_order\').append(\'<div id="bla">BLABLA</div>\');
				
				return;
			}
			// not checked
			
			$(\'#bla\').remove();
		});
		</script>
	
 */
 
 
 