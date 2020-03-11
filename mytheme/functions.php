<?php 
 
 function example_header() 
 {
	  return "Example header";
 }

 function copyright_example() 
 {
	  return "Copyright Boom.Camp 2020";
 }
 
//Needed for the_post_thumbnail(); function
//and set feature image for this theme
//https://www.wpbeginner.com/beginners-guide/how-to-add-featured-image-or-post-thumbnails-in-wordpress/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 500, 500);
?>