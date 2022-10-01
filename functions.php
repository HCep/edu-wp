<?php

if ( ! function_exists( 'materialwp_setup' ) ) :

function materialwp_setup() {

	
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
	}


	load_theme_textdomain( 'materialwp', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	
	add_theme_support( 'title-tag' );

	function themename_custom_logo_setup() {
		$defaults = array(
			'height'               => 100,
			'width'                => 200,
			'flex-height'          => true,
			'flex-width'           => true,
			'header-text'          => array( 'site-title', 'site-description' ),
			'unlink-homepage-logo' => true, 
		);
	 
		add_theme_support( 'custom-logo', $defaults );
	}
	 themename_custom_logo_setup();

	add_theme_support( 'post-thumbnails' );

	
	register_nav_menus( array(
		'primary' => __( 'Primary Menu' ),
		'secondary' => __( 'Secondary Menu' ),
		
	) );


	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	
	add_theme_support( 'custom-background', apply_filters( 'materialwp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; 
add_action( 'after_setup_theme', 'materialwp_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function materialwp_widgets_init() {
	register_sidebar( array(
		'name'          =>  'Widgety stopki 1',
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		
	) );
	register_sidebar( array(
		'name'          => 'Widgety stopki 2',
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="footer-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => 'Widgety stopki 3',
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="footer-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'materialwp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function materialwp_scripts() {
	wp_enqueue_style( 'mwp-bootstrap-styles', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.0.0', 'all' );

	wp_enqueue_style( 'materialwp-style', get_stylesheet_uri() );

	wp_enqueue_style( 'hamburger', get_template_directory_uri() . '/css/hamburgers.css', array(), '', 'all' );

	wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.css', array(), '', 'all' );
	
	 wp_enqueue_script( 'mwp-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '5.0.0', 'all' );

	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom-script.js',  array(), '1.2.3', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'materialwp_scripts' );


require get_template_directory() . '/inc/template-tags.php';


require get_template_directory() . '/inc/extras.php';


require get_template_directory() . '/inc/jetpack.php';

require get_template_directory() . '/inc/bootstrap-walker.php';


require get_template_directory() . '/inc/comments-callback.php';

function cptui_register_objects() {

	$labels = [
		"name" => __( "Obiekty edukacyjne", "edu" ),
		"singular_name" => __( "obiekty", "edu" ),
	];

	$args = [
		"label" => __( "Obiekty edukacyjne", "edu" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "obiekty", "with_front" => true ],
		"query_var" => true,
		"supports" => [ 'title', 'editor', 'thumbnail', 'custom-fields'],
		"taxonomies" => [ "category" ],
		"show_in_graphql" => false,
	];

	register_post_type( "obiekty", $args );
}

add_action( 'init', 'cptui_register_objects' );
function cptui_register_tracks() {

	$labels = [
		"name" => __( "Ścieżki edukacyjne", "edu" ),
		"singular_name" => __( "sciezki", "edu" ),
	];

	$args = [
		"label" => __( "Ścieżki edukacyjne", "edu" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "page",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "sciezki", "with_front" => true ],
		"query_var" => true,
		"supports" => [ 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'],
		"taxonomies" => [ "category" ],
		"show_in_graphql" => false,
	];

	register_post_type( "sciezki", $args );
}

add_action( 'init', 'cptui_register_tracks' );
function cptui_register_tablice() {

	$labels = [
		"name" => __( "Tablice edukacyjne", "edu" ),
		"singular_name" => __( "tablice", "edu" ),
	];

	$args = [
		"label" => __( "Tablice edukacyjne", "edu" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "page",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "tablice", "with_front" => true ],
		"query_var" => true,
		"supports" => [ 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'],
		"taxonomies" => [ "category" ],
		"show_in_graphql" => false,
	];

	register_post_type( "tablice", $args );
}

add_action( 'init', 'cptui_register_tablice' );
function cptui_register_gallery() {

	$labels = [
		"name" => __( "Galeria", "edu" ),
		"singular_name" => __( "gallery", "edu" ),
	];

	$args = [
		"label" => __( "Galeria", "edu" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "gallery", "with_front" => true ],
		"query_var" => true,
		"supports" => [ 'title', 'editor', 'custom-fields'],
		"taxonomies" => [ "category" ],
		"show_in_graphql" => false,
	];

	register_post_type( "gallery", $args );
}

add_action( 'init', 'cptui_register_gallery' );


function gallery_section(){

	$result = '<section class="gallery-section">';

	$args = array(
		'post_type'      => 'gallery',
		'posts_per_page' => -1,
		'publish_status' => 'published',
	 );

		$query = new WP_Query($args);

		if($query->have_posts()) :

		while($query->have_posts()) : $query->the_post() ;

		$result .= '<div class="single-gallery-cnt" style="background-image:url('. get_field('gallery_image')['url'] .'); ">';
		$result .= '<p class="gallery-subject">'. get_field('gallery_subject') .'</p>';
		$result .= '<h3 class="gallery-title">'. get_the_title() .'</h3>';
		$result .= '<div class="d-flex flex-column align-items-center gallery-subtitle-cnt"><p class="gallery-subtitle">'. get_field('gallery_title') .'</p>';
		$result .= '<a class="gallery-button" href="'. get_the_permalink() . '">'. get_field('gallery_button') .'</a></div></div>';

		endwhile;

		endif;
		$result .= '</section>';
		return $result;

}
add_shortcode( 'gallery', 'gallery_section' ); 


function slide_of_objects(){
	$result = '<section class="splide slider-of-object" >';
	$result .= '<div class="splide__track">';
	$result .=	'<ul class="splide__list">';
	
	$args = array(
		'post_type'      => 'obiekty',
		'posts_per_page' => -1,
		'publish_status' => 'published',
	 );

$query = new WP_Query($args);

if($query->have_posts()) :

while($query->have_posts()) :

$query->the_post() ;
$result .= '<li class="splide__slide">';
$result .= '<img width="360" height="360" src="'. get_field('object_image')['url'] .'" class="slider-164 slide-168" alt="" loading="lazy" rel="" title="'.get_field('object_image')['title'].'" draggable="false">';
$result .= '<div class="caption-wrap"><div class="caption">';
$result .= '<div class="slider-content">'; 
$result .= '<h3 class="slider-header">'. get_the_title() .'</h3> ';
$result .= '<p>'. get_field('object_desc').'</p>';
$result .= '<a href="'. get_the_permalink() .'" class="slider-button">Przejdź do galerii</a>';
	 $result .=  '</div></div></div></li>';
	
	endwhile;

	wp_reset_postdata();

endif;    
		   
$result .=   '</ul>';
$result .=  '</div>';
$result .= '</section>';

return $result;
}
add_shortcode( 'obiekty', 'slide_of_objects' ); 
  
function webp_upload_mimes($existing_mimes) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');

function webp_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );

        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }

    return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);


function social_share_shortcode(){
	global $post;

	 
	$str = get_site_url();
	$str = preg_replace('#^https?://#i', '', $str);
	
	$social .= '<div class="d-flex flex-wrap">';

	$social .= '<div class="fb-share-button" ><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2F'.$str.'/'.$post->post_name.'%2F&amp;src=sdkpreparse" ><img src="'.get_template_directory_uri().'/images/facebook.svg"></a></div>';

	$social .= '<div class="pl-3"><a href="https://www.instagram.com"><img src="'.get_template_directory_uri().'/images/instagram.svg"></a></div>';
	
	$social .= '<div class="pl-3"><a href="https://www.linkedin.com/shareArticle?mini=true&summary='.$post->post_name.'&title='.$post->post_name.'&url='. get_permalink() .'"><img src="'.get_template_directory_uri().'/images/linkedin.svg"></a></div>';

	$social .= '<div class="pl-3"><a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=Hello%20world"><img src="'.get_template_directory_uri().'/images/twitter.svg"></a></div>';

	$social .= '</div>';
	
	return $social;
}
add_shortcode( 'social-share', 'social_share_shortcode' ); 
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $items, $args ) {

	foreach( $items as &$item ) {
	
		$icon = get_field('menu_icon', $item);
	
		if( $icon ) {
			
			$item->title .= '<img src="'.$icon["url"].'">';
			
		}
		
	}
	return $items;
	
}



function shortcode_news_custom(){
 
	$result = '<section class="news-section ">';
	$result .= '<div class="container mx-auto">';
  $args = array(
				  'post_type'      => 'post',
				  'posts_per_page' => '4',
				  'orderby' => 'date',
      				'order' => 'ASC',
				  'publish_status' => 'published',
				  'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
			   );

  $loop = new WP_Query($args);
  $result .= '<div class="d-flex flex-wrap justify-content-between">';   
  if($loop->have_posts()) :

	  while($loop->have_posts()) : $loop->the_post() ;

		  $result .= '<div class="post-card">';
		  $result .= '<div class="thumbnail-cnt">';
          $result .=  '<img class="post-thumbnail" src="'. get_the_post_thumbnail_url()  .'"  />';
		  $result .= '</div>';
		  $result .= '<div class="post-content"><h4 class="post-heading">'. get_the_title() .'</h4>';
		  $result .= '<p>'. get_the_excerpt() .'</p>';
		$result .= '<a class="post-permalink" href="'.get_post_permalink().'"><span>Czytaj więcej</span> <img src="'.  get_template_directory_uri().'/images/arrow-right.svg" width="11" /></a>';
          $result .=  '</div></div>';
	  endwhile;



  endif;   
 
  $result .= '</div>'; 
 


  $result .= '<div class="pagintaion-container">';
  $result .= '<div class="pagintaion-content">';
	
	$big = 999999999; 
	$result .= paginate_links( array(
	'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $loop->max_num_pages,
	'prev_text'    => '<img src="'. get_template_directory_uri().'/images/arrow-right-pag.svg" />',
	'next_text'    => '<img class="arrow-right-pag" src="'. get_template_directory_uri().'/images/arrow-right-pag.svg" />',
	) );

	$result .= '</div>';
	$result .= '</div>';

	$result .= '</div>';
	$result .= '</section>';

	wp_reset_postdata();

  return  $result;            
}

add_shortcode( 'aktualnosci', 'shortcode_news_custom' ); 

function accordion_career(){
	$x = 0;
	$content = '<div class="accordion" id="accordionContainer">';
	$args = array(
		'post_type'      => 'oferty-pracy',
		'posts_per_page' => -1,
		'orderby' => 'date',
			'order' => 'ASC',
		'publish_status' => 'published',
		
	 );
	 
	 $loop = new WP_Query($args);
	   
	 if($loop->have_posts()) :
   
		 while($loop->have_posts()) : $loop->the_post() ;
			$x++;
			$content .= '<div class="accordion-item">';
			$content .= '<h2 class="accordion-header" id="heading'.$x.'">';
			$content .=	'<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$x.'" aria-expanded="true" aria-controls="collapse'.$x.'">';
			$content .=  get_the_title();
			$content .=	'</button>';
			$content .=	 '</h2>';
			$content .=	'<div id="collapse'.$x.'" class="accordion-collapse collapse" aria-labelledby="heading'.$x.'" data-bs-parent="#accordionContainer">';
			$content .=	'<div class="accordion-body">';
			$content .=	get_field('offer_content');
			$content .=	'<div class="button-offer-cnt"><button class="custom-button active-button">';
			$content .= get_field('offer_button');
			$content .= '</button></div>';
			$content .=	'</div>';
			$content .=	 '</div>';
			$content .=	'</div>';
				

		
		endwhile;
		endif;   
		
		wp_reset_postdata();
		$content .= '</div>';
	return $content;
}
add_shortcode( 'oferty-pracy', 'accordion_career' ); 

function shortcode_panel(){
	
	$result = '<section class="section-panel">';


	$category = get_the_category();
	$firstCategory = $category[0]->cat_name;
	$result .= '<ul class="panel-list">';



  $args = array(
				  'post_type'      => 'tablice',
				  'posts_per_page' => -1,
				  'orderby' => 'date',
      			'order' => 'ASC',
				  'publish_status' => 'published',
				  'category_name' => $firstCategory
			   );
  $loop = new WP_Query($args);
  $result .= '<li class="button-panel dropdown">'; 
  $result .= '<a class="array-permalink" id="dropdown-toggle-array" href="#" >Tablice <span class="caret"></span></a>';  
  $result .= '<ul class="dropdown-array">';   
  $x = 0;
  $y = 0;
  if($loop->have_posts()) :
	  while($loop->have_posts()) : $loop->the_post() ;
		  $result .= '<li class="array-item">';
		$result .= '<a class="" href="'.get_post_permalink().'" ><span>'. get_the_title() .'</span></a>';
          $result .=  '</li>';
	  endwhile;
  endif;   
   


  $result .= '</ul>'; 
  $result .= '</li>'; 	
  wp_reset_postdata(); 
  $args = array(
	'post_type'      => 'obiekty',
	'posts_per_page' => -1,
	'orderby' => 'date',
	'order' => 'ASC',
	'publish_status' => 'published',
	
 );
		$loop = new WP_Query($args);
		$result .= '<li class="button-panel dropdown">'; 
		$result .= '<a class="array-permalink" id="dropdown-toggle-array-objects" href="#" >Obiekty <span class="caret"></span></a>';  
		$result .= '<ul class="dropdown-array-objects">';
		if($loop->have_posts()) :
			while($loop->have_posts()) : $loop->the_post() ;
			$result .= '<li class="array-item">';
			$result .= '<a class="" href="'.get_post_permalink().'" ><span>'. get_the_title() .'</span></a>';
			$result .=  '</li>';
	endwhile;
endif;   
		$result .= '</ul>'; 
		$result .= '</li>'; 	
wp_reset_postdata();	
		$result .= '</li>';
		$result .= '<li class="button-panel">';    
		$result .= '<a class="array-permalink" href="'.get_post_permalink().'"><span>Test</span></a>'; 
 		$result .= '</li>';
  	$result .= '</ul>'; 
	 
	wp_reset_postdata();

	$result .= '</section>';
  return  $result;            
}

add_shortcode( 'panel', 'shortcode_panel' ); 

