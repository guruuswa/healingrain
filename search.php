<?php 

get_header();

$search = get_search_query(); 

$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$args = array(
   'post_type' => 'book',
   'posts_per_page' => 20,
   'paged' => $paged,
   'meta_query' => array(
     'relation' => 'OR',
      array(
        'key' => 'title',
        'value' => $search,
        'compare' => 'LIKE',
      ),   
      array(
        'key' => 'author',
        'value' => $search,
        'compare' => 'LIKE',
      ),  
      array(
        'key' => 'description',
        'value' => $search,
        'compare' => 'LIKE',
      )
   )
 );

$query = new WP_Query( $args );

$pageTitle = sprintf('%s <em>%s</em>', good_english_result($query->post_count), $search);

get_template_part( 'partials/title', 'page' );

if ( $query->have_posts() ) :

  while ( $query->have_posts() ) : $query->the_post();

    get_template_part( 'partials/loop', 'page' );

  endwhile;

endif;

get_template_part( 'partials/foot', 'page' );

get_footer(); 

?>