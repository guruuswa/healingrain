<?php get_header();

$search = get_search_query(); 

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

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

?>

<?php get_template_part( 'partials/title', 'page' ); ?>

<?php if ( $query->have_posts() ) : ?>

	<?php while ( $query->have_posts() ) : $query->the_post(); ?>

	<?php get_template_part( 'partials/loop', 'page' ); ?>

	<?php endwhile; ?>

<?php endif; ?>

<?php get_template_part( 'partials/foot', 'page' ); ?>

<?php get_footer(); ?>