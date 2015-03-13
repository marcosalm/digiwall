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

get_header(); ?>


		<div class="royalSlider">
		<?php
		$pageid = get_the_ID();
		$posts_slider = get_post_meta($pageid, 'slide_ponto');
					
				      foreach($posts_slider as $post) {
					  $n_start = 'start_slide-'.$post;
					  $n_end = 'end_slide-'.$post;
					 
					  $start = get_post_meta($pageid,$n_start);
					  $end = get_post_meta($pageid,$n_end);
					  
					 
					 $telas = get_post_meta($post,'telas_slide');
					  
					   						
							foreach ($telas as $tela){
							
							 
							 
									// display a sub field value
									$tela_ex = $tela['tela_a_ser_exibida']->ID;
									$delay = $tela['tempo_de_exibição'];
									
									$layout = get_field('layout', $tela_ex);
									
									switch ($layout) {
									case 1:
									echo ' <div class="rsContent" data-rsDelay="'.$delay*1000 .'"><img src="'.get_field('imagem', $tela_ex).'" alt=""></div>';
									
									break;
									
									case 2:
									echo 	'<div class="rsContent" data-rsDelay="'.$delay*1000 .'">
												<div class="telas telas-media telas-media-dois-esquerda">',
													'<img src="'.get_field('imagem_1', $tela_ex).'" alt="">',
												'</div>',
												'<div class="telas telas-media telas-media-dois-direita">',
												  '<div class="telas telas-media telas-media-vertical-cima">',
													'<img src="'.get_field('imagem_2', $tela_ex).'" alt="">',
												  '</div>',
												  '<div class="telas telas-media telas-media-vertical-baixo">',
													 '<img src="'.get_field('imagem_3', $tela_ex).'" alt="">',
												'</div>',
											'</div></div>';
									
									break;
									
									case 3:
									
									echo '<div class="rsContent" data-rsDelay="'.$delay*1000 .'"><script>
						var elem = document.getElementById("full_video");
								if (elem.requestFullscreen) {
							  elem.requestFullscreen();
							} else if (elem.mozRequestFullScreen) {
							  elem.mozRequestFullScreen();
							} else if (elem.webkitRequestFullscreen) {
							  elem.webkitRequestFullscreen();
							}
						</script>',
						'<video id="full_video">',
							  '<source src="'.get_field('upload_video', $tela_ex).'" type=\'video/mp4; codecs="avc1.42E01E, mp4a.40.2"\' />',
							  '<source src="'.get_field('upload_video_webm', $tela_ex).'" type=\'video/webm; codecs="vp8, vorbis"\' />',
							'</video></div>';
									
									break;
									
									case 4:
									echo 	'<div class="rsContent" data-rsDelay="'.$delay*1000 .'" >
													<div class="telas telas-media" style="background: url('.get_field('imagem_de_fundo', $tela_ex).') '.get_field('cor_de_fundo', $tela_ex).';">
												<h1 style="color:'.get_field('cor_do_titulo', $tela_ex).'">'.get_field('titulo', $tela_ex).'</h1>
												<h3 style="color:'.get_field('cor_subtitulo', $tela_ex).'">'.get_field('subtitulo', $tela_ex).'</h3>
												<div class="content" style="color:'.get_field('cor_do_text_no_conteudo', $tela_ex).'">'.get_field('conteudo', $tela_ex).'</p>
												
											</div>
											</div>';
									
									break;
									
									}
							}
									
						}	 
							
			 
  ?>
  
  </div>


<?php get_footer(); ?>