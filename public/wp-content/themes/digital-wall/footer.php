<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Digital Wall
 */
?>

	</div><!-- #content -->


</div><!-- #page -->


<script>
jQuery(document).ready(function($) {
    $(".royalSlider").royalSlider({
    	// general options go gere
		imageScaleMode: 'fill',
		autoHeight: true,
		//autoScaleSlider: true,
    	fullscreen: {
    		// fullscreen options go gere
    		enabled: true,
    		nativeFS: true
    	},
		autoPlay: {
    		// autoplay options go gere
    		enabled: true,
    		pauseOnHover: false
    	}
    });  
});
</script>


</body>
</html>
