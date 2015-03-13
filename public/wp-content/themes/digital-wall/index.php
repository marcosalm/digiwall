<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Digital Wall
 */

get_header(); 
/* if( !is_user_logged_in())
{
  header('Location: http://10.1.1.60/digiwall/wp-login.php');
exit;
 
} */?>
	<style>
		h1 {
			text-align: center;
			font-size:25px;
			margin:30px 0px;
			color:#5C538D;
		}
	</style>
	<div id="primary" class="exibicao-front content-area">
	<h1>
		<img src="<?php bloginfo('template_url')?>/img/logo.png" alt="">
		<br>
		Escolha qual o ponto de exibição:
	</h1>
		<ul>
	<?php 
	$posts = get_posts('post_type=page');
	foreach ($posts as $page){
	$attach = wp_get_attachment_image_src( get_post_thumbnail_id($page->ID));
	$url =get_permalink($page->ID);
	$title = get_the_title($page->ID);
	
	echo "<li><a href='".$url."'><p>".$title."</p><?php the_post_thumbnail( 'category-thumb' ); ?></a></li>";
	}
	?>
</ul>
	
	</div><!-- #primary -->


<?php get_footer(); ?>
