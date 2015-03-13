<?php


define("SYSTEM_INSTANCE",'http://localhost/digiwall');


/**
 * Digital Wall functions and definitions
 *
 * @package Digital Wall
 */

/**
 * Set the content width based on the theme's design and stylesheet.
*/
if ( ! isset( $content_width ) ) {
	$content_width = 1080; 
}
 
if ( ! function_exists( 'digital_wall_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function digital_wall_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Digital Wall, use a find and replace
	 * to change 'digital-wall' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'digital-wall', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'digital-wall' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'digital_wall_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );
}
endif; // digital_wall_setup
add_action( 'after_setup_theme', 'digital_wall_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function digital_wall_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'digital-wall' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'digital_wall_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function digital_wall_scripts() {
	wp_enqueue_style( 'digital-wall-style', get_stylesheet_uri() );

	wp_enqueue_script( 'digital-wall-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'digital-wall-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'digital_wall_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Register Custom Post Type
function custom_post_type_tela() {
	
	$labels = array(
		'name'                => _x( 'Telas', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Tela', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Telas', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'Todos Items', 'text_domain' ),
		'view_item'           => __( 'Ver Item', 'text_domain' ),
		'add_new_item'        => __( 'Adicionar Novo Item', 'text_domain' ),
		'add_new'             => __( 'Adicionar Novo', 'text_domain' ),
		'edit_item'           => __( 'Editar Item', 'text_domain' ),
		'update_item'         => __( 'Atualizar Item', 'text_domain' ),
		'search_items'        => __( 'Pesquizar Item', 'text_domain' ),
		'not_found'           => __( 'Não encontrado', 'text_domain' ),
		'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'tela', 'text_domain' ),
		'description'         => __( 'Telas de exibição', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title','thumbnail'),
		'taxonomies'          => array(  ),
		'hierarchical'        => false,
		'public' => true,
        'show_ui' => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'ly_queryable'  => true,
		'capability_type'     => 'post',
		
	);
	register_post_type( 'tela', $args );
flush_rewrite_rules();
}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type_tela', 0 );

add_action('init', 'type_post_slide');
 
	function type_post_slide() { 
		$labels = array(
			'name' => _x('Slides', 'post type general name'),
			'singular_name' => _x('Slide', 'post type singular name'),
			'add_new' => _x('Adicionar Novo', 'Novo item'),
			'add_new_item' => __('Novo Item'),
			'edit_item' => __('Editar Item'),
			'new_item' => __('Novo Item'),
			'view_item' => __('Ver Item'),
			'search_items' => __('Procurar Itens'),
			'not_found' =>  __('Nenhum registro encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Slides'
		);
 
		$args = array(
			'labels' => $labels,
			'public' => true,
			'public_queryable' => true,
			'show_ui' => true,			
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_position' => 6,
			'supports' => array('title','thumbnail')
          );
 
register_post_type( 'slide' , $args );
flush_rewrite_rules();
}


add_action( 'admin_menu', function(){
    add_object_page(
        'Telas Customizadas',
        'Telas Customizadas',
        'edit_post',
        'telas',
        function(){
		
		$html = '
		<div class="wrap">
<h2>Telas<a href="' . SYSTEM_INSTANCE .'/wp-admin/post-new.php?post_type=tela" class="add-new-h2">Adicionar Novo</a></h2>';


$customPostTaxonomies = get_object_taxonomies('tela');

if(count($customPostTaxonomies) > 0)
{
     foreach($customPostTaxonomies as $tax)
     {
	     $args = array(
         	  'orderby' => 'name',
	          'show_count' => 0,
        	  'pad_counts' => 0,
	          'hierarchical' => 1,
        	  'taxonomy' => $tax,
        	  
        	);

	     wp_dropdown_categories( $args );
     }
}

$args = array('post_type' => 'tela', 'posts_per_page' => 20);
$postsTela = get_posts($args);

$html .='<ul class="telas-listagem">';
foreach ($postsTela as $myPost){
$html .= '
    <li>
      <a href="post.php?post='. $myPost->ID . '&action=edit">'. get_the_post_thumbnail($myPost->ID, array(100,100), array('alt' => $myPost->post_title)) .'<h2>' . $myPost->post_title . '</h2></a>
      <a href="post.php?post='. $myPost->ID .'&action=trash" title="Excluir Tela">Excluir</a>
    </li> 
';
}

$html .= '</ul>
	<div class="tablenav bottom">

		<div class="alignleft actions bulkactions">
			<select name="action2">
<option value="-1" selected="selected">Ações em massa</option>
	<option value="edit" class="hide-if-no-js">Editar</option>
	<option value="trash">Mover para a lixeira</option>
</select>
<input type="submit" name="" id="doaction2" class="button action" value="Aplicar">
		</div>
		<div class="alignleft actions">
		</div>
<div class="tablenav-pages one-page"><span class="displaying-num">4 itens</span>
<span class="pagination-links"><a class="first-page disabled" title="Ir para a primeira página" href="' . SYSTEM_INSTANCE .'/wp-admin/edit.php?post_type=tela">«</a>
<a class="prev-page disabled" title="Ir para a página anterior" href="' . SYSTEM_INSTANCE .'/wp-admin/edit.php?post_type=tela&amp;paged=1">‹</a>
<span class="paging-input">1 de <span class="total-pages">1</span></span>
<a class="next-page disabled" title="Ir para a próxima página" href="' . SYSTEM_INSTANCE .'/wp-admin/edit.php?post_type=tela&amp;paged=1">›</a>
<a class="last-page disabled" title="Ir para a última página" href="' . SYSTEM_INSTANCE .'/wp-admin/edit.php?post_type=tela&amp;paged=1">»</a></span></div>
		<br class="clear">
	</div>

</form>


	<form method="get" action=""><table style="display: none"><tbody id="inlineedit">
		
		<tr id="inline-edit" class="inline-edit-row inline-edit-row-post inline-edit-tela quick-edit-row quick-edit-row-post inline-edit-tela" style="display: none"><td colspan="5" class="colspanchange">

		<fieldset class="inline-edit-col-left"><div class="inline-edit-col">
			<h4>Edição rápida</h4>
	
			<label>
				<span class="title">Título</span>
				<span class="input-text-wrap"><input type="text" name="post_title" class="ptitle" value=""></span>
			</label>

			<label>
				<span class="title">Slug</span>
				<span class="input-text-wrap"><input type="text" name="post_name" value=""></span>
			</label>

	
				<label><span class="title">Data</span></label>
			<div class="inline-edit-date">
				<div class="timestamp-wrap"><select name="mm">
			<option value="01">01-jan</option>
			<option value="02">02-fev</option>
			<option value="03">03-mar</option>
			<option value="04">04-abr</option>
			<option value="05" selected="selected">05-mai</option>
			<option value="06">06-jun</option>
			<option value="07">07-jul</option>
			<option value="08">08-ago</option>
			<option value="09">09-set</option>
			<option value="10">10-out</option>
			<option value="11">11-nov</option>
			<option value="12">12-dez</option>
</select> <input type="text" name="jj" value="16" size="2" maxlength="2" autocomplete="off">, <input type="text" name="aa" value="2014" size="4" maxlength="4" autocomplete="off"> às <input type="text" name="hh" value="16" size="2" maxlength="2" autocomplete="off">: <input type="text" name="mn" value="25" size="2" maxlength="2" autocomplete="off"></div><input type="hidden" id="ss" name="ss" value="58">			</div>
			<br class="clear">
	
			<div class="inline-edit-group">
				<label class="alignleft">
					<span class="title">Senha</span>
					<span class="input-text-wrap"><input type="text" name="post_password" class="inline-edit-password-input" value=""></span>
				</label>

				<em style="margin:5px 10px 0 0" class="alignleft">
					–OU–				</em>
				<label class="alignleft inline-edit-private">
					<input type="checkbox" name="keep_private" value="private">
					<span class="checkbox-title">Privado</span>
				</label>
			</div>

	
		</div></fieldset>

	
		<fieldset class="inline-edit-col-center inline-edit-categories"><div class="inline-edit-col">

	
			<span class="title inline-edit-categories-label">Categorias</span>
			<input type="hidden" name="post_category[]" value="0">
			<ul class="cat-checklist category-checklist">
				
<li id="category-1" class="popular-category"><label class="selectit"><input value="1" type="checkbox" name="post_category[]" id="in-category-1"> Sem categoria</label></li>
			</ul>

	
		</div></fieldset>

	
		<fieldset class="inline-edit-col-right"><div class="inline-edit-col">

	
	
						<label class="inline-edit-tags">
				<span class="title">Tags</span>
				<textarea cols="22" rows="1" name="tax_input[post_tag]" class="tax_input_post_tag"></textarea>
			</label>
		
	
	
	
			<div class="inline-edit-group">
				<label class="inline-edit-status alignleft">
					<span class="title">Status</span>
					<select name="_status">
												<option value="publish">Publicado</option>
						<option value="future">Agendado</option>
												<option value="pending">Revisão pendente</option>
						<option value="draft">Rascunho</option>
					</select>
				</label>

	
			</div>

	
		</div></fieldset>

			<p class="submit inline-edit-save">
			<a accesskey="c" href="#inline-edit" class="button-secondary cancel alignleft">Cancelar</a>
			<input type="hidden" id="_inline_edit" name="_inline_edit" value="81dd3616fc">				<a accesskey="s" href="#inline-edit" class="button-primary save alignright">Atualizar</a>
				<span class="spinner"></span>
						<input type="hidden" name="post_view" value="list">
			<input type="hidden" name="screen" value="edit-tela">
							<input type="hidden" name="post_author" value="">
						<span class="error" style="display:none"></span>
			<br class="clear">
		</p>
		</td></tr>
	
		<tr id="bulk-edit" class="inline-edit-row inline-edit-row-post inline-edit-tela bulk-edit-row bulk-edit-row-post bulk-edit-tela" style="display: none"><td colspan="5" class="colspanchange">

		<fieldset class="inline-edit-col-left"><div class="inline-edit-col">
			<h4>Edição em massa</h4>
				<div id="bulk-title-div">
				<div id="bulk-titles"></div>
			</div>

	
	
		</div></fieldset><fieldset class="inline-edit-col-center inline-edit-categories"><div class="inline-edit-col">

	
			<span class="title inline-edit-categories-label">Categorias</span>
			<input type="hidden" name="post_category[]" value="0">
			<ul class="cat-checklist category-checklist">
				
<li id="category-1" class="popular-category"><label class="selectit"><input value="1" type="checkbox" name="post_category[]" id="in-category-1"> Sem categoria</label></li>
			</ul>

	
		</div></fieldset>

	
		<fieldset class="inline-edit-col-right"><label class="inline-edit-tags">
				<span class="title">Tags</span>
				<textarea cols="22" rows="1" name="tax_input[post_tag]" class="tax_input_post_tag"></textarea>
			</label><div class="inline-edit-col">

	
	
	
			<div class="inline-edit-group">
				<label class="inline-edit-status alignleft">
					<span class="title">Status</span>
					<select name="_status">
							<option value="-1">— Nenhuma mudança —</option>
												<option value="publish">Publicado</option>
						
							<option value="private">Privado</option>
												<option value="pending">Revisão pendente</option>
						<option value="draft">Rascunho</option>
					</select>
				</label>

	
			</div>

	
		</div></fieldset>

			<p class="submit inline-edit-save">
			<a accesskey="c" href="#inline-edit" class="button-secondary cancel alignleft">Cancelar</a>
			<input type="submit" name="bulk_edit" id="bulk_edit" class="button button-primary alignright" value="Atualizar" accesskey="s">			<input type="hidden" name="post_view" value="list">
			<input type="hidden" name="screen" value="edit-tela">
						<span class="error" style="display:none"></span>
			<br class="clear">
		</p>
		</td></tr>
			</tbody></table></form>

<div id="ajax-response"></div>
<br class="clear">
</div>';
		
		
		
		
            echo $html; // list post type items here
        }
    );
});

//#######################	
//
// 	HIDE EDITOR WYSIWYG
// 
//***********************

add_action('init', 'hide_editor'); function hide_editor() { remove_post_type_support( 'tela', 'editor' ); } 
add_action('init', 'hide_editor1'); function hide_editor1() { remove_post_type_support( 'page', 'editor' ); } 
add_action('init', 'hide_editor2'); function hide_editor2() { remove_post_type_support( 'slide', 'editor' ); } 

//#######################	
//
// 	CUSTOM COLUMN IN SLIDES
// 
//***********************

// Add to admin_init function


add_filter('manage_edit-slide_columns', 'add_new_slide_columns');
function add_new_slide_columns($gallery_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';
    
    $new_columns['title'] = _x('Slide Name', 'column name');
    $new_columns['telas'] = __('Telas');
         
    $new_columns['date'] = _x('Date', 'column name');
 
    return $new_columns;
}
    // Add to admin_init function
add_action('manage_slide_posts_custom_column', 'manage_tela_columns', 10, 2);
 
function manage_tela_columns($column_name, $id) {
    global $wpdb;
    switch ($column_name) {
     case 'telas':
        // Get number of images in gallery
		$urls = get_post_meta( $id,'telas_slide',false);
		
		foreach($urls as $post){
		$ids[] = $post;
		}
		$x=count($ids);
		$loop = ($x>3)? 3: $x; 
		for ($i=0;$i<$loop;$i++){
		$img_url[] = get_the_post_thumbnail($ids[$i], array(100,100) );
		}
        $num_images = implode(' ',$img_url);
        print_r( $num_images); 
        break;
    default:
        break;
    } // end switch
}   
 
 
//#######################	
//
// 	CUSTOM TELA IN SLIDES
// 
//***********************

// Add to admin_init function


add_filter('manage_edit-tela_columns', 'add_new_tela_columns');
function add_new_tela_columns($gallery_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';
    
    $new_columns['title'] = _x('Tela', 'column name');
    $new_columns['telas'] = __('Telas');
    $new_columns['date'] = _x('Date', 'column name');
 
    return $new_columns;
}
    // Add to admin_init function
add_action('manage_tela_posts_custom_column', 'manage_thumbs_columns', 10, 2);
 
function manage_thumbs_columns($column_name, $id) {
    global $wpdb;
    switch ($column_name) {
     case 'telas':
        // Get number of images in gallery
		$img_url = get_the_post_thumbnail($id, array(100,100) );
	      print_r( $img_url); 
        break;
    default:
        break;
    } // end switch
}   
 

 
//#######################	
//
// 	CUSTOM PONTO IN SLIDES
// 
//***********************

// Add to admin_init function


add_filter('manage_edit-page_columns', 'add_new_page_columns');
function add_new_page_columns($gallery_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';
    
    $new_columns['title'] = _x('Ponto', 'column name');
   
    $new_columns['date'] = _x('Date', 'column name');
 
    return $new_columns;
}
    // Add to admin_init function

 
//#######################	
//
// EXECUTE PHP IN WIDGETS
// 
//***********************
function php_execute($html){
if(strpos($html,"<"."?php")!==false){ ob_start(); eval("?".">".$html);
$html=ob_get_contents();
ob_end_clean();
}
return $html;
}
add_filter('widget_text','php_execute',100);
add_filter('get_the_content','php_execute',100);


 
//***********************
// 
// CUSTOM LOGIN LOGO
// 
//***********************
	function my_custom_login_logo() {
	    echo '<style type="text/css">
	        h1 a { background-image:url('.get_bloginfo('template_url').'/img/digitalwall-logo.png) !important; }
	    </style>';
	}

	add_action('login_head', 'my_custom_login_logo');


	// Disable the Admin Bar.
	add_filter( 'show_admin_bar', '__return_false' );
	
	function remove_admin_bar_links() {
		global $wp_admin_bar;
		// $wp_admin_bar->remove_menu('wp-logo');
		$wp_admin_bar->remove_menu('new-content');
		$wp_admin_bar->remove_menu('comments');
	}
	add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

	
	function remove_footer_admin () {
	echo '<p>Tecnologia <a href="http://www.phidelis.com.br/">Phidelis</a></p>';
	
	}
	add_filter('admin_footer_text', 'remove_footer_admin');
	
  

function attachment_id_from_url( $attachment_url = '' ) {
 
	global $wpdb;
	$attachment_id = false;
 
	// If there is no url, return.
	if ( '' == $attachment_url )
		return;
 
	// Get the upload directory paths
	$upload_dir_paths = wp_upload_dir();
 
	// Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
	if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
 
		// If this is the URL of an auto-generated thumbnail, get the URL of the original image
		$attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
 
		// Remove the upload path base directory from the attachment URL
		$attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );
 
		// Finally, run a custom database query to get the attachment ID from the modified attachment URL
		$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
 
	}
 
	return $attachment_id;
}


add_action('admin_head', 'custom_stuffs');

function custom_stuffs() {

$args = array( 'posts_per_page' => -1, 'post_type'=> 'slide');
	$posts_array = get_posts( $args );
	
	foreach ($posts_array as $post){
	
		$html_O .='  if ($(this).is(\':checked\') && $(this).val() == '.$post->ID.') {
		  $(\'#slide-'.$post->ID.'\').fadeIn("slow");
		  
		} else if (!$(this).is(\':checked\') && $(this).val() == '.$post->ID.'){$(\'#slide-'.$post->ID.'\').fadeOut("slow");}
		';

	}

$args = array( 'posts_per_page' => -1, 'post_type'=> 'tela');
	$posts_a = get_posts( $args );
	
	foreach ($posts_a as $posts){
	
		$html_O .='  if ($(this).is(\':checked\') && $(this).val() == '.$posts->ID.') {
		  $(\'#tela-delay-'.$posts->ID.'\').fadeIn("slow");
		  
		} else if (!$(this).is(\':checked\') && $(this).val() == '.$posts->ID.'){$(\'#tela-delay-'.$posts->ID.'\').fadeOut("slow");}
		';

	}

echo '<link rel="stylesheet" id="tela_layout-css" href="'.get_template_directory_uri().'/estilo.css" type="text/css" media="all">';
echo '<link rel="stylesheet" id="tela_layout-css" href="'.get_template_directory_uri().'/js/jquery.timepicker.css" type="text/css" media="all">';
echo ' <script type="text/javascript" src="'.get_template_directory_uri().'/js/jquery.timepicker.js"></script>';
echo ' <script type="text/javascript" src="'.get_template_directory_uri().'/js/jquery.datepair.min.js"></script>';

$html = "<script>
			(function($) {
				$(document).ready(function(){
				
				$('.rwmb-image-select').children('img').siblings('.hidden').change(function() { ".$html_O." });
				
				
					$('input:radio[name=\"layout\"]').change( function(){
							if ($(this).is(':checked') && $(this).val() == 'layout_1') {
								// append goes here
								$('#layout_1').css('display', 'block');
								$('#layout_2').css('display', 'none');
								$('#layout_3').css('display', 'none');
								$('#layout_4').css('display', 'none');
								$('#layout_5').css('display', 'none');
								$('#layout_6').css('display', 'none');
								$('#layout_7').css('display', 'none');
							} else
							if ($(this).is(':checked') && $(this).val() == 'layout_2') {
								// append goes here
								$('#layout_2').css('display', 'block');
								$('#layout_1').css('display', 'none');
								$('#layout_3').css('display', 'none');
								$('#layout_4').css('display', 'none');
								$('#layout_5').css('display', 'none');
								$('#layout_6').css('display', 'none');
								$('#layout_7').css('display', 'none');
							} else
							if ($(this).is(':checked') && $(this).val() == 'layout_3') {
								// append goes here
								$('#layout_3').css('display', 'block');
								$('#layout_2').css('display', 'none');
								$('#layout_1').css('display', 'none');
								$('#layout_4').css('display', 'none');
								$('#layout_5').css('display', 'none');
								$('#layout_6').css('display', 'none');
								$('#layout_7').css('display', 'none');
							} else
							if ($(this).is(':checked') && $(this).val() == 'layout_4') {
								// append goes here
								$('#layout_4').css('display', 'block');
								$('#layout_2').css('display', 'none');
								$('#layout_3').css('display', 'none');
								$('#layout_1').css('display', 'none');
								$('#layout_5').css('display', 'none');
								$('#layout_6').css('display', 'none');
								$('#layout_7').css('display', 'none');
							} else
							if ($(this).is(':checked') && $(this).val() == 'layout_5') {
								// append goes here
								$('#layout_5').css('display', 'block');
								$('#layout_2').css('display', 'none');
								$('#layout_3').css('display', 'none');
								$('#layout_4').css('display', 'none');
								$('#layout_1').css('display', 'none');
								$('#layout_6').css('display', 'none');
								$('#layout_7').css('display', 'none');
							} else
							if ($(this).is(':checked') && $(this).val() == 'layout_6') {
								// append goes here
								$('#layout_6').css('display', 'block');
								$('#layout_2').css('display', 'none');
								$('#layout_3').css('display', 'none');
								$('#layout_4').css('display', 'none');
								$('#layout_5').css('display', 'none');
								$('#layout_1').css('display', 'none');
								$('#layout_7').css('display', 'none');
							} else
							if ($(this).is(':checked') && $(this).val() == 'layout_7') {
								// append goes here
								$('#layout_7').css('display', 'block');
								$('#layout_2').css('display', 'none');
								$('#layout_3').css('display', 'none');
								$('#layout_4').css('display', 'none');
								$('#layout_5').css('display', 'none');
								$('#layout_6').css('display', 'none');
								$('#layout_1').css('display', 'none');
							}  
							
					});
					$('#wp-admin-bar-wp-logo').html(\"<img src='".get_template_directory_uri()."/img/digitalwall-logo-admin.png' style='max-height:35px; width:auto; margin-left:25px;' />\");
					$('#wp-admin-bar-site-name').hide();
					
					
					
	 });
})(jQuery);
</script>
	<style>
	
		.timeline-ponto {
			border-top:1px solid #DDD;
			padding-top:10px;
			float:left;
			width:100%;
			overflow-x:scroll;
			white-space: nowrap;
		}
		.ponto-item {
			list-style: none;
			display: inline-block;
			text-align: center;
			padding:10px 15px;
			border:1px solid #DDD;
			border-radius: 6px;
			border-left-width: 5px;
			border-right-width: 5px;
		}
		.ponto-item img {
			margin-top:30px;
		}
		.ponto-item label,.ponto-item img  {
			float:left;
		}
	</style>

";

echo $html;



}


add_action('load-index.php', 'dashboard_Redirect');
function dashboard_Redirect(){
wp_redirect(admin_url('edit.php?post_type=page'));
}

function remove_dashboard_widgets() {
	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

add_filter( 'contextual_help', 'mytheme_remove_help_tabs', 999, 3 );
function mytheme_remove_help_tabs($old_help, $screen_id, $screen){
    $screen->remove_help_tabs();
    return $old_help;
}

add_filter('screen_options_show_screen', '__return_false');

function clt_expiration_filter($seconds, $user_id, $remember) {
  $expire_in = 0;

  /* "remember me" is checked */
  if ( $remember ) {
    $expire_in = intval(get_option('clt_remember_me_auth_timeout'));
    if ( $expire_in <= 0 ) { $expire_in = 1209600; }
  } else {
    $expire_in = intval(get_option('clt_normal_auth_timeout'));
    if ( $expire_in <= 0 ) { $expire_in = 172800; }
  }
  //  echo "<!-- setting expire_in to $expire_in -->\n";
  //  update_option('clt_debug', "setting expire_in to $expire_in for user $user_id, remember=$remember");

  // check for Year 2038 problem - http://en.wikipedia.org/wiki/Year_2038_problem
  if ( PHP_INT_MAX - time() < $expire_in ) {
    $expire_in =  PHP_INT_MAX - time() - 5;
  }
  //  update_option('clt_debug', "fixed time = ". (time()+$expire_in) . "; maxint = " . PHP_INT_MAX);

  return $expire_in;
}


/* add_filter(hook, function, priority, num args accepted) */
/* http://codex.wordpress.org/Plugin_API#Hook_in_your_Filter */
add_filter('auth_cookie_expiration', 'clt_expiration_filter', 100, 3);



// create custom plugin settings menu
add_action('admin_menu', 'clt_create_menu');

function clt_create_menu() {

  // create new menu item under Users
  add_users_page('Configure Login Timeout', 'Login Timeout', 
		      'administrator', 'timeouts', 
		      'clt_settings_page');

  //call register settings function
  add_action( 'admin_init', 'clt_register_settings' );
}


function clt_register_settings() {
  // register our settings
  register_setting( 'clt-settings-group', 'clt_normal_auth_timeout', 'intval' );
  register_setting( 'clt-settings-group', 'clt_normal_num');
  register_setting( 'clt-settings-group', 'clt_normal_unit');
  register_setting( 'clt-settings-group', 'clt_remember_me_auth_timeout', 'intval' );
  register_setting( 'clt-settings-group', 'clt_remember_me_num');
  register_setting( 'clt-settings-group', 'clt_remember_me_unit');

}

function clt_activate() {
  // add options with default values (same as wordpress defaults)
  add_option('clt_normal_auth_timeout', 17280000); // 48 hrs/2 days
  add_option('clt_normal_num', 2);
  add_option('clt_normal_unit', 'days');

  add_option('clt_remember_me_auth_timeout', 120960000); // 2 weeks
  add_option('clt_remember_me_num', 2);
  add_option('clt_remember_me_unit', 'weeks');

}

function clt_deactivate() {
  // remove options
  $opts = array('clt_normal_auth_timeout', 
		'clt_normal_num', 
		'clt_normal_unit', 
		'clt_remember_me_auth_timeout',
		'clt_remember_me_num',
		'clt_remember_me_unit',
		'clt_debug'
		);

  foreach ($opts as $o) {
    delete_option($o);
  }
}


register_activation_hook( __FILE__, 'clt_activate' );
register_deactivation_hook( __FILE__, 'clt_deactivate' );


/* 

   The (real) seconds field is a hidden field on this form.  It's what
   actually affects the auth timeout.

   The number (short textbox) and unit (selectbox): (years, months,
   days, hours) fields update the real seconds field with javascript.

   We save the values of all the fields for future visits to this conf
   page.

  */

function clt_settings_page() {
?>
<div class="wrap">
<h2>Configure Login Timeout Settings</h2>

<script>
    /* a little bit oldschool for the IE6 and NN3 crowd */
  function clt_calc(num_field, unit_field, hidden_field) {
    var newval = 0;
    var unit = unit_field.options[unit_field.selectedIndex].text;
    //    alert("num/unit/hidden values= " + num_field.value + "/" + unit + "/" + hidden_field.value);
    if (num_field.value && unit) {
      switch (unit) {
	case 'years':
	  newval = num_field.value * 365.25*24*60*60;
	  break;
	case 'months':
	  newval = num_field.value * 30*24*60*60; /* meh, close enough */
	  break;
	case 'weeks':
	  newval = num_field.value * 7*24*60*60;
	  break;
	case 'days':
	  newval = num_field.value * 24*60*60;
	  break;
	case 'hours':
	  newval = num_field.value * 60*60;
	  break;
	default:
	  alert("weird value '"+unit_field.value+"' for unit field?!?");
	  newval = num_field.value;
      }
    }
    //        alert("setting hidden field value to " + Math.round(newval));
    hidden_field.value = Math.round(newval);
    return true;
  }
</script>

<form method="post" action="options.php">
    <?php settings_fields( 'clt-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row"><label for="clt_normal_num">Normal Authentication Timeout<br />

	  <span class="description">Default 2 days.  The user's session will end before this time if the browser quits.</span></label> 
<!-- ' -->
</th>
        <td>
<input type="text" name="clt_normal_num" size="3" value="<?php echo get_option('clt_normal_num'); ?>" onChange="clt_calc(this, this.form.clt_normal_unit, this.form.clt_normal_auth_timeout)" />

<select name="clt_normal_unit" onChange="clt_calc(this.form.clt_normal_num, this, this.form.clt_normal_auth_timeout);">
<?php 

$units = explode(" ", "years months weeks days hours");

foreach ($units as $u) :

?>
<option<?php echo get_option('clt_normal_unit') == $u ? " selected" : ""  ?>><?php echo $u  ?></option>
<?php endforeach;  ?>
</select>

<input type="hidden" name="clt_normal_auth_timeout" value="<?php echo get_option('clt_normal_auth_timeout'); ?>" />
</td>
        </tr>
         
        <tr valign="top">
        <th scope="row"><label for="clt_remember_me_num">"Remember Me" Authentication Timeout<br />

<span class="description">Default 2 weeks.  The user's session will persist through browser restarts.</span></label></th>
<!-- ' -->
        <td>
<input type="text" name="clt_remember_me_num" size="3" value="<?php echo get_option('clt_remember_me_num'); ?>" onChange="clt_calc(this, this.form.clt_remember_me_unit, this.form.clt_remember_me_auth_timeout)" />

<select name="clt_remember_me_unit" onChange="clt_calc(this.form.clt_remember_me_num, this, this.form.clt_remember_me_auth_timeout);">
<?php foreach ($units as $u) : ?>
<option<?php echo get_option('clt_remember_me_unit') == $u ? " selected" : ""  ?>><?php echo $u  ?></option>
<?php endforeach;  ?>
</select>

<input type="hidden" name="clt_remember_me_auth_timeout" value="<?php echo get_option('clt_remember_me_auth_timeout'); ?>" />

</td>
        </tr>
        
    </table>

    <h3>Note:</h3>
<p>
    On 32-bit systems, the <a href="http://en.wikipedia.org/wiki/Year_2038_problem">maximum date possible</a> for authentication expiration is <strong>2038-01-19 04:14:07 GMT</strong>.  If you set the expiration date longer than that, the Configure Login Timeout plugin will set the timeout to slightly before that date at each login.
</p>

    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>
</div>
<?php 


// Função que chama o CSS de customização do wp-admin
add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    #wpadminbar {
		background:#32A1D1!important;
	}

	.wrap{margin: 50px 20px 0 2px !important;}
	h1 a { width:335px !important; height:196px !important; background-size:335px 196px !important; background:url("'.get_bloginfo('template_directory').'/img/phidelis-logo.jpg") no-repeat !important; }


	#adminmenuback {
		background:#3d4651!important;
	}
	
  </style>';
}

}


//##################
//
//SLIDE
//
//##################


$args = array( 'posts_per_page' => -1, 'post_type'=> 'tela');
	$posts_array = get_posts( $args );
	$field_tela =array();
	if (isset($posts_array) && !empty($posts_array)){
	foreach ($posts_array as $posts){
	$field_tela[] = array(
			'name' => 'delay-'.$posts->ID,
			'desc' => 'Enter something here',
			'id' => 'delay-'.$posts->ID,
			'type' => 'text',
			'std' => 'Default value 1',
			'post'=> $posts->ID,
		);
	
	}
	}

$meta_box_slide = array(
	'id' => 'slide-box',
	'title' => 'Informe o período de exibição',
	'page' => 'slide',
	'context' => 'normal',
	'priority' => 'low',
	'fields' => $field_tela
);

add_action('admin_menu', 'slide_add_box');

// Add meta box
function slide_add_box() {
	global $meta_box_slide;
	
	add_meta_box($meta_box_slide['id'], $meta_box_slide['title'], 'slide_show_box', $meta_box_slide['page'], $meta_box_slide['context'], $meta_box_slide['priority']);
}

// Callback function to show fields in meta box
function slide_show_box() {
	global $meta_box_slide, $post;

	wp_nonce_field( 'slide_meta_box', 'slide_meta_box_nonce' );
	$sort = get_post_meta( $post->ID, 'tela_slide_sort');	
	$html = '<div class="conteudo_Timeline">
 
 	<script>
	jQuery(document).ready(function($){
    $(\'#sortable\').sortable({
        update: function() {
            var stringDiv = "";
            $("#sortable").children().each(function(i) {
                var li = $(this);
                stringDiv += " "+li.attr("id") + \'=\' + i + \'&\';
            });
		$("#sort_tela").val(stringDiv);
        
        }
    }); 
    $( "#sortable" ).disableSelection();    
});
</script>
<input type="hidden" id="sort_tela" name="tela_slide_sort" value="'.$sort[0].'">
			<ul class="timeline" id="sortable" >
			';
				$fields_sort = explode('&',$sort[0]);
		
		$slides = explode('=',$fields_sort[1]);
		$order = explode('-',$slides[0]);
		
		if(isset($order[2]) && !empty($order[2])){
		
	// sort_tela=0& tela-delay-3361=1& tela-delay-3355=2& tela-delay-3343=3& tela-delay-269=4& tela-delay-282=5& tela-delay-133=6&
		$fields_sort = explode('&',$sort[0]);
			foreach ($fields_sort as $order_f){
				$telas = explode('=',$order_f);
				$order = explode('-',$telas[0]);
					if(isset($order[2]) && !empty($order[2])){
					
						$value = get_post_meta( $post->ID, 'delay-'.$order[2]);
						
						var_dump($value);
						$html .='<li id="tela-delay-'.$order[2].'" >';
						
						$html .= get_the_post_thumbnail($order[2], 'thumbnail');
						
						$html .='<p><input type="text" name="delay-'.$order[2].'" id="delay-'.$order[2].'" class="delay" value="' . $value[0]. '" placeholder="Tempo em segundos"></p>';
						
						$html .='</li>';
						
				}
			}
		} else {
		
		foreach ($meta_box_slide['fields'] as $field) {
			
			$value = get_post_meta( $post->ID, $field['id']);

			$html .='<li id="tela-'.$field['id'].'" >';
			
			$html .= get_the_post_thumbnail($field['post'], 'thumbnail');
			
			$html .='<p><input type="text" name="'.$field['id'].'" id="'.$field['id'].'" class="delay" value="' . $value[0]. '" placeholder="Tempo em segundos"></p>';
			
			$html .='</li>';
		
		}
		}
					
		$html .=	'</ul>

		<br class="clear">
		</div>';

	echo $html;
	

	
}

add_action('save_post', 'slide_save_data');

// Save data from meta box
function slide_save_data($post_id) {
$posttype = get_post_type($post_id);
		if ($posttype !== "slide"){
		return;
		}
	global $meta_box_slide;
	
	if ( ! isset( $_POST['slide_meta_box_nonce'] ) )
			return $post_id;

		$nonce = $_POST['slide_meta_box_nonce'];

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, 'slide_meta_box' ) )
			return $post_id;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'slide' === $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	
	$my_data_sort = sanitize_text_field( $_POST['tela_slide_sort']);
	
	update_post_meta( $post_id,'tela_slide_sort', $my_data_sort);

	foreach ($meta_box_slide['fields'] as $campo) {
		
	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST[$campo['id']]);
	
	// Update the meta field in the database.
	update_post_meta( $post_id, $campo['id'], $my_data );
	
	}
	$tela_thumb = get_post_meta($post_id, 'telas_slide');
	
	
	$attach_id = get_post_thumbnail_id($tela_thumb[0]);
	update_post_meta( $post_id, '_thumbnail_id', $attach_id ); 	
	
	
}

//##################
//
//PONTOS
//
//##################


$args = array( 'posts_per_page' => -1, 'post_type'=> 'slide');
	$posts_ar = get_posts( $args );
	
	foreach ($posts_ar as $posts){
	$field_slide[] = array(
			'name' => 'slide-'.$posts->ID,
			'desc' => 'Enter something here',
			'start' => 'start_slide-'.$posts->ID,
			'end' => 'end_slide-'.$posts->ID,
			'id' => 'slide-'.$posts->ID,
			'type' => 'text',
			'std' => 'Default value 1',
			'post'=>$posts->ID,
		);
	
	}

$meta_box = array(
	'id' => 'ponto-box',
	'title' => 'Informe o período de exibição',
	'page' => 'page',
	'context' => 'normal',
	'priority' => 'low',
	'fields' => $field_slide
);

add_action('admin_menu', 'ponto_add_box');

// Add meta box
function ponto_add_box() {
	global $meta_box;
	
	add_meta_box($meta_box['id'], $meta_box['title'], 'ponto_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}

// Callback function to show fields in meta box
function ponto_show_box() {
	global $meta_box, $post;

	wp_nonce_field( 'ponto_meta_box', 'ponto_meta_box_nonce' );
		$sort = get_post_meta( $post->ID, 'sort_slide');			
	$html = '<div class="conteudo_Timeline">
	<script>
	jQuery(document).ready(function($){
    $(\'#sortable\').sortable({
        update: function() {
            var stringDiv = "";
            $("#sortable").children().each(function(i) {
                var li = $(this);
                stringDiv += " "+li.attr("id") + \'=\' + i + \'&\';
            });
		$("#sort_slide").val(stringDiv);
        
        }
    }); 
    $( "#sortable" ).disableSelection();    
});
</script>
		
		<input type="hidden" id="sort_slide" name="sort_slide" value="'.$sort[0].'">
			<ul class="timeline-ponto" id="sortable" >';
		
	// sort_tela=0& tela-delay-3361=1& tela-delay-3355=2& tela-delay-3343=3& tela-delay-269=4& tela-delay-282=5& tela-delay-133=6&
		$fields_sort = explode('&',$sort[0]);
		
		$slides = explode('=',$fields_sort[1]);
		$order = explode('-',$slides[0]);
		
		if(isset($order[1]) && !empty($order[1])){
		
			foreach ($fields_sort as $order_f){
				$slides = explode('=',$order_f);
				$order = explode('-',$slides[0]);
					
					if(isset($order[1]) && !empty($order[1])){
					
						$start = get_post_meta( $post->ID, 'start_slide-'.$order[1]);
						$end = get_post_meta( $post->ID, 'end_slide-'.$order[1]);
						$val_s = '';
						$val_e = '';
						if ($start) {
						$val_s ="value='".$start[0]."'";
						
						}
						if ($end) {
						
						$val_e ="value='".$end[0]."'";
						}
						
						
						$html .='<li id="slide-'.$order[1].'" class="ponto-item">';
						$html .='<script>jQuery(document).ready(function($) {$("#timeOnly-'.$order[1].' .time").timepicker({ \'timeFormat\': \'H:i\',\'showDuration\': true });$("#timeOnly-'.$order[1].'").datepair(); });</script>';
						
						$html .='<div id="timeOnly-'.$order[1].'">';

						$html .='<label for="">
									<p>Início</p>
									<input type="text" name="start_slide-'.$order[1].'"  class="time start"  '.$val_s.' placeholder="Inicio">
								</label>';
							$html .= get_the_post_thumbnail($order[1], array(100,100));
							
						$html .='	<label for="">
									<p>Fim</p>
									<input type="text" name="end_slide-'.$order[1].'"  class="time end" '.$val_e.' placeholder="fim">
								</label>
						';
						$html .='</div>';

						
						$html .='</li>';
							
							
					}
			
			}
		
		} else {
		
	
	foreach ($meta_box['fields'] as $field) {
	
	$start = get_post_meta( $post->ID, $field['start']);
	$end = get_post_meta( $post->ID, $field['end']);
	
	
	
	$html .='<li id="'.$field['id'].'" class="ponto-item">';
	$html .='<script>jQuery(document).ready(function($) {$("#timeOnly-'.$field['post'].' .time").timepicker({ \'timeFormat\': \'H:i\',\'showDuration\': true });$("#timeOnly-'.$field['post'].'").datepair(); });</script>';
	
	$html .='<div id="timeOnly-'.$field['post'].'">';
	$html .='<label for="">
				<p>Início</p>
				<input type="'.$field['type'].'" name="'.$field['start'].'" id="'.$field['id'].'-1" class="time start" value="' . $start[0]. '" placeholder="Inicio">
			</label>';
		$html .= get_the_post_thumbnail($field['post'], array(100,100));
		
	$html .='	<label for="">
				<p>Fim</p>
				<input type="'.$field['type'].'" name="'.$field['end'].'" id="'.$field['id'].'-2" class="time end" value="' . $end[0]. '" placeholder="fim">
			</label>
	';
	$html .='</div>';

	
	$html .='</li>';
		
		}
		}
					
		$html .=	'</ul>

		<br class="clear">
		</div>';

	echo $html;
	

	
}

add_action('save_post', 'ponto_save_data');

// Save data from meta box
function ponto_save_data($post_id) {
$posttype = get_post_type($post_id);
		if ($posttype !== "page"){
		return;
		}
	global $meta_box;
	
	if ( ! isset( $_POST['ponto_meta_box_nonce'] ) )
			return $post_id;

		$nonce = $_POST['ponto_meta_box_nonce'];

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, 'ponto_meta_box' ) )
			return $post_id;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	


	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}
		
	$my_data_sort = sanitize_text_field( $_POST['sort_slide']);
	
	update_post_meta( $post_id,'sort_slide', $my_data_sort);	
		
	foreach ($meta_box['fields'] as $field) {
	
		// Sanitize user input.
	$my_start = sanitize_text_field( $_POST[$field['start']] );
	
	// Update the meta field in the database.
	update_post_meta( $post_id, $field['start'], $my_start );
	
		// Sanitize user input.
	$my_end = sanitize_text_field( $_POST[$field['end']] );
	
	// Update the meta field in the database.
	update_post_meta( $post_id, $field['end'], $my_end );
	}
		
	
}


function my_scripts_method() {
  
   wp_enqueue_script('jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js', array('jquery'), '1.8.16');

 }
  add_action('wp_enqueue_scripts', 'my_scripts_method');
  
  
 
class OS_Disable_WordPress_Updates {
	
	/**
	 * The OS_Disable_WordPress_Updates class constructor
	 * initializing required stuff for the plugin
	 *
	 */
	function __construct() {
		add_action('admin_init', array(&$this, 'admin_init'));
		
		
		/*
		 * Disable Theme Updates
		 * 2.8 to 3.0
		 */
		add_filter( 'pre_transient_update_themes', array($this, 'last_checked_now') );
		/*
		 * 3.0
		 */
		add_filter( 'pre_site_transient_update_themes', array($this, 'last_checked_now') );
		
		
		/*
		 * Disable Plugin Updates
		 * 2.8 to 3.0
		 */
		add_action( 'pre_transient_update_plugins', array(&$this, 'last_checked_now') );
		/*
		 * 3.0
		 */
		add_filter( 'pre_site_transient_update_plugins', array($this, 'last_checked_now') );
		
		
		/*
		 * Disable Core Updates
		 * 2.8 to 3.0
		 */
		add_filter( 'pre_transient_update_core', array($this, 'last_checked_now') );
		/*
		 * 3.0
		 */
		add_filter( 'pre_site_transient_update_core', array($this, 'last_checked_now') );
		

		/*
		 * Disable All Automatic Updates
		 * 3.7+
		 *
		 */
		add_filter( 'auto_update_translation', '__return_false' );
		add_filter( 'automatic_updater_disabled', '__return_true' );
		add_filter( 'allow_minor_auto_core_updates', '__return_false' );
		add_filter( 'allow_major_auto_core_updates', '__return_false' );
		add_filter( 'allow_dev_auto_core_updates', '__return_false' );
		add_filter( 'auto_update_core', '__return_false' );
		add_filter( 'wp_auto_update_core', '__return_false' );
		add_filter( 'auto_core_update_send_email', '__return_false' );
		add_filter( 'send_core_update_notification_email', '__return_false' );
		add_filter( 'auto_update_plugin', '__return_false' );
		add_filter( 'auto_update_theme', '__return_false' );
		add_filter( 'automatic_updates_send_debug_email', '__return_false' );
		add_filter( 'automatic_updates_is_vcs_checkout', '__return_true' );
	}
	

	/**
	 * The OS_Disable_WordPress_Updates class constructor
	 * initializing required stuff for the plugin
	 *
	 * PHP 4 Compatible Constructor
	 */
	function OS_Disable_WordPress_Updates() {
		$this->__construct();
	}
	
	
	/**
	 * Initialize and load the plugin stuff
	 *
	 */
	function admin_init() {
		if ( !function_exists("remove_action") ) return;
	
		/*
		 * Disable Theme Updates
		 * 2.8 to 3.0
		 */
		remove_action( 'load-themes.php', 'wp_update_themes' );
		remove_action( 'load-update.php', 'wp_update_themes' );
		remove_action( 'admin_init', '_maybe_update_themes' );
		remove_action( 'wp_update_themes', 'wp_update_themes' );
		wp_clear_scheduled_hook( 'wp_update_themes' );
		
		/*
		 * 3.0
		 */
		remove_action( 'load-update-core.php', 'wp_update_themes' );
		wp_clear_scheduled_hook( 'wp_update_themes' );
		
		
		/*
		 * Disable Plugin Updates
		 * 2.8 to 3.0
		 */
		remove_action( 'load-plugins.php', 'wp_update_plugins' );
		remove_action( 'load-update.php', 'wp_update_plugins' );
		remove_action( 'admin_init', '_maybe_update_plugins' );
		remove_action( 'wp_update_plugins', 'wp_update_plugins' );
		wp_clear_scheduled_hook( 'wp_update_plugins' );
		
		/*
		 * 3.0
		 */
		remove_action( 'load-update-core.php', 'wp_update_plugins' );
		wp_clear_scheduled_hook( 'wp_update_plugins' );
		
		
		/*
		 * Disable Core Updates
		 * 2.8 to 3.0
		 */
		remove_action( 'wp_version_check', 'wp_version_check' );
		remove_action( 'admin_init', '_maybe_update_core' );
		wp_clear_scheduled_hook( 'wp_version_check' );
		
		
		/*
		 * 3.0
		 */
		wp_clear_scheduled_hook( 'wp_version_check' );
		
		
		/*
		 * 3.7+
		 */
		remove_action( 'wp_maybe_auto_update', 'wp_maybe_auto_update' );
		remove_action( 'admin_init', 'wp_maybe_auto_update' );
		remove_action( 'admin_init', 'wp_auto_update_core' );
		wp_clear_scheduled_hook( 'wp_maybe_auto_update' );
	}
	



	/**
	 * Get version check info
	 *
	 */
	public function last_checked_now( $transient ) {
		include ABSPATH . WPINC . '/version.php';
		$current = new stdClass;
		$current->updates = array();
		$current->version_checked = $wp_version;
		$current->last_checked = time();
		
		return $current;
	}
}

if ( class_exists('OS_Disable_WordPress_Updates') ) {
	$OS_Disable_WordPress_Updates = new OS_Disable_WordPress_Updates();
}



function hide_publishing_actions(){
     
            echo '
                <style type="text/css">
                    #misc-publishing-actions,
                    #minor-publishing-actions{
                        display:none;
                    }
                </style>
            ';
        	echo "banks";
}
add_action('admin_head-post.php', 'hide_publishing_actions');
add_action('admin_head-post-new.php', 'hide_publishing_actions');

	
	function post_Thumb($post_id){
		$posttype = get_post_type($post_id);
		if ($posttype != "tela"){
		return;
		}
				$name = "thumb-".$post_id.".jpg";
				$url_post = get_permalink( $post_id ); 
				$result = shell_exec('C:/inetpub/wwwroot/digiwall/phantom/phantomjs C:/inetpub/wwwroot/digiwall/phantom/rasterize.js '.$url_post.' C:/inetpub/wwwroot/digiwall/phantom/thumbs/'.$name);
					// Make post thumb
					
					$image_url = 'C:/inetpub/wwwroot/digiwall/phantom/thumbs/'.$name;
					if (file_exists($image_url)){
					$upload_dir = wp_upload_dir();
				
					$image_data = file_get_contents($image_url);
					$filename = basename($image_url);
					
					delete_post_thumbnail( $post_id );
					wp_delete_attachment($attach_id,true);
					if(wp_mkdir_p($upload_dir['path'])){
						$file = $upload_dir['path'] . '/' . $filename;
					}else{
						$file = $upload_dir['basedir'] . '/' . $filename;}
					if($file){
					file_put_contents($file, $image_data);
					//unlink('C:/wamp/www/DigiWall/public/phantom/thumbs/'.$thumb);
					}

							$wp_filetype = wp_check_filetype($filename, null );
					
							$attachment = array(
								'post_mime_type' => $wp_filetype['type'],
								'post_title' => sanitize_file_name($filename),
								'post_content' => '',
								'post_status' => 'inherit'
							);
					
							$attach_id = wp_insert_attachment( $attachment, $file, $post_id );
							$attach_data = wp_generate_attachment_metadata( $attach_id, $file );
							wp_update_attachment_metadata( $attach_id, $attach_data );

							update_post_meta( $post_id, '_thumbnail_id', $attach_id ); 	
				}
	}
	
		
	add_action("save_post","post_Thumb",13,1);
	
include 'tela_layout.php';	




function change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['page']->labels;
        $labels->name = 'Pontos';
        $labels->singular_name = 'Ponto';
        $labels->add_new = 'Adicionar Pontos';
        $labels->add_new_item = 'Adicionar Ponto';
        $labels->edit_item = 'Editar Ponto';
        $labels->new_item = 'Ponto';
        $labels->view_item = 'Veja Ponto';
        $labels->search_items = 'Pesquisar por Pontos';
        $labels->not_found = 'Nenhum Ponto encontrado';
        $labels->not_found_in_trash = 'Nenhum ponto na licheira';
    }
    add_action( 'init', 'change_post_object_label' );
	
	function hide_slug_box() {
    global $post;
    global $pagenow;
    if (is_admin() && $pagenow=='post-new.php' OR $pagenow=='post.php') {
        echo "<script type='text/javascript'>
            jQuery(document).ready(function($) {
                jQuery('#edit-slug-box').hide();
            });
            </script>
        ";
    }
}
add_action( 'admin_head', 'hide_slug_box'  );

function remove_page_fields() {
 remove_meta_box( 'commentstatusdiv' , 'page' , 'normal' ); //removes comments status
 remove_meta_box( 'commentsdiv' , 'page' , 'normal' ); //removes comments
 remove_meta_box( 'authordiv' , 'page' , 'normal' ); //removes author 
 remove_meta_box( 'revisionsdiv' , 'page' , 'normal' ); //removes author 
}
add_action( 'admin_menu' , 'remove_page_fields' );

function remove_quick_edit( $actions ) {
unset($actions['inline hide-if-no-js']);
return $actions;
}
add_filter('page_row_actions','remove_quick_edit',10,1);
add_filter('post_row_actions','remove_quick_edit',10,1);
   
	