<?php 
 
function example_header() {

	return "Example header";
}

function copyright_example() {

	return "Copyright Boom.Camp 2020";
}


function returnShortCode($atts) { 

    //Get data from `wp_terms` table
    $all_terms = get_terms(); 
    $terms = array();

    //Loop and store data from `wp_terms.slug` field
    foreach ($all_terms as $term) {
        $terms[] = $term->slug; //default is `uncategorized`
    }
    
    //Read arguments if no declared arguments execute the default parameters
    $arg = shortcode_atts(array(
      'terms' => $terms,
      'posts_per_page' => 10
    ), $atts);

    //Arguments to query categories post
    $args = array( 
        'orderby' => 'date',
        'tax_query' => array(
           array(
              'taxonomy' => 'category',
              'field' => 'slug',
              'terms' => $arg['terms']
           )
        ),
        'posts_per_page' => $arg['posts_per_page']
    );

    // Example of WP_query arguments
    // $args = array('cat' => 4)
    // $args = 'category_name=mentors'
    // $args = 'pagename=mentors-slug'
    
    //Store the result
    $data = new WP_Query($args);
    
    //Check if have posts then start looping
    if ( $data->have_posts() ) {
      echo __('<ul>');
      while ( $data->have_posts() ) {
          $data->the_post();
          echo __('<h4>' . get_the_title() . '</h4>');
          echo __('<p>'. the_content().'</p>');
      }
      echo __('</ul>');

  } else {
      echo __("<h4>No post for ${type} found.</h4>");
  }
  // Restore original Post Data
  wp_reset_postdata(); 
}

add_shortcode('display-shortcode', 'returnShortCode');

//Needed for the_post_thumbnail(); function
//and set feature image for this theme
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 500, 500);
?>
