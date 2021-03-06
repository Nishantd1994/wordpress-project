<?php


/*Load css starts*/

function load_css()
{

	wp_register_style('all.min.css','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css','all');
	wp_enqueue_style('all.min.css');

	wp_register_style('bootstrap-icons.css','https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css','all');
	wp_enqueue_style('bootstrap-icons.css');

	wp_register_style('animate.min.css',get_template_directory_uri().'/lib/animate/animate.min.css','all');
	wp_enqueue_style('animate.min.css');

	wp_register_style('owl.carousel.min.css',get_template_directory_uri().'/lib/owlcarousel/assets/owl.carousel.min.css','all');
	wp_enqueue_style('owl.carousel.min.css');

	wp_register_style('lightbox.min.css',get_template_directory_uri().'/lib/lightbox/css/lightbox.min.css','all');
	wp_enqueue_style('lightbox.min.css');


	wp_register_style('bootstrap.min.css',get_template_directory_uri().'/css/bootstrap.min.css','all');
	wp_enqueue_style('bootstrap.min.css');

	wp_register_style('style.css',get_template_directory_uri().'/css/style.css','all');
	wp_enqueue_style('style.css');

}


add_action('wp_enqueue_scripts','load_css');

/*Load css ends*/


/*Load js starts*/


function load_js()
{
	wp_register_script('jquery-3.4.1.min.js','https://code.jquery.com/jquery-3.4.1.min.js','all');
	wp_enqueue_script('jquery-3.4.1.min.js');

	wp_register_script('bootstrap.bundle.min.js','https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js','all');
	wp_enqueue_script('bootstrap.bundle.min.js');

	wp_register_script('wow.min.js',get_template_directory_uri().'/lib/wow/wow.min.js','all');
	wp_enqueue_script('wow.min.js');

	wp_register_script('easing.min.js',get_template_directory_uri().'/lib/easing/easing.min.js','all');
	wp_enqueue_script('easing.min.js');

	wp_register_script('waypoints.min.js',get_template_directory_uri().'/lib/waypoints/waypoints.min.js','all');
	wp_enqueue_script('waypoints.min.js');

	wp_register_script('counterup.min.js',get_template_directory_uri().'/lib/counterup/counterup.min.js','all');
	wp_enqueue_script('counterup.min.js');

	wp_register_script('owl.carousel.min.js',get_template_directory_uri().'/lib/owlcarousel/owl.carousel.min.js','all');
	wp_enqueue_script('owl.carousel.min.js');

	wp_register_script('isotope.pkgd.min.js',get_template_directory_uri().'/lib/isotope/isotope.pkgd.min.js','isotope.pkgd.min.js');
	wp_enqueue_script('isotope.pkgd.min.js');

	wp_register_script('lightbox.min.js',get_template_directory_uri().'/lib/lightbox/js/lightbox.min.js','all');
	wp_enqueue_script('lightbox.min.js');

	wp_register_script('main.js',get_template_directory_uri().'/js/main.js','all');
	wp_enqueue_script('main.js');



	




}


add_action('wp_footer','load_js');





/*Load js ends*/


/*Widget Area Starts*/

function widget_area()
{
	  register_sidebar( array(
        'name'          => 'Address',
        'id'            => 'address',
        'before_widget' => '<div class="chw-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="chw-title">',
        'after_title'   => '</h2>',
    ) );

	  register_sidebar(array(
		'name'          => 'Services',
		'id'            => 'services',
		'before_widget' => '<div class="chw-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="chw-title">',
		'after_title'   => '</h2>',

	  ));

	  register_sidebar(array(
		'name'          => 'Newsletter',
		'id'            => 'newsletter',
		'before_widget' => '<div class="chw-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="chw-title">',
		'after_title'   => '</h2>',

	  ));


	   register_sidebar(array(
		'name'          => 'Copyright',
		'id'            => 'copyright',
		'before_widget' => '<div class="chw-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="chw-title">',
		'after_title'   => '</h2>',

	  ));

	   register_sidebar(array(

	   	'name'          => 'Topbar',
		'id'            => 'topbar',
		'before_widget' => '<div class="chw-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="chw-title">',
		'after_title'   => '</h2>',



	   ));


}


add_action( 'widgets_init', 'widget_area');

/*Widget Area Ends*/


/*add theme support starts*/

add_theme_support('menus');
add_theme_support('post-thumbnails');

/*add theme support ends*/


/*register menu starts*/

function wpb_custom_new_menu() {
  register_nav_menu('my-custom-menu',__( 'My Custom Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );

/*register menu ends*/


//shortcode without parameter

function show_img()
{
	$img="<img src='http://localhost/furniturewp/wp-content/uploads/2022/02/carousel-2.jpg' width='200' height='200'>";
	return $img;

}


add_shortcode('view-image','show_img');

//shortcode with parameter

function image_new($img)
{
	$array=shortcode_atts(array('width'=>'200','height'=>'200'),$img);

	$output="<img src='http://localhost/furniturewp/wp-content/uploads/2022/02/carousel-2.jpg' width='".$array['width']."' height='".$array['height']."'>";
	return $output;


}

add_shortcode('image-new','image_new');


//printing full username using shortcode


function username($name)
{
    $array=shortcode_atts(array('firstname'=>'Nishant','lastname'=>'Dua'),$name);

    $output="<h1>My name is ".$array['firstname']." ".$array['lastname']."</h1>";
    return $output;
}


add_shortcode('full-name','username');