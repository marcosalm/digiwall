<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Digital Wall
 */
 
 /*
 * Template Name: FUll slider
 */

get_header(); 
/* if( !is_user_logged_in())
{
  header('Location: http://10.1.1.60/digiwall/wp-login.php');
exit;
 
} */
?>


		<div class="royalSlider">
		<?php
		date_default_timezone_set("America/Sao_Paulo");
		$pageid = get_the_ID();
		$posts_slider = get_post_meta($pageid, 'slide_ponto');
					$slides=array();
				foreach($posts_slider as $post) {
					$n_start = 'start_slide-'.$post;
					$n_end = 'end_slide-'.$post;
					 
					$start = get_post_meta($pageid,$n_start);
					$end = get_post_meta($pageid,$n_end);
					$telas = get_post_meta($post,'telas_slide');
					if (strtotime($start[0]) <= strtotime(date("H:m")) && strtotime($end[0]) >= strtotime(date("H:m"))) {
					$slides[]=array('id'=>$post,'start' => strtotime($start[0]), 'end' =>strtotime($end[0]), 'telas' => $telas);
					}
				}
				
					if (empty($slides)){
						$post_slider = get_post_meta($pageid,'slide_default');
						$slider_id = $post_slider[0];
						$telas = get_post_meta($slider_id,'telas_slide');
						$slides = array(array('id'=>$slider_id, 'telas' => $telas));
						
						}
				
						
					foreach ($slides as $slide){
					$sort = get_post_meta( $slide['id'], 'tela_slide_sort');	
								$fields_sort = explode('&',$sort[0]);		
									$order=array();
								 foreach ($fields_sort as $order_f){
										$tela_ordem = explode('=',$order_f);
									
										$order_array = explode('-',$tela_ordem[0]);
										
										$order[] = $order_array[2];
										}
											
										$telas = $slide['telas'];
										
									$result = array_intersect($order, $telas);
												
											
										
												
							foreach ($result as $tela){
							
										$layout = get_post_meta( $tela, 'layout');
									$id= $slide['id'];
									$delay_array= get_post_meta($id,'delay-'.$tela);
									$delay = $delay_array[0];
							
						switch ($layout[0]){
						
						case 'layout_1':
						$img_full = get_post_meta( $tela, 'full_image');
				echo '<div class="rsContent" data-rsDelay="'.$delay*1000 .'">
						<!-- TELAS MODELO 2 COLUNAS -->
						<div class="telas telas-modelo">
							
							<img src="'.wp_get_attachment_url($img_full[0]).'" alt="">
							
						 </div>
						  </div>';				
					break;
				  case 'layout_2':
				  $left = get_post_meta( $tela, 'half_left');
				  $right = get_post_meta( $tela, 'half_right');
				 
				  echo '<div class="rsContent" data-rsDelay="'.$delay*1000 .'">
				  <!-- Modelo Split vertical - Direita -->
				  <div class="telas telas-modelo telas-modelo-dois-split">
					<div class="telas telas-media telas-media-dois-direita">
					  <img src="'.wp_get_attachment_url($left[0]).'" alt="">
					</div>
					<div class="telas telas-media telas-media-dois-direita">
					  <img src="'.wp_get_attachment_url($right[0]).'" alt="">
					  
					</div>  
				  </div>
				  
				  </div>
					 ';
						break;
				  case 'layout_3':
				  $left = get_post_meta( $tela, 'split-right_left');
				  $right_up = get_post_meta( $tela, 'split-right_upper');
				  $right_down = get_post_meta( $tela, 'split-right_down');
				  echo '<div class="rsContent" data-rsDelay="'.$delay*1000 .'">
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
				  </div>
					 ';
					 
					break;
				  case 'layout_4':
				   $right = get_post_meta( $tela, 'split-left_right');
				   $left_up = get_post_meta( $tela, 'split-left_upper');
				   $left_down = get_post_meta( $tela, 'split-left_down');
				  echo '<div class="rsContent" data-rsDelay="'.$delay*1000 .'">
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
					</div>';
					break;
				  case 'layout_5':
				   $right = get_post_meta( $tela, 'tree_right');
				   $middle = get_post_meta( $tela, 'tree_middle');
				   $left = get_post_meta( $tela, 'tree_left');
				   
					 echo '	  <div class="rsContent" data-rsDelay="'.$delay*1000 .'">
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
				  </div>';
				  
					break;
					
				  case 'layout_6':
				  $attach_id = get_post_meta( $postid, 'video');  
				  $video = wp_get_attachment_url($attach_id[0]);
				  echo do_shortcode('[videojs mp4="'.$video.'"]');
				break;
		
				  case 'layout_7':
				  $title = get_post_meta( $tela, 'title');
				  $subtitle = get_post_meta( $tela, 'subtitle');
				  $bgcolor = get_post_meta( $tela, 'bgcolor');
				  $content = get_post_meta( $tela, 'content_html');
				  
				  echo '<div class="rsContent" data-rsDelay="'.$delay*1000 .'"><div class="telas telas-media" style="background: '.$bgcolor[0].';">
				  <h1 >'.$title[0].'</h1>
															<h3 >'.$subtitle[0].'</h3>
															<div class="content">'.$content[0].'</div>
															</div>
															</div>
				  ';
				  
				  
				   break;
				   
					}
							
							
							
							}
					
					
					
					
					}
				
					
					
						
					
			 
  ?>
  
  </div>


<?php get_footer(); ?>