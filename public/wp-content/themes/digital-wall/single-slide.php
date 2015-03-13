<?php
/**
 * The Template for displaying all single telas.
 *
 * @package Digital Wall
 */

get_header(); ?>

	<div id="primary" class="content-area">


		<?php while ( have_posts() ) : the_post(); ?>

			<?php 
			$postid = get_the_ID();

			$layout = get_post_meta( $postid, 'layout');
				
			switch ($layout[0]){
			
			case 'layout_1':
			$img_full = get_post_meta( $postid, 'full_image');
	echo '
 <!-- TELAS MODELO 2 COLUNAS -->
	<div class="telas telas-modelo">
        
          <img src="'.wp_get_attachment_url($img_full[0]).'" alt="">
        
      </div>
	  ';
	
		break;
	  case 'layout_2':
	  $left = get_post_meta( $postid, 'half_left');
	  $right = get_post_meta( $postid, 'half_right');
	 
	  echo '
      <!-- Modelo Split vertical - Direita -->
      <div class="telas telas-modelo telas-modelo-dois-split">
        <div class="telas telas-media telas-media-dois-direita">
          <img src="'.wp_get_attachment_url($left[0]).'" alt="">
        </div>
        <div class="telas telas-media telas-media-dois-direita">
          <img src="'.wp_get_attachment_url($right[0]).'" alt="">
          
        </div>  
      </div>
	     ';
	  		break;
	  case 'layout_3':
	  $left = get_post_meta( $postid, 'split-right_left');
	  $right_up = get_post_meta( $postid, 'split-right_upper');
	  $right_down = get_post_meta( $postid, 'split-right_down');
	  echo '
      <!-- Modelo Split vertical - Direita -->
      <div class="telas telas-modelo telas-modelo-dois-split">
        <div class="telas telas-media telas-media-dois-direita">
          <div class="telas telas-media telas-media-vertical-cima">
           <img src="'.wp_get_attachment_url($right_up[0]).'" alt="">
          </div>
          <div class="telas telas-media telas-media-vertical-baixo">
            
			<img src="'.wp_get_attachment_url($right_down[0]).'" alt="">
          </div>
        </div>
        <div class="telas telas-media telas-media-dois-direita">
          <img src="'.wp_get_attachment_url($left[0]).'" alt="">
          
        </div>  
      </div>
	     ';
		 
		break;
	  case 'layout_4':
	   $right = get_post_meta( $postid, 'split-left_right');
	   $left_up = get_post_meta( $postid, 'split-left_upper');
	   $left_down = get_post_meta( $postid, 'split-left_down');
	  echo '
      <!-- Modelo Split vertical - Esquerda -->
      <div class="telas telas-modelo telas-modelo-dois-split">
        <div class="telas telas-media telas-media-dois-direita">
          <img src="'.wp_get_attachment_url($right[0]).'" alt="">
          </div>
        <div class="telas telas-media telas-media-dois-direita">
          <div class="telas telas-media telas-media-vertical-cima">
           <img src="'.wp_get_attachment_url($left_up[0]).'" alt="">
           </div>
          <div class="telas telas-media telas-media-vertical-baixo">
            <img src="'.wp_get_attachment_url($left_down[0]).'" alt="">
          </div>
        </div>  
      </div>
	    ';
		break;
	  case 'layout_5':
	   $right = get_post_meta( $postid, 'tree_right');
	   $middle = get_post_meta( $postid, 'tree_middle');
	   $left = get_post_meta( $postid, 'tree_left');
	   
	     echo '	  
      <!-- Telas modelo 3 colunas -->
      <div class="telas telas-modelo telas-modelo-split-tres">
        <div class="telas telas-media telas-media-tres">
          <img src="'.wp_get_attachment_url($right[0]).'" alt="">
        </div>  
        <div class="telas telas-media telas-media-tres">
          <img src="'.wp_get_attachment_url($middle[0]).'" alt="">
        </div>
        <div class="telas telas-media telas-media-tres">
          <img src="'.wp_get_attachment_url($left[0]).'" alt="">
        </div>  
      </div>
	  ';
	  
		break;
		
	  case 'layout_6':
	  $video = get_post_meta( $postid, 'video');
	  echo '<script type="text/javascript" src="//cdn.sublimevideo.net/js/nd56wog6.js"></script><video id="a240e92d" class="sublime" poster="https://cdn.sublimevideo.net/vpa/ms_800.jpg" width="640" height="360" title="Midnight Sun" data-uid="a240e92d" data-autoresize="fill" preload="none">
  <source src="https://cdn.sublimevideo.net/vpa/ms_360p.mp4" />
  <source src="https://cdn.sublimevideo.net/vpa/ms_720p.mp4" data-quality="hd" />
  <source src="https://cdn.sublimevideo.net/vpa/ms_360p.webm" />
  <source src="https://cdn.sublimevideo.net/vpa/ms_720p.webm" data-quality="hd" />
</video>';
		break;
		
	  case 'layout_7':
	  $title = get_post_meta( $postid, 'title');
	  $subtitle = get_post_meta( $postid, 'subtitle');
	  $bgcolor = get_post_meta( $postid, 'bgcolor');
	  $content = get_post_meta( $postid, 'content_html');
	  
	  echo '<div class="telas telas-media telas-media-html" style="background: '.$bgcolor[0].';">
	  <h1 >'.$title[0].'</h1>
												<h3 >'.$subtitle[0].'</h3>
												<div class="content">'.$content[0].'</div>
												</div>
	  ';
	  
	  
	   break;
	   
		}
		endwhile;
		// end of the loop. ?>

	
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>